<?php
// print_r($_POST);print_r($_FILES);die();
session_start();
include("DbConnect.php");

if(!isset($_POST['count']) )
  die('invalid data');

else{
  //$login=$_SESSION['id'];
//MOVE UPLOADED IMAGE TO DB FOLDERS

$count= $_POST['count'];
$bdate= $_POST['bdate'];

$price= $_POST['price'];




$q="INSERT INTO `tbl_hatchery`( `Hatchery_Count`,`Hatchery_Date`,`Hatchery_Price`) VALUES ($count,'$bdate',$price)";
$result = mysqli_query($con, $q);
mysqli_close($con);
if (!$result){
  die("RESULT will not get <br>$q");
} else {
  header("Location: hatchery_viewstock.php");
}
  }
?>
