<?php
require "../check_lognin_admin.php";

if (
  empty($_POST["price"]) || empty($_POST["name"])
  || empty($_POST["manufacturer_id"]) || empty($_POST["description"])
) {
  header("location: form_update.php?error= Phải điền đủ thông tin");
  exit;
}

$id = $_POST["id"];
$name = $_POST["name"];
$image_new = $_FILES["image_new"];
$image_old = $_POST["image_old"];
// echo $image_old;
// exit;
$folder = "./images/";

if ($image_new['size'] > 0) {
  $file_extension = explode('.', $image_new['name'])[1];
  $file_name = time() . '.' . $file_extension;
  $path_file = $folder . $file_name;
  move_uploaded_file($image_new["tmp_name"], $path_file);
} else {
  $path_file = $image_old;
}



$price = $_POST["price"];
$description = $_POST["description"];
$manufacturer_id = $_POST["manufacturer_id"];


require '../connect.php';

$sql = "update products 
set
name = '$name',
image = '$path_file',
price = '$price',
description = '$description',
manufacturer_id = '$manufacturer_id'
where
id = '$id'
";
echo $sql;


mysqli_query($connect, $sql);
$error = mysqli_error($connect);
mysqli_close($connect);
if (empty($error)) {
  header('location: index.php?success=Sửa thành công!');
} else {
  header('location: form_insert.php?error=Lỗi truy vấn');
}
