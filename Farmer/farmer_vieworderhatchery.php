<?php
//session_start();
//if(!isset($_SESSION['id'])){
  //header('login.php');
//}
//if ($_SESSION["role"]!=1)
 //{
 // header("Location: index.html");
//}
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
  <script src = "https://code.jquery.com/jquery-3.5.1.js"> </script>
<script src = "https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"> </script>
<link rel = "stylesheet" href = "https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="css/datatables/datatables.css">
  <!-- <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" /> -->
<style type="text/css">
  .buttonn {
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
    <div class="" style="text-align: center; padding-left:80px; color:black">
      <h1 style="color: black;padding-top: 30px; ">YOUR ORDERS FOR HATCHERIES</h1>

  <?php

  include("DbConnect.php");
  //$login=$_SESSION['id']; ";
  $sql1="SELECT tbl_orderbirdshatchery.HOrder_Id,tbl_orderbirdshatchery.HHatchery_Id, tbl_orderbirdshatchery.HCount, tbl_orderbirdshatchery.HDDate, tbl_orderbirdshatchery.HOrderDate, tbl_orderbirdshatchery.HAddress, tbl_orderbirdshatchery.Status ,tbl_staffregister.Name FROM `tbl_orderbirdshatchery` JOIN  tbl_staffregister  WHERE tbl_orderbirdshatchery.HHatchery_Id=tbl_staffregister.StaffReg_Id";
  $res1=mysqli_query($con,$sql1);
  $n=mysqli_num_rows($res1);
if($n==0)
{
    ?>
<div class='container' id='cont'><h1>NO Orders</h1></div>
<?php
}
else
{
 ?> 
  
            
            
                  
  <table class='table table-responsive' id='product_table' class='table' style='display:block; padding:50px;padding-left:100px; font-size:20px;'>
          
          <tr>
  <th> HATCHERY NAME</th>
  <th>COUNT</th>
  <th>ORDERED DATE</th> 
  <th>DELIVERY DATE</th>
  <th>ADDRESS</th>
  <th>STATUS</th>
  <th>ACTION</th>
  </tr>
          </thead>
  <?php
  while($row=mysqli_fetch_array($res1))
  {
   ?>  
  <tr>
 <?php
   $hid=$row['HHatchery_Id'];
  // echo $hid;
       $sq=" SELECT `Name` from tbl_staffregister where StaffReg_Id=$hid";
       $res=mysqli_query($con,$sq);
       while($row1=mysqli_fetch_array($res))
      {
          ?>
        <td><?php echo $row["Name"];?> </td>
    <?php
  }
  ?>
  
  <td><?php echo $row["HCount"];?> </td>
  <td><?php echo $row["HOrderDate"];?> </td>
  <td><?php echo $row["HDDate"];?> </td>
  <td><?php echo $row["HAddress"];?> </td>
  <?php
     $status=$row['Status'];
     $id=$row['HOrder_Id'];
    if($status==0)
     {
         ?>
       <td> <input type='button' class='buttonn' value='Not Confirmed'></td>
       <td> <a href="farmer_confirmorderhatchery.php?id=<?php echo $row['HOrder_Id']; ?>" class='buttonn1' style='background-color:#6B8E23;'>CONFIRM</a><a href="farmer_rejectorderhatchery.php?id=<?php echo $row['HOrder_Id']; ?>" class='buttonn1' style='color:white; margin-top:10px;'>REJECT</a></td>
     <?php
    }
      elseif($status==1)
     {
         ?>
       <td> <input type='button' class='buttonn' value='To Be Delivered' style=' background-color:#FF6347;'></td>
       <td> <a href="farmer_finishorderhatchery.php?id=<?php echo $row['HOrder_Id']; ?>" class='button' style='background-color:#C71585;'>Mark as Completed</a></td>
       <?php
    }
      elseif($status==2)
     {
         ?>
       <td> <input type='button'  class='buttonn1' value='Order Rejected' ></td>
       <td> <a href="farmer_deleteorderhatchery.php?id=<?php echo $row['HOrder_Id']; ?>" class='buttonn1' style='color:black;'>DELETE</a></td>
     <?php
    }
     
      elseif($status==3)
     {
     ?>
     <td> <input type='button'  class='buttonn' value='Order Completed' style=' background-color:#008000;'></td>
    <td> <a href="viewfarmerhatcherybill.php?id=<?php echo $row['HOrder_Id']; ?>" class='button1' style='color:black; background-color:#cccc00;'>View Bill</a></td>
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

<script>
$(document).ready(function() {
    $('#product_table').DataTable( {
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    } );
} );
</script>