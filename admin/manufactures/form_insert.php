<?php
require "../check_super_admin.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thêm</title>
  <style>
    input,
    textarea {
      width: 300px;
      margin-right: 3px;
    }
  </style>
</head>

<body>

  <?php if (isset($_GET['error'])) { ?>
    <span style="color:red"> <?php echo $_GET['error'] ?></span>
  <?php  } ?>



  <h1>Form thêm nhà sản xuất</h1>
  <form action="process_insert.php" method="post">
    <p>
      <input type="text" name="name">
      <label for="#">Tên</label>
    </p>
    <p>
      <textarea name="address" cols="30" rows="3"></textarea>
      <label for="#">Địa chỉ</label>
    </p>
    <p>
      <input type="text" name="phone">
      <label for="#">Số điện thoại</label>
    </p>
    <p>
      <input type="text" name="image">
      <label for="#">Ảnh</label>
    </p>
    <p>
      <button type="submit">Thêm</button>
    </p>
  </form>
</body>

</html>