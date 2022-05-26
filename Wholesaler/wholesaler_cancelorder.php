<?php


$id = $_GET['id'];

require("DbConnect.php");

$q="DELETE FROM  `tbl_orderchickswholesaler`  where `WOrder_Id`= '$id'";
$result = mysqli_query($con, $q);
mysqli_close($con);
if (!$result){
  die("RESULT will not get <br>$q");
} else {
  header("Location: wview_order.php");
}
  
?>
