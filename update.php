<?php
  include('handing.php');
?>
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


<?php
    $update = new handing();
    $id = $_REQUEST['id'];
    $row = $update->uploadUD($id);
    $magoc = $row["mssv"];
?>


<div class="container">
    <h2>sửa thông tin sinh viên</h2>
    <?php if (isset($_GET["id"])): ?>
  <form  method="POST">
    <div class="form-group">
    <input type="hidden" value="<?php echo $id ?>" name="id"/>
      <label for="hoten">Họ Tên :</label>
      <input type="text" class="form-control" value="<?php echo $row["hoten"]; ?>" id="hoten" placeholder="Họ tên sinh viên" name="hoten">
    </div>
    <div class="form-group">
        <label for="mssv">Mã số sinh viên :</label>
        <input type="text" class="form-control" id="mssv" value="<?php echo $row["mssv"]; ?>" placeholder="mã số sinh viên" name="mssv">
      </div>
      <div class="form-group">
        <label for="ngaysinh">Ngày sinh :</label>
        <input type="date" class="form-control" id="ngaysinh"  value="<?php echo $row["ngaysinh"]; ?>" name="ngaysinh">
      </div>
    <button type="submit" class="btn btn-default" name="btn_update">Lưu</button>


  </form>
  
<?php
    
    $update->update($id,$magoc);
?>

  <?php endif; ?>


  
</div>
</body>
</html>


