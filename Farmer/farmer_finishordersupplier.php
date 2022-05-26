<?php

include("DbConnect.php");
$id = $_GET['id'];
 //$ddate=$_POST["ddate"];
//echo ($id);
$d=date("Y/m/d");
echo $d;
$s="SELECT * FROM `tbl_orderfeedsupplier` WHERE `SOrder_Id`='$id'";
$re = mysqli_query($con, $s);
while($row=mysqli_fetch_array($re))
  {
    $squantity=$row['SQuantity'];
    $ddate=$row['SDDate'];
	//echo ("inside while");
	$sq="SELECT tbl_feedsupplier.Feed_Price,tbl_feedsupplier.SFeed_Id,tbl_orderfeedsupplier.SOrder_Id FROM tbl_feedsupplier JOIN  tbl_orderfeedsupplier ON  tbl_feedsupplier.SFeed_Type= tbl_orderfeedsupplier.SType_Id AND tbl_orderfeedsupplier.SOrder_Id=$id ";
	$res = mysqli_query($con, $sq);
	while($row=mysqli_fetch_array($res))
	  {
		 $price=$row['Feed_Price'];
		   	 $sfeed_id=$row['SFeed_Id'];
		echo "<br>",$price;

		echo "<br>",$sfeed_id;
		 $total=$price * $squantity;
		 echo "<br>",$total;
		$q1="INSERT INTO `tbl_supplierbill`(`SOrder_Id`, `SBill_Date`, `SPrice`, `Status`)values('$id','$d','$total','1')";
		$result1 = mysqli_query($con, $q1);
		if (!$result1)
		{
		  die("RESULT will not get <br>$q1");
		}
		$q2="UPDATE `tbl_feedsupplier` SET `Feed_Quantity`= Feed_Quantity-$squantity where `SFeed_Id` = $sfeed_id";
		$result3 = mysqli_query($con, $q2);
		if (!$result3)
		{
		  die("RESULT will not get <br>$q2");
		}
		$q="UPDATE `tbl_orderfeedsupplier` SET `Status` =3 where `SOrder_Id`= '$id'";
		$result = mysqli_query($con, $q);
		mysqli_close($con);
		if (!$result)
		{
		  die("RESULT will not get <br>$q");
		} 
		else 
		{
		  header("Location: farmer_viewordersupplier.php");
		}
  }

}

?>
