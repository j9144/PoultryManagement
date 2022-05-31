<?php
include "DbConnect.php";
$orderId = $_POST['worderId'];
$id = $_POST['status'];
echo $worderId;
$status_arr = $status_arr = array("Rejected",
"Approved","Processing",
      
      ); foreach($status_arr as $k =>$v): 
      endforeach;
$qry = "Select * from tbl_orderchickswholesaler where WOrder_Id = '$orderId'";
$rs = mysqli_query($con,$qry);


echo $sql = "update `tbl_orderchickswholesaler` set `Status` = '$id'  where `WOrder_Id` = '$orderId' ";
$res = mysqli_query($con,$sql);
if($res){
    header('location:farmer_vieworder.php');
}



?>