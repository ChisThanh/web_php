<?php
require "../check_super_admin.php";
?>
<?php

if (
  empty($_POST["name"])
  || empty($_POST["address"]) || empty($_POST["phone"])
  ||  empty($_POST["image"])
) {
  header("location: form_insert.php?error= Phải điền đủ thông tin");
  exit;
}

$name = $_POST["name"];
$address = $_POST["address"];
$phone = $_POST["phone"];
$image = $_POST["image"];

require '../connect.php';

$sql = "insert into manufacturers(name,address,phone,image)
values('$name','$address','$phone','$image')";

mysqli_query($connect, $sql);
mysqli_close($connect);

header('location: index.php?success=Thêm thành công!');
