<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="#">
    Điền gì đó đi
    <input type="text" name="ten" id="ten">
    <div id="ketqua"></div>
  </form>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#ten").keydown(function() {
        let ten = $(this).val();
        $("#ketqua").text("Bạn khùng hã " + ten);
      })
    })
  </script>
</body>

</html>