<?php
include "DbConnect.php";
$orderId = $_POST['orderId'];
$id = $_POST['status'];
echo $orderId;
$status_arr = array("Item Accepted<br/>by Courier","Collected","Shipped","In-Transit","Arrived At
                    <br />
                    Destination","Out for Delivery","Ready to Pickup","Delivered","Picked-up","Unsuccessfull
                    <br />
                    Delivery Attempt"); foreach($status_arr as $k =>$v): 
                    endforeach;
$qry = "Select * from tbl_orders where Order_Id = '$orderId'";
$rs = mysqli_query($con,$qry);


$sql = "update `tbl_orders` set `status` = '$id'  where `Order_Id` = '$orderId' ";
$res = mysqli_query($con,$sql);
if($res){
    header('location:order_list.php');
}



?>