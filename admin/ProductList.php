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
      <title>Admin| Manage Products</title>
      <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
      <link type="text/css" href="css/theme.css" rel="stylesheet">
      <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
      <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
      <div>
         <br>
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
   <form method = "post" name = "Pdtlist" action=""  enctype = "multipart/form-data" align = "center" width = "200px" style = "margin-bottom:120px"> <br>
   <center>
   
   <div class="row" style = "margin-left:50px;">
   <form method="post" enctype="multipart/form-data">
   </form>
   <div class="col-sm-9" >
   <div class="table-responsive" style = "width:100%">
   <table id="product_table" class="table table-bordered" style = "width:80%">
   <thead>
   <tr>
   
   <th>Product</th>
   <th>Price</th>
   <th>Category</th>
    <th>Action</th>
      
   </tr>
   </thead>
   <tbody>
   <?php
      include ('DbConnect.php');
      $result = mysqli_query($con,"select tbl_category.Category_name,tbl_products.name,tbl_products.productPrice from tbl_category JOIN tbl_products
       ON tbl_category.Category_Id = tbl_products.Category_Id");
       
      
      
      while($row = mysqli_fetch_array($result)){?>
   <tr>
   
   <td><?php echo $row["name"];?> </td>
   <td><?php echo $row["productPrice"];?> </td>
   <td>
   <?php 
      echo $row['Category_name'];
      ?> 
   </td>
   <td>
      <a href="EditPdt.php?id=<?php echo $row["id"]; ?>" class="edit btn btn-primary btn-xs"> <i class = "fas fa-edit"> </i> Edit</a>
      <a href="DeletePdt.php?id=<?php echo $row["id"]; ?>" class="delete btn btn-danger btn-xs"><i class = "fas fa-trash"> </i> Delete</a>
   </td> 
   </tr>
   <?php  } ?>
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