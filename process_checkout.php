<?php
$name_receiver = $_POST['name_receiver'];
$phone_receiver = $_POST['phone_receiver'];
$address_receiver = $_POST['address_receiver'];



require "./admin/connect.php";
session_start();
$cart = $_SESSION['cart'];
$id = $_SESSION['id'];
$status = 0;
$total_price = 0;

foreach ($cart as $value) {
  $total_price += $value['quantity'] * $value['price'];
}
$sql = "insert into orders( customer_id, name_receiver, phone_receiver, address_receiver, status, total_price)
 VALUES ('$id', '$name_receiver', '$phone_receiver', '$address_receiver', '$status', '$total_price')";
mysqli_query($connect, $sql);

// die($sql);

$sql = "select max(id) from orders where customer_id = '$id'";
$result = mysqli_query($connect, $sql);
$order_id = mysqli_fetch_array($result)['max(id)'];


foreach ($cart as $product_id => $value) {
  $quantity = $value['quantity'];
  $sql = "insert into order_product(order_id, product_id, quantity) value('$order_id', '$product_id', '$quantity')";
  mysqli_query($connect, $sql);
}

mysqli_close($connect);
unset($_SESSION['cart']);

// mysqli_query($connect, $sql);

header('location: index.php');
