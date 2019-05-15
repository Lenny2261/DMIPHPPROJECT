<?php
include("config.php");
session_start();

if($_SESSION['user_role'] != "Employee") {
    header("location: index.php");
}

$id = $_GET['id'];
$sql = "Update `order` Set Status = 'In Progress' Where ID = " . $id;
$result = mysqli_query($db,$sql);
header("location: index.php?page=orders");
?>