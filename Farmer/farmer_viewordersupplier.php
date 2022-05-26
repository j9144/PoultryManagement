<?php
include "DbConnect.php";
include "farmerview.php";




?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Poultry Farm</title>
<!-- 
Cafe House Template
http://www.templatemo.com/tm-466-cafe-house
-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Damion' rel='stylesheet' type='text/css'>
  <link href="css/bootstraps.min.css" rel="stylesheet">
  <link href="css/font-awesome.min.css" rel="stylesheet">
  
  <!-- <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" /> -->
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
 .buttonn1 {
background-color: #cc0000; /* Green */
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

  </head>
  <body>
    
 
          <section class="tm-welcome-section" style="padding: 100px;">
    <div class="" style="text-align: center; padding-left:50px; color:black">
      <h1 style="color: black;padding-top: 30px; ">YOUR ORDERS TO FEED SUPPLIERS</h1>

  <?php

  //include("dbconnection.php");
  //$rid=$row['StaffReg_Id'];
  // echo $login;
  
  $sql1="SELECT tbl_staffregister.Name,tbl_orderfeedsupplier.SOrder_Id,tbl_orderfeedsupplier.Supplier_Id,  tbl_feed.Feed_Type, tbl_orderfeedsupplier.SQuantity, tbl_orderfeedsupplier.SDDate, tbl_orderfeedsupplier.SOrderDate, tbl_orderfeedsupplier.SAddress, tbl_orderfeedsupplier.Status FROM tbl_orderfeedsupplier JOIN tbl_staffregister ON tbl_orderfeedsupplier.Supplier_Id = tbl_staffregister.StaffReg_Id JOIN tbl_feed ON tbl_feed.Feed_Id= tbl_orderfeedsupplier.SType_Id";
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
  <table class='table table-responsive' id='tbl' class='table' style='display:block; padding:50px;padding-left:100px; font-size:20px;'>
  <tr>
  <th> SUPPLIER NAME</th>
  <th> FEED TYPE</th>
  <th>QUANTITY</th>
  <th>ORDERED DATE</th>
  <th>DELIVERY DATE</th>
  <th>ADDRESS</th>
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
     <td><?php echo $row["SDDate"];?> </td>
     <td><?php echo $row["SAddress"];?> </td>
     <?php
     $status=$row['Status'];
      $id=$row['SOrder_Id'];
     if($status==0)
     {
    ?>
        <td> <input type='button' class='button' value='Not Confirmed'></td>
        <td> <a href="farmer_confirmordersupplier.php?id=<?php echo $row['SOrder_Id']; ?>" class='buttonn1' style='background-color:#6B8E23;'>CONFIRM</a><a href="farmer_rejectorder.php?id=<?php echo $row['Wholesaler_Id']; ?>" class='buttonn1' style='color:black; margin-top:10px;'>REJECT</a></td>
    <?php
    }
      elseif($status==1)
     {
     ?>
     <td> <input type='button' class='button' value='To be delivered'></td>
     <td> <a href="farmer_finishordersupplier.php?id=<?php echo $row['SOrder_Id']; ?>" class='button' style='background-color:#C71585;''>Mark as Completed</a></td>
                                    
     <?php
    }
      elseif($status==2)
     {
    ?>
    <td> <input type='button'  class='buttonn1' value='Order Rejected' ></td>
    <td> <a href="farmer_cancelordersupplier.php?id=<?php echo $row['SOrder_Id']; ?>" class='buttonn1' style='color:black;'>DELETE</a></td>
    <?php
    }
      elseif($status==3)
     {
      ?>
      <td> <input type='button'  class='button' value='Order Completed' style=' background-color:#008000;'></td>
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
    

 </body>
 </html>