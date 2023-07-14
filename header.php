<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>


<header>
  <ul>
    <li><a href="index.php">Trang chủ</a></li>


    <?php
    if (empty($_SESSION['id'])) {
      echo "
      <li><a href='signin.php'>Đăng nhập</a></li>
      <li><a href='signup.php'>Đăng ký</a></li>";
    } else {
      echo " <li><a href='signout.php'>Đăng xuất</a></li> ";
    }
    ?>
    <?php
    if (isset($_SESSION['id'])) {
      $name = $_SESSION['name'];
      echo "<li><a href='user.php'>$name</a></li>";
    }
    ?>
    <li><a href='view_cart.php'>Xem giỏ hàng</a></li>
    <li><a href="#"></a></li>
  </ul>
</header>