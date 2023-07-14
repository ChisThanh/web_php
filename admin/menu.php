<ul>

  <li><a href="../root">Trang chủ</a></li>
  <li><a href="../manufactures">Quản lý nhà sản xuất</a></li>
  <li><a href="../products">Quản lý nhà sản phẩm</a></li>
  <li><a href="../orders">Quản lý đơn hàng</a></li>
  <?php
  // echo $_SESSION['level'];
  if (isset($_SESSION['level'])) {
    echo "<li><a href='../signout.php'>Đăng xuất</a></li>";
  }

  ?>

</ul>

<?php if (isset($_GET['error'])) { ?>
  <span style="color:red"> <?php echo $_GET['error'] ?></span>
  <br>
<?php  } ?>


<?php if (isset($_GET['success'])) { ?>
  <span style="color:green"> <?php echo $_GET['success'] ?></span>
  <br>
<?php  } ?>