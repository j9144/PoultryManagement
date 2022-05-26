<?php
include("DbConnect.php");
$id = $_GET['id'];

$d=date("Y/m/d");
// echo $d;
$s="SELECT * FROM `tbl_orderbirdshatchery` WHERE `HOrder_Id`= '$id'";
$res = mysqli_query($con, $s);
while($row=mysqli_fetch_array($res))
  {
     $hcount=$row['HCount'];
     $ddate=$row['HDDate'];
     $hatch_id=$row['Hatchery_Id'];
// echo $ddate;
	 $q="select `Hatchery_Price` from `tbl_hatchery` where `Hatchery_Id`='$hatch_id'";
     $res=mysqli_query($con,$q);
	 //  $n=mysqli_num_rows($res);
		// if($n==0)
		// {
			
		// 	<!-- <script > alert("rate of chicken is not entered please wait until the date");

		// </script> -->
			

		  // echo "<div class='container' id='cont'><h1><a href='hatcheryview_order.php'>VIEW ORDERS</a></h1></div>";
		// }
		// else
		// {
			while($row=mysqli_fetch_array($res))
			{
				 $rate=$row['Hatchery_Price'];
				   
				echo "<br>",$rate;

				echo "<br>",$hcount;
				 $total=$rate * $hcount;
				echo "<br>",$total;
				
                $q1="INSERT INTO `tbl_hatcherybill`(`HOrder_Id`, `HBill_Date`, `HPrice`, `Status`) values('$id','$d','$total','1')";
				$result1 = mysqli_query($con, $q1);
				
				if (!$result1)
					{
					  die("RESULT will not get <br>$q1");
					}




				$q2="UPDATE `tbl_hatchery` SET `Hatchery_Count`= `Hatchery_Count`-'$hcount' where `Hatchery_Id` = '$hatch_id'";
				$result3 = mysqli_query($con, $q2);
				if (!$result3)
				{
				  die("RESULT will not get <br>$q2");
				}
				$q="UPDATE `tbl_orderbirdshatchery` SET `Status` = 3 where `HOrder_Id`= '$id'";
				$result = mysqli_query($con, $q);
				mysqli_close($con);
				if (!$result)
				{
				  die("RESULT will not get <br>$q");
				} 
				else 
				{
				  header("Location: farmer_vieworderhatchery.php");
				}
			}
}






  
?>
