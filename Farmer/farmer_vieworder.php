<?php
session_start();
   include('DbConnect.php');
   if(strlen($_SESSION['Email'])==0)
   	{	
   header('location:..\stafflogin.html');
   }
   else{
   date_default_timezone_set('Asia/Kolkata');// change according timezone
   $currentTime = date( 'd-m-Y h:i:s A', time () );




?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Farmer| View Order</title>
      <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
      <link type="text/css" href="css/theme.css" rel="stylesheet">
      <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
      <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>

	  <script src = "https://code.jquery.com/jquery-3.5.1.js"> </script>
	  <script src = "https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"> </script>
	  <link rel = "stylesheet" href = "https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
	  <link rel="stylesheet" href="css/datatables/datatables.css">

<style>
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
}
 .buttonn1 {
  background-color: #cc0000; /* red */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
 
  font-size: 16px;
  margin: 2px 2px;
  cursor: pointer;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
}



  input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

#cat{
  width: 600px;
    margin: auto;
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
.tm-main-section { padding: 100px; padding-left: 150px; }
div.main {
  width: 100px;
  margin: auto;
}
#cont
{
  padding:50px;
  font-weight: bolder;
  color: white;
}
</style>
<body>
      <?php include('include/fheader.php');?>
      <div class="wrapper">
      <div class="container">
         <div style = "margin-left:-30px">
            <?php include('include/fsidebar.php');?>				
            <div class="span9">
               <div class="content">
                  <div class="module" style = "margin-top:10px;margin-left:50px;width:900px;">
                     <div class="module-head">
                        <h3>Add Bird</h3>
                     </div> <br>
   

 <div> <br>
    
    <form method = "post" name = "Pdtlist" action=""  enctype = "multipart/form-data" align = "center" width = "200px" style = "margin-bottom:120px"> <br>
        
            
            
                  
                  <center>
                  <div class="panel panel-default" style = "margin-left:10px">
                <div class="panel-heading" style = "margin-left:50px"> ORDERS FROM WHOLESALERS</div>
                <div class="panel-body" >
                <div class="row">
              <form method="post" enctype="multipart/form-data">
              </form>
            <div class="col-sm-15">
                <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-striped	 display" style = "width:80%">
                    <thead>
                    <tr>
                    
                    <th>WHOLESALER NAME</th>
                    <th>COUNT</th>
                    <th>ORDERED DATE</th>
                    <th>DELIVERY DATE</th>
                    <th>ADDRESS</th>
                    <th>STATUS</th>
                    <th>ACTION</th>
                   <!-- <th>Edit</th>
                    <th>Delete</th>-->
                    </tr>
                    </thead>
                    <tbody>
                    
                    <?php
                        include ('DbConnect.php');
                        
                        $result = mysqli_query($con,"select tbl_staffregister.Name,tbl_orderchickswholesaler.WOrder_Id,tbl_orderchickswholesaler.WCount,tbl_orderchickswholesaler.WDate,tbl_orderchickswholesaler.WOrderDate,tbl_orderchickswholesaler.WAddress,tbl_orderchickswholesaler.Status from tbl_staffregister JOIN tbl_orderchickswholesaler
                         ON tbl_staffregister.StaffReg_Id = tbl_orderchickswholesaler.Farmer_Id");

                     
                     
                        while($row = mysqli_fetch_array($result)){
                            $sq=" SELECT `Name` from `tbl_staffregister` where Type_Id=2";
                            $res=mysqli_query($con,$sq);
                            while($row1 = mysqli_fetch_array($res)){?>
                           <tr>
                           
                               <td><?php echo $row1["Name"];?> </td>
                               <?php
                            }
                            ?>
                               <td><?php echo $row["WCount"];?> </td>
                               <td>
                                   <?php 
                                        
                                       
                                        echo $row['WOrderDate'];
                                        
                                    
                                    ?> 
                                    </td>

                                    <td><?php echo $row["WDate"];?> </td>
                                    <td><?php echo $row["WAddress"];?> </td>
                                    <td>
                               <?php
                                    $status=$row['Status'];
                                 
                           ?>
</td>
<td>
                             <button data-id="<?php echo $row['Order_Id']; ?>" type="button"  class="btn btn-info btn-flat mbtn">
		                          <i class="icon-eye-open"></i>
		                        </button> 
		                        <!-- <a href="edit_order.php?id=<?php echo $row['id'] ?>" class="btn btn-primary btn-flat ">
		                          <i class="icon-edit"></i>
		                        </a> -->
		                         <button type="button" class="btn btn-danger btn-flat delete_parcel" data-id="<?php echo $row['Order_Id'] ?>">
		                          <i class="icon-trash"></i>
		                        </button>
                          </td>
                                </tr>
                               <?php
                                 }
                                
                            
                                 ?>
                               </div>
                               
                                   </section>
                                        
                               
                                   <div style="padding: 50x;"></div>
                                  
                    </tbody>
                </table>
            </div>
            </div>
         </div>
        </div>
        </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
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
<?php } ?>
 
</body>

</html>

<!-- <script>
$(document).ready(function() {
    $('#product_table').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    } );
} ); -->
</script>