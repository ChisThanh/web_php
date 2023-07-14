<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>test</title>
</head>

<body>
  <h1>Hello</h1>
  <h2>Chọn móc thời gian</h2>
  <input type="date" value="<?php echo date('Y-m-d') ?>"> Ngày hôm nay
  <br>
  <input type="week">Tuần
  <br>
  <input type="month">Tháng này
  <br>
  <select name="" id="">
    <?php for ($i = date('Y'); $i >= 2020; $i--) { ?>
      <option value="<?php echo $i ?>"><?php echo $i ?></option>
    <?php } ?>
  </select>

</body>

</html>