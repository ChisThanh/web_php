<?php
require "../check_super_admin.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sửa</title>
  <style>
    input,
    textarea {
      width: 300px;
      margin-right: 3px;
    }
  </style>
</head>

<body>

  <?php
  $id = "";

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
  }

  include '../menu.php';
  require "../connect.php";

  $sql = "select * from manufacturers where id = $id";
  $result = mysqli_query($connect, $sql);
  $value = mysqli_fetch_array($result);

  ?>


  <h1>Form sửa nhà sản xuất</h1>
  <form action="process_update.php" method="post">
    <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
    <p>
      <input type="text" name="name" value="<?php echo $value['name']; ?>">
      <label for="#">Tên</label>
    </p>
    <p>
      <textarea name="address" cols="30" rows="3"><?php echo $value['address'] ?></textarea>
      <label for="#">Địa chỉ</label>
    </p>
    <p>
      <input type="text" name="phone" value="<?php echo $value['phone'] ?>">
      <label for="#">Số điện thoại</label>
    </p>
    <p>
      <input type="text" name="image" value="<?php echo $value['image'] ?>">
      <label for="#">Ảnh</label>
    </p>
    <p>
      <button type="submit">Sửa</button>
    </p>
  </form>
</body>

</html>