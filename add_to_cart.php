<?php

try {
  session_start();
  // unset($_SESSION['cart']);
  $id = $_GET['id'];


  if (empty($_SESSION['cart'][$id])) {
    require "./admin/connect.php";
    $sql = "select * from products where id = '$id'";
    $result = mysqli_query($connect, $sql);
    $value = mysqli_fetch_array($result);

    $_SESSION['cart'][$id]['name'] = $value['name'];
    $_SESSION['cart'][$id]['image'] = $value['image'];
    $_SESSION['cart'][$id]['price'] = $value['price'];
    $_SESSION['cart'][$id]['quantity'] = 1;
  } else {
    $_SESSION['cart'][$id]['quantity']++;
  }
  echo 1;
} catch (\Throwable $e) {
  echo $e->getMessage();
}
