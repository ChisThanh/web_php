<?php
require "../check_super_admin.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>nhà sản xuất</title>
</head>

<body>
  <h1>Đây là giao diện nhà sản xuất</h1>
  <?php include "../menu.php" ?>
  <button>
    <a href="form_insert.php">Thêm</a>
  </button>

  <?php
  require "../connect.php";
  $sql = "select * from manufacturers";
  $result = mysqli_query($connect, $sql);

  ?>

  <table border="1" width="100%" style="border-collapse: collapse;">
    <tr>
      <th>Mã</th>
      <th>Tên</th>
      <th>Địa chỉ</th>
      <th>Số điện thoại</th>
      <th>Ảnh</th>

    </tr>
    <?php foreach ($result as $value) :  ?>
      <tr>
        <td>
          <?php echo $value['id'] ?>

        </td>
        <td>
          <?php echo $value['name'] ?>
          <p>
            <button>
              <a href="form_update.php?id=<?php echo $value['id'] ?>">Sửa</a>
            </button>
            <button>
              <a href="process_delete.php?id=<?php echo $value['id'] ?>">Xóa</a>
            </button>
          </p>
        </td>
        <td> <?php echo $value['address'] ?></td>
        <td> <?php echo $value['phone'] ?></td>
        <td>
          <img src="<?php echo $value['image'] ?>" alt="#" width="100px">
        </td>
      </tr>
    <?php endforeach ?>
  </table>

</body>

</html>