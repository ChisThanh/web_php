<?php

$email = $_POST['email'];
$password = $_POST['password'];

require ".//connect.php";
$sql = "select * from admin where email = '$email' and password = '$password'";
$result = mysqli_query($connect, $sql);

$number_row = mysqli_num_rows($result);

if ($number_row == 1) {
  // echo "Đăng nhập thành công!";
  session_start();
  $value = mysqli_fetch_array($result);
  $_SESSION['id'] = $value['id'];
  $_SESSION['name'] = $value['name'];
  $_SESSION['level'] = $value['level'];
  header('location: root/index.php');
  exit;
}

header("location: ./index.php?error=Sai rồi!!!");
