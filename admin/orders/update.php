<?php
require "../connect.php";
$id = $_GET['id'];
$status = $_GET['status'];

$sql = "update orders set status ='$status' where id = '$id'";
$result = mysqli_query($connect, $sql);
header('location: ./index.php');
