<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>shop</title>
  <link rel="stylesheet" href="style.css">
</head>



<body>
  <center>
    <h1>Đây là giao diện khách hàng</h1>
  </center>
  <?php include "./header.php"; ?>
  <?php include "./main.php"; ?>
  <?php include "./footer.php"; ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

  <script>
    $(document).ready(function() {
      $('.js-btn-add-cart').click(function() {
        let id = $(this).data('id');
        $.ajax({
          type: "GET",
          url: "add_to_cart.php",
          data: {
            id
          },
          // dataType: "dataType",
          success: function(response) {
            if (response == 1) {
              alert("thành công");
            } else {
              alert('Thất bại');
            }
          }
        });
      })
    });
  </script>
</body>

</html>