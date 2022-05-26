<?php


$id = $_GET['id'];

require("DbConnect.php");

$q="UPDATE `tbl_orderbirdshatchery` SET Status=2 where `HOrder_Id`= $id";
$result = mysqli_query($con, $q);
mysqli_close($con);
if (!$result){
  die("RESULT will not get <br>$q");
} else {
  header("Location: hatchery_vieworder.php");
}
  
?>