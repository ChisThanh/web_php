<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Giỏ hàng</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <?php require './header.php' ?>
  <?php
  // session_start();
  if (empty($_SESSION['cart'])) {
    echo "Chưa có sản phẩm trong vỏ hàng";
    exit;
  }
  $cart = $_SESSION['cart'];
  $sum = 0;
  ?>
  <table border="1" width="100%" style="border-collapse: collapse; text-align: center;">
    <tr>
      <th>Ảnh</th>
      <th>Tên sản phẩm</th>
      <th>Giá</th>
      <th>Số Lượng</th>
      <th>Tổng tiền</th>
      <th>Xóa</th>
    </tr>
    <?php foreach ($cart as $id => $value) :   ?>
      <tr>
        <td>
          <img height="100" src="./admin/products/<?php echo $value['image'] ?>" alt="#">
        </td>
        <td>
          <?php echo $value['name'] ?>
        </td>
        <td>
          <span class="js-price">
            <?php echo $value['price'] ?>
          </span>
        </td>
        <td>
          <button data-id='<?php echo $id; ?>' class="js-btn-update-quantity" data-type="decre">-</button>

          <span class="js-quantity">
            <?php echo $value['quantity'] ?>
          </span>

          <button data-id='<?php echo $id; ?>' class="js-btn-update-quantity" data-type="incre">+</button>
        </td>
        <td>
          <span class="js-total-product">

            <?php
            $sum += $value['quantity'] * $value['price'];

            echo $value['quantity'] * $value['price']
            ?>
          </span>
        </td>
        <td>
          <button data-id="<?php echo $id; ?>">X</button>
        </td>
      </tr>
    <?php endforeach ?>
  </table>
  <h1>Tổng tiền là: $
    <span class="js-sum">
      <?php echo $sum ?>
    </span>
  </h1>
  <br><br>



  <?php
  $id = $_SESSION['id'];
  require "./admin/connect.php";
  $sql = "select * from customers where id = '$id'";
  $result = mysqli_query($connect, $sql);
  $value = mysqli_fetch_array($result);

  ?>
  <form action="process_checkout.php" method="post" style="margin-left: 3em;">
    <h1>Điền thông tin nhận hàng</h1>
    <br>
    <p>
      <input type="text" name="name_receiver" value="<?php echo $value['name'] ?>">
      <label for="#">Tên người nhận</label>
    </p>
    <br>
    <p>
      <input type="text" name="phone_receiver" value="<?php echo $value['phone_number'] ?>">
      <label for="#">SĐT người nhận</label>
    </p>
    <br>
    <p>
      <input type="text" name="address_receiver" value="<?php echo $value['address'] ?>">
      <label for="#">Địa chỉ người nhận</label>
    </p>
    <br>
    <p>
      <button type="submit">Đặc hàng</button>
    </p>
  </form>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
  $(document).ready(function() {
    $('.js-btn-update-quantity').click(function() {
      let btn = $(this);
      let id = $(this).data('id');
      let type = $(this).data('type');


      $.ajax({
        type: "GET",
        url: "update_quantity_in_cart.php",
        data: {
          id,
          type
        },
        // dataType: "dataType",
        success: function() {
          let parent_tr = btn.parents('tr');
          let price = parent_tr.find('.js-price').text();
          let quantity = parent_tr.find('.js-quantity').text();

          if (type == 'incre') {
            quantity++;
          } else {
            quantity--;
          }
          parent_tr.find('.js-quantity').text(quantity);
          parent_tr.find('.js-total-product').text(quantity * price);
          let total = 0;
          $('.js-total-product').each(function() {
            total += parseFloat($(this).text());
            $('.js-sum').text(total);
          })
        }
      });
    })
  });
</script>

</html>