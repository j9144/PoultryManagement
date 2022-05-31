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
      <title>Farmer| View Orders to Suppliers</title>
      <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
      <link type="text/css" href="css/theme.css" rel="stylesheet">
      <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
      <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>

	  <script src = "https://code.jquery.com/jquery-3.5.1.js"> </script>
	  <script src = "https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"> </script>
	  <link rel = "stylesheet" href = "https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
	  <link rel="stylesheet" href="css/datatables/datatables.css">

      <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel = "stylesheet" href = "https://bootstrap.bundle.min.js/bootstrap.bundle.js"> -->
	  <style>





	  </style>
   </head>
   
<style type="text/css">
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



  input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  color: black;
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
</style>

  </head>
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
                        <h3>View Order Status to Supplier </h3>
                     </div> <br>
   
    
 
          <section class="tm-welcome-section" style="padding: 100px;">
    <div class="" style="text-align: center; padding-left:50px; color:black">
      <h1 style="color: black;padding-top: 30px; ">View Order Feed Supplies Status</h1>

  <?php

  //include("dbconnection.php");
  //$rid=$row['StaffReg_Id'];
  // echo $login;
  
  $sql1="SELECT tbl_staffregister.Name,tbl_orderfeedsupplier.SOrder_Id,tbl_orderfeedsupplier.Supplier_Id,  tbl_feed.Feed_Type, tbl_orderfeedsupplier.SQuantity, tbl_orderfeedsupplier.SOrderDate, tbl_orderfeedsupplier.Status FROM tbl_orderfeedsupplier JOIN tbl_staffregister ON tbl_orderfeedsupplier.Supplier_Id = tbl_staffregister.StaffReg_Id JOIN tbl_feed ON tbl_feed.Feed_Id= tbl_orderfeedsupplier.SType_Id";
  $result=mysqli_query($con,$sql1);
  $n=mysqli_num_rows($result);
if($n==0)
{
?>
<div class='container' id='cont'><h1 style = "color:black">NO PENDING ORDERS PLEASE ORDER FIRST</h1></div>
<?php
}
else
{
 ?> 
 
 <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-striped	 display" style = "width:100%">
  <tr>
  <th> SUPPLIER NAME</th>
  <th> FEED TYPE</th>
  <th>QUANTITY</th>
  <th>ORDERED DATE</th>
  <!-- <th>DELIVERY DATE</th>
  <th>ADDRESS</th> -->
  <th>STATUS</th>
  <th>ACTION</th>
  </tr>

  <?php
  
 //$result = mysqli_query($con,"SELECT tbl_staffregister.Name,tbl_orderfeedsupplier.SOrder_Id,tbl_orderfeedsupplier.Supplier_Id,  tbl_feed.Feed_Type, tbl_orderfeedsupplier.SQuantity, tbl_orderfeedsupplier.SDDate, tbl_orderfeedsupplier.SOrderDate, tbl_orderfeedsupplier.SAddress, tbl_orderfeedsupplier.Status FROM tbl_orderfeedsupplier JOIN tbl_staffregister ON tbl_orderfeedsupplier.Supplier_Id = tbl_staffregister.StaffReg_Id JOIN tbl_feed ON tbl_feed.Feed_Id= tbl_orderfeedsupplier.SType_Id"); 
  while($row=mysqli_fetch_array($result))
  {
   ?>  
  <tr>
<?php
  $sid=$row['Supplier_Id'];
  // echo $fid; 
       $sq=" SELECT `Name` from `tbl_staffregister` where StaffReg_Id=$sid";
       $res=mysqli_query($con,$sq);
       while($row1=mysqli_fetch_array($res))
      {
          ?>
    <td><?php echo $row["Name"];?> </td>
    <?php
  }
  ?>
     <td><?php echo $row["Feed_Type"];?> </td>
  
     <td><?php echo $row["SQuantity"];?> </td>
     <td><?php echo $row["SOrderDate"];?> </td>
     <!-- <td><?php echo $row["SDDate"];?> </td>
     <td><?php echo $row["SAddress"];?> </td> -->
     
     <td><?php echo $row['Status'];?></td>
     <?php
      $id=$row['SOrder_Id'];
      
      if($row['Status']=='Approved')
       {
         ?>
        <td> <a href="viewfarmersupplierbill.php?id=<?php echo $row['SOrder_Id']; ?>" class='buttonn1' style='color:black; background-color:#cccc00;'>View Bill</a></td>
       
      
      
   <?php
    }

     
  ?>
   
 </tr>
<?php
  }
  ?>
    </table>
<?php
}
  ?>
</div>

    </section>
         





       
    <div style="padding: 50x;"></div>
    

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
<?php } ?>