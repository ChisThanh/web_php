<?php
$id = $_GET['id'];
require "./admin/connect.php";
$sql = "select * from products where id ='$id'";
$result = mysqli_query($connect, $sql);
$value = mysqli_fetch_array($result);
?>
<div class="container">
  <main>
    <div class="product-big">
      <div class="item-big">
        <center>
          <div class="img">
            <img src="./admin/products/<?php echo $value["image"] ?>" alt="#" height="50%">
          </div>
        </center>

        <p>
        <h1>
          <center>
            <?php echo $value['name'] ?>
          </center>
        </h1>

        <h4 style="color:green">
          <center>
            Giá: <?php echo $value['price'] ?>
          </center>
        </h4>
        <p>
          <center>
            <?php echo $value['description'] ?>
          </center>
        </p>
        </p>
      </div>
    </div>
  </main>
</div>