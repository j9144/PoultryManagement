<?php
// print_r($_POST);print_r($_FILES);die();
//session_start();

include("DbConnect.php");
if(!isset($_POST['count']))
  die('invalid data');

  else{

//MOVE UPLOADED IMAGE TO DB FOLDERS

$count= $_POST['count'];
$breed = $_POST['breed'];
$bdate= $_POST['bdate'];
//$login=$_SESSION['id'];
// echo $bdate;
// $d=date("Y/m/d",$bdate);
// echo "----".$d;





$sql="INSERT INTO `tbl_addbird`( `BirdCount`,`Breed`,`BirdDate`) VALUES ('$count','$breed','$bdate')";
$result = mysqli_query($con, $sql);
mysqli_close($con);
if (!$result){
  die("RESULT will not get <br>$sql");
} else {
  header("Location: farmer_viewstock.php");
}
  }
?>
