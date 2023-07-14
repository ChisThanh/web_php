<?php
require "../check_lognin_admin.php";
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
    textarea,
    select {
      width: 300px;
      margin-right: 3px;
    }
  </style>
</head>

<body>


  <?php

  $id = $_GET['id'];

  require "../menu.php";
  require "../connect.php";

  $sql = "select * from products where id = '$id' ";
  $result = mysqli_query($connect, $sql);
  $value = mysqli_fetch_array($result);

  $sql_manufacturer_id = "select * from manufacturers";
  $manufacturer_id = mysqli_query($connect, $sql_manufacturer_id);
  ?>

  <h1>Form sửa sản phẩm</h1>
  <form action="process_update.php" method="post" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $value['id'] ?>" name="id">
    <p>
      <input type="text" name="name" value="<?php echo $value['name'] ?>">
      <label for="#">Tên</label>
    </p>
    <p>
      <input type="text" name="price" value="<?php echo $value['price'] ?>">
      <label for="#">Giá</label>
    </p>
    <p>
      <input type="text" name="description" value="<?php echo $value['description'] ?>">
      <label for="#">Mô tả</label>
    </p>
    <p>
      <input type="file" name="image_new" value="<?php echo $value['image'] ?>">
      <label for="#">Ảnh mới</label>
      <br>

    </p>
    <p>
      <input type="hidden" name="image_old" value="<?php echo $value["image"] ?>">
      <img src="<?php echo $value['image'] ?>" alt="#" width="100">
      <label for="#">Ảnh cũ</label>
    </p>
    <p>
      <select name="manufacturer_id">
        <?php foreach ($manufacturer_id as $e) :  ?>
          <option value="<?php echo $e['id'] ?>" <?php if ($value['manufacturer_id'] == $e['id']) { ?> selected <?php  } ?>>
            <?php echo $e['name']  ?>

          </option>
        <?php endforeach ?>

      </select>
      <label for=" #">Nhà sản xuất</label>

    </p>
    <p>
      <button type="submit">Sửa</button>
    </p>

  </form>
</body>

</html>