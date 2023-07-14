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
  $order_id = $_GET['id'];

  $sql = "SELECT * FROM order_product o JOIN products p ON o.product_id = p.id where order_id = '$order_id';";
  $result = mysqli_query($connect, $sql);
  $sum = 0;
  ?>

  <table border="1" width="100%" style="border-collapse: collapse; text-align: center;">
    <tr>
      <th>Ảnh</th>
      <th>Tên sản phẩm</th>
      <th>Giá</th>
      <th>Số Lượng</th>
      <th>Tổng tiền</th>
    </tr>
    <?php foreach ($result as $value) :   ?>
      <tr>
        <td>
          <img height="100" src="../products/<?php echo $value['image'] ?>" alt="#">
        </td>
        <td><?php echo $value['name'] ?></td>
        <td><?php echo $value['price'] ?></td>
        <td>
          <?php echo $value['quantity'] ?>
        </td>
        <td>
          <?php
          $sum += $value['quantity'] * $value['price'];
          echo $value['quantity'] * $value['price']
          ?>
        </td>

      </tr>
    <?php endforeach ?>
  </table>
  <h1>Tổng tiền là: $<?php echo $sum ?></h1>
  <br><br>
</body>

</html>