<?php
require "DbConnect.php";

$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];

$sqlInsert = "INSERT INTO `table_events` (`title`,`start`,`end`) VALUES ('".$title."','".$start."','".$end ."')";

$result = mysqli_query($con, $sqlInsert);

if (! $result) {
    $result = mysqli_error($con);
}
?>