<?php

session_start();
include("DbConnect.php");
if(
  !isset($_POST['submit'])
  )
  die('invalid data');

  else{
    $records = mysqli_query($con, " SELECT Breed_Id, Breed_Type FROM tbl_breed");  
                                    
    $row = mysqli_fetch_array($records);
    $breedid = $_SESSION['Breed_Id']=$row['Breed_Id'];
$farmer= $_POST['farmer'];
//  $breedid = $_POST['breed'];
$batch= $_POST['batch'];
$count= $_POST['count'];

$d=date("Y/m/d");



$sql = "SELECT SUM(`BirdCount`) FROM `tbl_addbird` WHERE `Bird_Id` = '$batch'";
$result1 = mysqli_query($con, $sql);
$result1 = $result1->fetch_array();
$quantity = intval($result1[0]);


if($quantity>=$count){

$var = $quantity - $count;
// echo($quantity."  ");
//   echo ($var."   ");
  $q= "INSERT INTO `tbl_orderchickswholesaler`(`Farmer_Id`,`Breed`, `Bird_Id`, `WCount`, `WOrderDate`,`Status`) VALUES ($farmer,$breedid,$batch,$count,'$d',0)";
  $result = mysqli_query($con, $q);

   $sql1 = "update `tbl_addbird` set `BirdCount` = $var  where `Bird_Id` = $batch ";
   $res1  = mysqli_query($con, $sql1);

  mysqli_close($con);
  if (!$result){
    
    die("RESULT will not get <br>$q");
  } else {
    header("Location: wview_order.php");
  }
    
}

else{

echo("<script>alert('Out of stock')</script>");

}
}

?>
