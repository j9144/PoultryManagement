<?php

include("DbConnect.php");
$id = $_GET['id'];
 //$ddate=$_POST["ddate"];
//echo ($id);
$d=date("Y/m/d");
echo $d;
$s="SELECT * FROM `tbl_orderchickswholesaler` WHERE `Wholesaler_Id`='$id'";
$re = mysqli_query($con, $s);
while($row=mysqli_fetch_array($re))
  {
     $wcount=$row['WCount'];
     $ddate=$row['WDate'];
    $bird_id=$row['Bird_Id'];
	//echo ("inside while");
	$sq="select `Rate` from `tbl_chickrate` where `Rate_Id` =(SELECT MAX(`Rate_Id`) from tbl_chickrate)";
	$res = mysqli_query($con, $sq);
	while($row1=mysqli_fetch_array($res))
	  {
		//echo ("inside while2");
		 $rate=$row1['Rate'];
		 
		echo "<br>",$rate;

		echo "<br>",$wcount; 
		 $total=$rate * $wcount;
		echo "<br>",$total;
		$q1="INSERT INTO `tbl_farmerbill`(`FOrder_Id`, `FBill_Date`, `FPrice`, `Status`)values($id,'$d',$total,'1')";
		$result1 = mysqli_query($con, $q1);
		if (!$result1)
		{
		  die("RESULT will not get <br>$q1");
		}
		$q2="UPDATE `tbl_addbird` SET `BirdCount`= `BirdCount`- '$wcount' where `Bird_Id` = '$bird_id'";
				$result3 = mysqli_query($con, $q2);
				if (!$result3)
				{
				  die("RESULT will not get <br>$q2");
				}
		$q="UPDATE `tbl_orderchickswholesaler` SET  `Status`= 3 where `Wholesaler_Id`= '$id'";
		$result = mysqli_query($con, $q);
		mysqli_close($con);

		if (!$result)
		{
		  die("RESULT will not get <br>$q");
		} 
		else 
		{
		  header("Location: farmer_vieworder.php");
		}
  }
}

?>