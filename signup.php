<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng ký</title>
  <style>
    input,
    button {
      width: 400px;
      height: 30px;
    }

    label,
    button {
      font-size: 2em;
    }
  </style>
</head>
<?php
$error = '';
if (isset($_GET['error'])) {
  $error = $_GET['error'];
}
?>

<body>
  <form action="process_signup.php" method="post">
    <p>
    <h1>Form đăng ký</h1>
    <p style="color: red;">
      <?php echo $error ?>
    </p>
    <br>
    <input type="text" name="name">
    <label for="#">Tên</label>
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
      <input type="text" name="phone_number">
      <label for="#">SĐT</label>
    </p>
    <p>
      <input type="text" name="address">
      <label for="#">Địa chỉ</label>
    </p>
    <p>
      <button type="submit">Đăng ký</button>
    </p>
  </form>
</body>

</html>