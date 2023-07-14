<?php
require "./admin/connect.php";
$sql = "select * from products";
$result = mysqli_query($connect, $sql);





?>
<div class="container">

  <main>
    <div class="products">
      <?php foreach ($result as $value) :  ?>
        <div class="item">
          <div class="img">
            <img src="./admin/products/<?php echo $value["image"] ?>" alt="#" width="100">
          </div>
          <p>
          <h1>
            <center>
              <?php echo $value['name'] ?>
            </center>
          </h1>

          <h4 style="color:green">
            <center>
              Giá: <?php echo $value['price'] . "$  "; ?>
              <span style="margin-left: 30px;"><a href="product.php?id=<?php echo $value['id'] ?>">Xem chi tiết >>></a></span>
            </center>
          </h4>
          <center>
            <?php if (isset($_SESSION['id'])) { ?>
              <button data-id="<?php echo $value['id'] ?>" class="js-btn-add-cart">
                Thêm vào gỏ hàng
              </button>
            <?php  } ?>
          </center>
          </p>
        </div>
      <?php endforeach ?>
    </div>
  </main>
</div>