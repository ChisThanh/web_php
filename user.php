<?php
session_start();
if (empty($_SESSION['id'])) {
  header('location: signin.php?error=Chưa đăng nhập');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>user</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php require "./header.php" ?>
  <h1>Xin chào bạn: <?php echo $_SESSION['name'] ?></h1>
  <a href="signout.php">Đăng xuất</a>
</body>

</html>