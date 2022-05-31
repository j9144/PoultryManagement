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
$id = $_GET['id'];
$sql = mysqli_query($con,"select tbl_category.Category_name,tbl_products.id,tbl_products.name,tbl_products.productDescription,tbl_products.code,tbl_products.image,tbl_products.productPriceBeforeDiscount,tbl_products.productShippingcharge,tbl_products.productPrice,tbl_products.quantity,tbl_products.productAvailability from tbl_category JOIN tbl_products
       ON tbl_category.Category_Id = tbl_products.Category_Id");
       
$row = mysqli_fetch_array($sql);

if(isset($_POST["sub"])){
   // $cat = $_POST['cat'];
    $des = $_POST['des'];
    $name = $_POST['name'];  
    $code = $_POST['code'];
    $qnty = $_POST['qnty'];
    $pricedis = $_POST['pricedis'];
    $price = $_POST['price'];
    $scharge = $_POST['scharge'];
    $availability = $_POST['availability'];

     

   if($_FILES["image"]["tmp_name"]!=="")
       $image = $_FILES["image"]["name"];
       else
       $image = $row["image"];

    move_uploaded_file($_FILES["image"]["tmp_name"],"product-images/".$_FILES["image"]["name"]);
   $edit =  "update `tbl_products` set name ='$name ',  productDescription = '$des', code = '$code', quantity = '$qnty',productPriceBeforeDiscount = '$pricedis',productShippingcharge = '$scharge',productPrice = '$price',productAvailability = '$availability',image = '$image' where id='$id'";
   $result = mysqli_query($con,$edit);
   header('location:ProductList.php');
   
   
}





?>
<!DOCTYPE html>
<html>
<head>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<script src = "https://code.jquery.com/jquery-3.5.1.js"> </script>
<script src = "https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"> </script>
<link rel = "stylesheet" href = "https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="css/datatables/datatables.css"> -->
<!-- <link rel ="stylesheet" href = "pdtlist.css">  -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin| Edit Products</title>
<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
<link type="text/css" href="css/theme.css" rel="stylesheet">
<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
<div>
   <br>

    <style>
        
.panel-default {
    border-color: #ddd;
}

.panel {
    margin-bottom: 20px;
    background-color: #fff;
    border: 1px solid transparent;
    border-radius: 4px;
    -webkit-box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
    box-shadow: 0 1px 1px rgb(0 0 0 / 5%);
}

.panel-default>.panel-heading {
    color: #333;
    background-color: #f5f5f5;
    border-color: #ddd;
    margin-left: 257px;
}

.panel-heading {
    padding: 10px 218px;
    border-bottom: 1px solid transparent;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
}
.panel-body {
    padding: 15px;
}
.row {
    margin-right: -15px;
    margin-left: 228px;
}
    ul.resp-tabs-list, p {
    margin: 0px;
    padding: 0px;
}

        </style>
        <body>
<?php include('include/header.php');?>
<div class="wrapper">
<div class="container">
<div style = "margin-left:-30px">
<?php include('include/sidebar.php');?>				
<div class="span9">
<div class="content">
<div class="module" style = "margin-top:10px;margin-left:100px;width:80%">
<div class="module-head">
<h3>Manage Products</h3>
</div>


<html>
<div class="panel panel-default">
        
        <div class="panel-body" >
        <div class="row">
              <form method="post" enctype="multipart/form-data">

                  
                  <div class="col-sm-3">
                 

                  <label>Product Name</label>  
                   <input type="text" name="name" value ="<?php echo $row['name'];?> " class="form-control"/> <br>

                   <label>Product Description</label>  
                   <input type="text" name="des" value ="<?php echo $row['productDescription'];?> " class="form-control"/> <br>
                  
                   <label>Product Code</label>  
                   <input type="text" name="code" value ="<?php echo $row['code'];?> " class="form-control"/> <br>


                   <label>Image</label> 
                    <input type="file" name="image" accept="image/*" id="image" class="form-control" onchange="preview_Image(event)"/> <br>
                   <img src="product-images/<?php echo $row['image'];?>" height = "100" width = "100"/>  &nbsp;
             
                   <label>Quantity</label>  
                   <input type="text" name="qnty" value ="<?php echo $row['quantity'];?> " class="form-control"/> <br>
                  
                   <label>Product Price Before Discount</label>  
                   <input type="text" name="pricedis" value ="<?php echo $row['productPriceBeforeDiscount'];?> " class="form-control"/> <br>
                  
                   <label>Product Price After Discount(Selling Price)</label>  
                   <input type="text" name="price" value ="<?php echo $row['productPrice'];?> " class="form-control"/> <br>
                   
                   <label>Product Shipping Charge</label>  
                   <input type="text" name="scharge" value ="<?php echo $row['productShippingcharge'];?> " class="form-control"/> <br>
                   
                   <label>Product Availability</label>  
                   <input type="text" name="availability" value ="<?php echo $row['productAvailability'];?> " class="form-control"/> <br>

                   <input type = "submit" class="btn btn-success" name = "sub" value = "Update">

</div>
</form>


                     
               
                    
                    
            </div>
</div>
</div>
</div>
</div>
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
   $(document).ready(function() {
       $('#product_table').DataTable( {
           "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
       } );
   } );
</script>
<?php } ?>

<script>
function preview_Image(event)
			{
				 var reader = new FileReader();
				 reader.onload = function()
				 {
				  	var output = document.getElementById('imageDis');
				  	output.src = reader.result;
				 }
 					reader.readAsDataURL(event.target.files[0]);
					document.CreatePdt.Quantity.focus();
			}
    
    
    </script>



                     
                     
                     