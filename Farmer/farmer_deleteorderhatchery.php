<?php

include("DbConnect.php");
$id = $_GET['id'];



$q="DELETE FROM  `tbl_orderbirdshatchery`  where `HOrder_Id`= $id";
$result = mysqli_query($con, $q);
mysqli_close($con);
if (!$result){
  die("RESULT will not get <br>$q");
} else {
  header("location: farmer_vieworderhatchery.php");
}
  
?>