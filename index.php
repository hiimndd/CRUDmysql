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

include_once 'SinhVienManager.php';


?>
<div class="container">
  <h2>Danh sách sinh viên</h2>
  
  <a href="insert.php?type=text"><button type="button" class="btn btn-default" name="bttxt">Thêm Thông tin sinh viên</button></a> 
  
  
  
  <p>MYSQLI</p>
  <table class="table table-striped">
  <thead>
      <tr>
        <th>Họ tên</th>
        <th>Mã số sinh viên</th>
        <th>Ngày sinh</th>
        <th><th>
        <th><th>
      </tr>
    </thead>
  <tbody>
  <?php 
  
          $model = new SinhVienManager();
          $query = "SELECT * FROM `thongtin`";
          $rows = $model->getListSinhVien($query);
          if(!empty($rows)){
          foreach($rows as $row){
          
          ?>
        <tr>
        <td><?php  echo $row["hoten"]."<br>"; ?></td>
        <td><?php  echo $row["mssv"]."<br>"; ?></td>
        <td><?php  echo $row["ngaysinh"]."<br>"; ?></td>
        <td><a href = "update.php?id=<?php echo $row["ID"]; ?>"><button type="button" class="btn btn-primary">sửa</button><a> </a><a href = "delete.php?id=<?php echo $row["ID"]; ?>" onclick="return confirm('Bạn có chắc muốn xóa thông tin này trong file json?')"><button type="button" class="btn btn-primary">xóa</button></a></td>
        
        <?php } }?>
      </tr>
    </tbody>
  </table>
  
</div>

</body>
</html>
