<?php
include "DbConnect.php";
$id = $_GET["id"];

$del = mysqli_query($con,"Delete from tbl_product where id = $id and status =0");


if($del)
{
    mysqli_close($con);
    header("location:ProductList.php");
    exit;
}
else{
    echo "Error deleting record";
}
?>
