<?php
  
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
include('handing.php');


?>
<div class="container">
  <h2>Danh sách sinh viên</h2>
  
  <a href="student.php?type=text"><button type="button" class="btn btn-default" name="bttxt">Thêm vào file text</button></a> 
  <a href="student.php?type=json"><button type="button" class="btn btn-default " name="btjson">Thêm vào file Json</button></a> 
  <a href="student.php?type=xml"><button type="button" class="btn btn-default" name="btxml" >Thêm vào file xml</button></a>
		
  
  
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
  
            $model = new handing();
            $rows = $model->display();
            if(!empty($rows)){
            foreach($rows as $row){
            
            
            ?>
      <tr>
        <td><?php  echo $row["hoten"]."<br>"; ?></td>
        <td><?php  echo $row["mssv"]."<br>"; ?></td>
        <td><?php  echo $row["ngaysinh"]."<br>"; ?></td>
        <td><a href = "editjson.php?id=<?php echo $index; ?>"><button type="button" class="btn btn-primary">sửa</button><a> </a><a href = "deletejson.php?id=<?php echo $index; ?>" onclick="return confirm('Bạn có chắc muốn xóa thông tin này trong file json?')"><button type="button" class="btn btn-primary">xóa</button></a></td>
        
        <?php } }?>
      </tr>
    </tbody>
  </table>
  
</div>

</body>
</html>
