<?php
session_start();

$id = $_GET['id'];
$type = $_GET['type'];

if ($type == 'decre') {
  $_SESSION['cart'][$id]['quantity']--;
  if ($_SESSION['cart'][$id]['quantity'] == 0) {
    unset($_SESSION['cart'][$id]);
  }
} else {
  $_SESSION['cart'][$id]['quantity']++;
}
