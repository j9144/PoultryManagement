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
   <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	   <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Admin|View Staff</title>
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
   <div class="module" style = "margin-top:10px;margin-left:100px;width:100%">
   <div class="module-head">
   <h3>View Staff</h3>
   </div>
   <div class="row" style = "margin-left:50px;">
   <form method="post" enctype="multipart/form-data">
   </form>
   <div class="col-sm-9" >
   <div class="table-responsive" >
   <table id="product_table" class="table table-bordered" style = "width:90%">
   <thead>
   <tr>
   
   <th>Staff Name</th>
   <th>Email</th>
   <th>Phone Number</th>
   <th>Designation</th>
    <th>Action</th>
      
   </tr>
   </thead>
   <tbody>
   <?php
      include ('DbConnect.php');
      $result = mysqli_query($con,"select tbl_staffregister.StaffReg_Id,tbl_staffregister.Name,tbl_staffregister.Email,tbl_staffregister.Phone_No,tbl_type.Type from tbl_staffregister JOIN tbl_type
      ON tbl_staffregister.Type_Id = tbl_type.Type_Id");
       
      
      
      while($row = mysqli_fetch_array($result)){?>
   <tr>
   
   <td><?php echo $row["Name"];?> </td>
   <td><?php echo $row["Email"];?> </td>
   <td><?php echo $row['Phone_No'];?> </td>
   <td><?php echo $row['Type'];?> </td>
   <td>
      <a href="EditStaff.php?id=<?php echo $row["StaffReg_Id"]; ?>" class="edit btn btn-primary btn-xs"> <i class = "fas fa-edit"> </i> Edit</a>
      <a href="DeleteStaff.php?id=<?php echo $row["StaffReg_Id"]; ?>" class="delete btn btn-danger btn-xs"><i class = "fas fa-trash"> </i> Delete</a>
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