<?php
require "../check_lognin_admin.php";
?>
<?php
require "../connect.php";

if (empty($_GET["id"])) {
  header('location: index.php.php?error=Phải truyền id');
  exit;
}
$id = $_GET["id"];
$sql = "delete from products where id = '$id'";

mysqli_query($connect, $sql);
mysqli_close($connect);

header('location: index.php?success=Xóa thành công!');
