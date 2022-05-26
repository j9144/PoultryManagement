<?php

require("DbConnect.php");
$order_id = $_GET['id'];



$q="DELETE FROM  `tbl_orderfeedsupplier`  where `SOrder_Id`= $order_id";
$result = mysqli_query($con, $q);
mysqli_close($con);
if (!$result){
  die("RESULT will not get <br>$q");
} else {
  header("Location: farmer_viewordersupplier.php");
}
  
?>
