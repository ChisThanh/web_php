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
  require "../menu.php";
  require "../connect.php";

  $sql = "select * from manufacturers";
  $result = mysqli_query($connect, $sql);
  ?>

  <h1>Form thêm sản phẩm</h1>
  <form action="process_insert.php" method="post" enctype="multipart/form-data">
    <p>
      <input type="text" name="name">
      <label for="#">Tên</label>
    </p>
    <p>
      <input type="text" name="price">
      <label for="#">Giá</label>
    </p>
    <p>
      <input type="text" name="description">
      <label for="#">Mô tả</label>
    </p>
    <p>
      <input type="file" name="image">
      <label for="#">Ảnh</label>
    </p>
    <p>
      <select name="manufacturer_id">
        <?php foreach ($result as $value) :  ?>
          <option value="<?php echo $value['id'] ?>">
            <?php echo $value['name'] ?>
          </option>
        <?php endforeach ?>
      </select>
      <label for="#">Nhà sản xuất</label>

    </p>
    <p>
      <button type="submit">Thêm</button>
    </p>
  </form>
</body>

</html>