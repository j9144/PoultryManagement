<?php
include("DbConnect.php");

$id = $_GET['id'];


$d=date("Y/m/d");
$q="UPDATE `tbl_orderbirdshatchery` SET Status=1 where `HOrder_Id`= '$id'";
echo $q;
$result = mysqli_query($con, $q);
mysqli_close($con);
if (!$result){
  die("RESULT will not get <br>$q");
} else {
  header("Location: farmer_vieworderhatchery.php");
}
  
?>