
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

    
    <h2>THÊM SINH VIÊN</h2>
    
    
  <form action="" method="POST">
    <div class="form-group">
      <label for="hoten">Họ Tên :</label>
      <input type="text" class="form-control" id="hoten" placeholder="Họ tên sinh viên" name="hoten">
    </div>
    <div class="form-group">
        <label for="mssv">Mã số sinh viên :</label>
        <input type="text" class="form-control" id="mssv" placeholder="mã số sinh viên" name="mssv">
      </div>
      <div class="form-group">
        <label for="ngaysinh">Ngày sinh :</label>
        <input type="date" class="form-control" id="ngaysinh"  name="ngaysinh">
      </div>
    <button type="submit" class="btn btn-default" name="btn_insert">Thêm sinh viên</button>
    

  </form>
  <?php
  include('handing.php');
  $model = new handing();
  $model->insert();
  ?>
</div>
</body>
</html>

