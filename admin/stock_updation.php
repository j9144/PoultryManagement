<?php
session_start();
include('DbConnect.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );



if(isset($_POST["add"]))  
{  
    $flag=0;
    $i=0;
    $count=count($_POST['product_id']);
    for($i=0;$i<$count;$i++){
          
         if(mysqli_query($con,"update tbl_products set quantity = quantity + ".$_POST['stock'][$i]." " . "where id=".$_POST['product_id'][$i]."")){
             $flag=1;
                 }

                


     }

    }
else if(isset($_POST["sub"])){
    $flag=0;
    $i=0;
    $count=count($_POST['product_id']);
    for($i=0;$i<$count;$i++){
          
         if(mysqli_query($con,"update tbl_products set quantity = quantity - ".$_POST['stock'][$i]." " . "where id=".$_POST['product_id'][$i]."")){
             $flag=1;
                 }

                


     }

}
    

 if($flag==1) 
{  
    header("location:stock_updation.php?updated=1"); 
  
}

 if(isset($_GET["updated"]))  
                        {  
                             $success_message = 'Stock Updated';  
                        }
                    
?>

<br>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Stock Updation</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>

<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row" style = "margin-left:-30px">
<?php include('include/sidebar.php');?>				
			<div class="span9">
					<div class="content">

	<div class="module" style="width:960px">
							<div class="module-head">
								<h3>Stock Updation</h3>
							</div>
             
                     <?php  
                     if(isset($success_message))  
                     { ?>
                   <div class="alert alert-success" style = "margin-left:10px;width:74%">  
                        <?php  echo $success_message; ?> 
                   </div>
                    <?php 
                     }  
                     ?>  
       
              <form method="post">
              
                <table id="product_table" class="table table-bordered" style = "margin-left:10px;width:900px">
                    <thead>
                    <tr>
                    
                    <th>Product Name</th>
                    <th>Stock Status</th>
                    <th width="120">Current Stock</th>
                    <th width="100">New Stock</th>
                    <th width="120"> Stock Action</th>
                    
                    </tr>
                    </thead>
                    <tbody>
                    <?php  
                    $result= mysqli_query($con,"select id,name,quantity,case when quantity <=0 then 'Out of Stock' else 'In Stock' end as StockStatus from tbl_products ");
                    // $cnt=1;
                    foreach($result as $row)  
                    {  ?>  
                    <tr>  
                    <td>  
                     
                    <input type="hidden" value="<?php echo $row['id'];?> " name="product_id[]">
                </td>
                
                         <td>
                             <?php echo $row['name'];?>
                         </td>
                         <td>
                             <?php echo $row['StockStatus'];?>
                         </td>
                         <td>
                             <?php echo $row['quantity'];?>
                         </td>
                         <td>
                             <input type="number" class="form-control" name="stock[]" width="80px" min="1" placeholder="0"></td>
                     
                           <td>  <button class="btn btn-lg btn-success text-center but-width" id="first" name="add" type="submit" value="<?php ?>">+</button>   
                             <button class="btn btn-lg btn-danger text-center but-width" id="second" name="sub" type="submit" value="<?php ?>">-</button></td>
                            
        

                         </td>
                    </tr>  
                     <?php  } ?> 
                    <tr>
                        <td colspan="5">
                            <p class="text-right">
                            
                            </p>
                        </td>
                    </tr>
                    </tbody>
                </table>
                </div>
              </div>
              </form>
      
        
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    </div>
    </div>
    </div>
    </div>
 
</body>
<?php include('include/footer.php');?> 
 <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>

</html>

<script> 
   
 $(document).ready(function(){ 
      $('#').DataTable();
    
 });  
 </script>  
<?php } ?>