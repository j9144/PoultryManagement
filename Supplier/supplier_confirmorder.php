<?php

//session_start();
$id = $_GET['id'];

require("DbConnect.php");
$d=date("Y/m/d");


$sq1="SELECT SFeed_Id, SQuantity FROM `tbl_orderfeedsupplier` where SOrder_Id=$id";
$res1=mysqli_query($con,$sq1);
while($row=mysqli_fetch_array($res1))
  {
  	$qua=$row['SQuantity'];
  	$foid=$row['SFeed_Id'];
	$sq1 = "UPDATE `tbl_feedsupplier` SET 	Feed_Quantity=	Feed_Quantity-$qua where `SFeed_Id`= $foid" ;
	$res1=mysqli_query($con,$sq1);
	$q=  "UPDATE `tbl_orderfeedsupplier` SET Status=1 where `SOrder_Id`= $id";
	$result = mysqli_query($con, $q);
	mysqli_close($con);
	if (!$result){
	  die("RESULT will not get <br>$q");
	} else {
	  header("Location: supplier_vieworder.php");
	}

}
  
?>
