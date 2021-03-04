<?php
    session_start();
    include('SinhVienManager.php');
    $delete = new SinhVienManager();
    $id = $_REQUEST['id'];
    if($delete->remove_SinhVien($id)){
        header("Location: index.php");
    }else{
        echo "<script>alert('failed!');</script>"; 
    }
    


?>