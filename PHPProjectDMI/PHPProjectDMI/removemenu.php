<?php
include("config.php");
session_start();

if($_SESSION['user_role'] != "Employee") {
    header("location: index.php");
}

$id = $_GET['id'];
$sql = "Delete From `Menu` Where ID = " . $id;
$result = mysqli_query($db,$sql);
header("location: index.php?page=menu");
?>