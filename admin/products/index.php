<?php
require "../check_lognin_admin.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>sản phẩm</title>
</head>

<body>
  <h1>Đây là giao diện của sản phầm</h1>
  <?php
  require "../menu.php";
  require "../connect.php";

  $sql = "select p.*, m.name as manufacturer_name from products p join manufacturers m on  p.manufacturer_id = m.id";
  $result = mysqli_query($connect, $sql);
  ?>

  <button><a href="form_insert.php">Thêm</a></button>
  <table border="1" width="100%" style="border-collapse: collapse;">
    <tr>
      <th>Mã</th>
      <th>Tên</th>
      <th>NSX</th>
      <th>Ảnh</th>
      <th>Giá</th>
    </tr>
    <?php foreach ($result as $value) :  ?>
      <tr>
        <td><?php echo $value['id'] ?></td>
        <td>
          <p>
            <?php echo $value['name'] ?>
          </p>
          <button>
            <a href="form_update.php?id=<?php echo $value['id'] ?>">Sửa</a>
          </button>
          <button>
            <a href="process_delete.php?id=<?php echo $value['id'] ?>">Xóa</a>
          </button>
        </td>
        <td>
          <?php echo $value['manufacturer_name'] ?>
        </td>
        <td>
          <img src="<?php echo $value['image'] ?>" alt="#" width="100">
        </td>
        <td><?php echo $value['price'] ?></td>
      </tr>
    <?php endforeach ?>
  </table>
</body>

</html>