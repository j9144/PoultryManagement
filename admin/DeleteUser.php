<?php
include "DbConnect.php";
$id = $_GET["id"];

$del = mysqli_query($con,"Delete from tbl_register where Reg_ID = $id");


if($del)
{
    mysqli_close($con);
    header("location:Customer.php");
    exit;
}
else{
    echo "Error deleting record";
}
?>