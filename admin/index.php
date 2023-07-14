<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập</title>
</head>
<?php
$error = '';
if (isset($_GET['error'])) {
  $error = $_GET['error'];
}
?>

<body>
  <h1>Đăng nhập</h1>
  <form action="process_lognin.php" method="post">

    <p style="color: red;">
      <?php echo $error ?>
    </p>

    <p>
      <input type="email" name="email">
      <label for="#">Email</label>
    </p>
    <p>
      <input type="password" name="password">
      <label for="#">Mật khẩu</label>
    </p>

    <p>
      <input type="checkbox" name="remember">
      <label for="#">Ghi nhớ đăng nhập</label>
    </p>
    <p>
      <button type="submit">Đăng nhập</button>
    </p>
  </form>
</body>

</html>