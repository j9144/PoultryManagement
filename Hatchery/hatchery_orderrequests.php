<?php
//session_start();
//if(!isset($_SESSION['id'])){
  //header('login.php');
//}
//if ($_SESSION["role"]!=4)
 //{
  //header("Location: index.html");
//}
include "DbConnect.php";
include "hatcheryview.php";

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
  .buttonn {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 15px;
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
</style>

  </head>
  <body>
    
 
          <section class="tm-welcome-section" style="padding: 100px;">
    <div class="" style="text-align: center; padding-left:50px; color:black">
      <h1 style="color: black;padding-top: 30px; ">ORDER REQUESTS</h1>
<?php

  //include("dbconnection.php");
  //$login=$_SESSION['id'];
  
    $sql1="SELECT tbl_orderbirdshatchery.HOrder_Id,tbl_staffregister.Name,tbl_orderbirdshatchery.HCount,tbl_orderbirdshatchery.HDDate,tbl_orderbirdshatchery.HOrderDate,tbl_orderbirdshatchery.HAddress,tbl_orderbirdshatchery.Status FROM `tbl_orderbirdshatchery` JOIN `tbl_staffregister` ON  tbl_orderbirdshatchery.HHatchery_Id = tbl_staffregister.StaffReg_Id  AND tbl_orderbirdshatchery.Status=0 ";
  $res1=mysqli_query($con,$sql1);
  $n=mysqli_num_rows($res1);
if($n==0)
{
  echo "<div class='container' id='cont'><h1>No Order Requests</h1></div>";
}
else
{
  echo "<table class='table table-responsive' id='tbl' class='table' style='display:block; padding:50px;padding-left:350px; color:black; font-size:20px;'>";
  echo "<tr>";
  echo"<th> FARMER</th>";
  
  echo"<th>COUNT</th>";
echo"<th>ORDERED DATE</th>";
echo"<th>DELIVERY DATE</th>";
echo"<th>ADDRESS</th>";
echo"<th>STATUS</th>";
echo"<th>ACTION</th>";
  echo"</tr>";
  while($row=mysqli_fetch_array($res1))
  {
     
  echo"<tr >";
  echo"<td>",$row['Name'],"</td>";
  
     echo "<td>&nbsp;",$row['HCount'],"</td>";
        echo "<td>&nbsp;",$row['HDDate'],"</td>";
           echo "<td>&nbsp;",$row['HOrderDate'],"</td>";
              echo "<td>&nbsp;",$row['HAddress'],"</td>";
     $id=$row['HOrder_Id'];
       echo "<td><a href='hatchery_confirmorder.php?id=$id' class='buttonn'>Confirm Order</a>
       </td><td>
       <a href='hatchery_rejectorder.php?id=$id' class='buttonn' style='background-color:#cccc00;'>Reject Order</a></td>";
     
     

     
  ?>
   
 <?php echo"</tr>";

  }
  echo"  </table>";
}
  ?>
</div>

    </section>
         





       
    <div style="padding: 50x;"></div>
    

 </body>
 </html>