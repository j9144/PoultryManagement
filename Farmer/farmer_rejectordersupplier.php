<?php
include("DbConnect.php");

$id = $_GET['id'];


$d=date("Y/m/d");
$q="UPDATE `tbl_orderfeedsupplier` SET Status=2 where `SOrder_Id`= $id";
$result = mysqli_query($con, $q);
mysqli_close($con);
if (!$result){
  die("RESULT will not get <br>$q");
} else {
  header("Location: farmer_viewordersupplier.php");
}
  
?>