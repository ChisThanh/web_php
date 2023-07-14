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
  <h1>Đây là giao diện của đơn hàng</h1>
  <?php
  require "../menu.php";
  require "../connect.php";

  $sql = "select o.*, c.name, c.phone_number, c.address from orders o join customers c on o.customer_id = c.id;";
  $result = mysqli_query($connect, $sql);
  ?>

  <button><a href="form_insert.php">Thêm</a></button>
  <table border="1" width="100%" style="border-collapse: collapse; text-align: center;">
    <tr>
      <th>Mã</th>
      <th>Thời gian</th>
      <th>Thông tin người nhận</th>
      <th>Thông tin người đặt</th>
      <th>Trạng thái</th>
      <th>Tổng tiền</th>
    </tr>
    <?php foreach ($result as $value) :  ?>
      <tr>
        <td><?php echo $value['id'] ?></td>
        <td>
          <p>
            <?php echo $value['created_at'] ?>
            <br>
            <a href="detail.php?id=<?php echo $value['id'] ?>">Xem</a>
            <br>
            <a href="update.php?id=<?php echo $value['id'] ?>&status=1">Duyệt</a>
            <br>
            <a href="update.php?id=<?php echo $value['id'] ?>&status=2">Hủy</a>
          </p>
        </td>
        <td>
          <?php echo $value['name_receiver'] ?>
          <br>
          <?php echo $value['phone_receiver'] ?>
          <br>
          <?php echo $value['address_receiver'] ?>
          <br>
        </td>
        <td>
          <?php echo $value['name'] ?>
          <br>
          <?php echo $value['address'] ?>
          <br>
          <?php echo $value['phone_number'] ?>
        </td>
        <td>
          <?php
          switch ($value['status']) {
            case 0:
              echo "Vừa mới đặc";
              break;
            case 1:
              echo "Vừa mới duyệt";
              break;
            case 2:
              echo "Đã hủy";
              break;
            default:
              echo "chưa rõ";
              break;
          }
          ?>
        </td>
        <td><?php echo $value['total_price'] ?></td>
      </tr>
    <?php endforeach ?>
  </table>
</body>

</html>