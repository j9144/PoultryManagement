<?php
// print_r($_POST);print_r($_FILES);die();
session_start();
include "DbConnect.php";
if(!isset($_POST['submit']))
  die('invalid data');

  else{
    $records = mysqli_query($con, " SELECT Breed_Id, Breed_Type FROM tbl_breed");  
                                    
    $row = mysqli_fetch_array($records);
    $breedid = $_SESSION['Breed_Id']=$row['Breed_Id'];

$hatchery_id= $_POST['hatchery_id'];

$batch= $_POST['batch'];
$count= $_POST['count'];
// $hdate= $_POST['hdate'];
// $address= $_POST['address'];
//$login=$_SESSION['id'];
$d=date("Y/m/d");





$q="INSERT INTO `tbl_orderbirdshatchery`( `HHatchery_Id`,`Hatchery_Id`,`Breed`,`HCount`,`HOrderDate`,`Status`) VALUES ('$hatchery_id','$batch',$breedid,'$count','$d', 0)";
$result = mysqli_query($con, $q);
mysqli_close($con);
if (!$result){
  die("RESULT will not get <br>$q");
} else {
  header("Location: farmer_vieworderhatchery.php");
}
  }
?>