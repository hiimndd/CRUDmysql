<?php

session_start();
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

<div class="container">
<?php
    function chainss($i){
      if(isset($_SESSION["chain"])){
        echo $_SESSION["chain"][$i];
      }
    }
?>
    
    <h2>THÊM SINH VIÊN</h2>
    <a href="index.php?type=text"><button type="button" class="btn btn-default" name="bttxt">Về Trang Chính</button></a> 
    
  <form action="" method="POST">
    <div class="form-group">
    
      <label for="hoten">Họ Tên :</label>
      
      <input type="text" class="form-control" id="hoten" value="<?php chainss(0); ?>" placeholder="Họ tên sinh viên" name="hoten">
    </div>
    <div class="form-group">
        <label for="mssv">Mã số sinh viên :</label>
        <input type="text" class="form-control" id="mssv" value="<?php chainss(1); ?>" placeholder="mã số sinh viên" name="mssv">
      </div>
      <div class="form-group">
        <label for="ngaysinh">Ngày sinh :</label>
        <input type="date" class="form-control" id="ngaysinh" value="<?php chainss(2); ?>" name="ngaysinh">
      </div>
    <button type="submit" class="btn btn-default" name="btn_insert">Thêm sinh viên</button>
    

  </form>
  <?php if(isset($_SESSION["message"])){
          echo $_SESSION["message"];
    } ?>
  <?php
  $_SESSION["message"] = "";
  include('SinhVienManager.php');
  $model = new SinhVienManager();
  if(isset($_POST["btn_insert"])){
    if(empty($_POST["hoten"]) == true or empty($_POST["mssv"]) == true or empty($_POST["ngaysinh"]) == true){
      $chain = array($_POST["hoten"],$_POST["mssv"],$_POST["ngaysinh"]);
      $_SESSION["chain"] = $chain;
      $_SESSION["message"] = "Không thể để trống!";
      header("Location: insert.php");
      return $_SESSION["chain"];
    }
    if(isset($_SESSION["chain"])){
      session_unset();
    }
    if($model->add_SinhVien($_POST["hoten"],$_POST["mssv"],$_POST["ngaysinh"])==0){
      $_SESSION["chain"] = array($_POST["hoten"],$_POST["mssv"],$_POST["ngaysinh"]);
      $_SESSION["message"] = "Trùng Mã sinh viên!";
      header("Location: insert.php");
    }
    
   

  }

  ?>
  
</div>
</body>
</html>

