<?php
require "../check_lognin_admin.php";


if (
  empty($_POST["price"]) || empty($_POST["name"])
  ||  empty($_FILES["image"]) || empty($_POST["manufacturer_id"]) || empty($_POST["description"])
) {
  header("location: form_insert.php?error= Phải điền đủ thông tin");
  exit;
}



$name = $_POST["name"];
$image = $_FILES["image"];
$price = $_POST["price"];
$description = $_POST["description"];
$manufacturer_id = $_POST["manufacturer_id"];

$folder = "./images/";

$file_extension = explode('.', $image['name'])[1];

$path_file = $folder . time() . '.' . $file_extension;
move_uploaded_file($image["tmp_name"], $path_file);


require '../connect.php';

$sql = "insert into 
products(name,price,description,image,manufacturer_id)
values('$name','$price','$description','$path_file', '$manufacturer_id')";
mysqli_query($connect, $sql);
mysqli_close($connect);



header('location: index.php?success=Thêm thành công!');
