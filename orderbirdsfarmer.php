<?php
// print_r($_POST);print_r($_FILES);die();
session_start();
if(!isset($_POST['submit']))
  die('invalid data');

  else{

$hatchery_id= $_POST['hatchery_id'];
$batch= $_POST['batch'];
$count= $_POST['count'];
$hdate= $_POST['hdate'];
$address= $_POST['address'];
//$login=$_SESSION['id'];
$d=date("Y/m/d");




require("DbConnect.php");

$q="INSERT INTO `tbl_orderbirdshatchery`( `HHatchery_Id`,`Hatchery_Id`,`HCount`,`HDDate`,`HOrderDate`,`HAddress`,`Status`) VALUES ('$hatchery_id','$batch','$count','$hdate','$d','$address', 0)";
$result = mysqli_query($con, $q);
mysqli_close($con);
if (!$result){
  die("RESULT will not get <br>$q");
} else {
  header("Location: farmer_vieworderhatchery.php");
}
  }
?>