<?php

include "DbConnect.php";
$id = $_POST['data-id'];

$sql = "update `tbl_orders` set `delstatus` = '1' where `Order_Id` = '$id' ";
$res = mysqli_query($con,$sql);

$sql1 = $sql = "select tbl_orders.Order_Id,tbl_orders.User_Id,tbl_orders.Product_Id,tbl_orders.Quantity,tbl_orders.PaymentMethod,tbl_orders.OrderDate,tbl_orders.Reference_Number,tbl_orders.status,tbl_users.Name,tbl_products.name,tbl_products.productShippingcharge,tbl_products.productPrice from tbl_orders join tbl_users on tbl_orders.User_Id = tbl_users.User_Id join tbl_products on tbl_orders.Product_Id = tbl_products.id where delstatus = '0'";
$res = mysqli_query($con,$sql1);

?>