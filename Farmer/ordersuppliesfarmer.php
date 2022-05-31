<?php
// print_r($_POST);print_r($_FILES);die();
session_start();
include("DbConnect.php");
if(!isset($_POST['submit']))
  die('invalid data');

  else
  {		$sfeed_id=0;
  		$status=0;
		$supplier= $_POST['supplier'];
		$type= $_POST['type'];
		$quantity= $_POST['quantity'];
		// $ddate= $_POST['ddate'];
		// $address= $_POST['address'];
	//	$login=$_SESSION['id'];
		$d=date("Y/m/d");
		//echo $type,"<br>",$suplier;
		
		$sq="SELECT * FROM `tbl_feedsupplier` WHERE `SFeed_Type` = '$type'  AND `Feed_Quantity` > '$quantity' AND `SFeed_Type` in (SELECT `SFeed_Type` FROM `tbl_feedsupplier`)";
		$res = mysqli_query($con, $sq);
		// mysqli_close($con);
		 $n=mysqli_num_rows($res);
		if($n==0)
		{
			$status=2;
			$sfeed_id=0;
			echo "string";
		} 
		else 
		{
			$status=0;
			while($row=mysqli_fetch_array($res))
  				{
  					$sfeed_id=$row["SFeed_Id"];
  				}
  				echo $sfeed_id;
		}
			
  				echo $sfeed_id;
   
			$q="INSERT INTO `tbl_orderfeedsupplier`( `Supplier_Id`,`SFeed_Id`,`SType_Id`,`SQuantity`,`SOrderDate`,`Status`) VALUES ('$supplier','$sfeed_id','$type','$quantity','$d','$status')";
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
		
		
	
?>
