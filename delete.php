<?php
    session_start();
    include('handing.php');
    $delete = new handing();
    echo $_REQUEST['id'];
    if($delete->delete($id)){
        header("Location: index.php");
    }else{
        echo "<script>alert('failed!');</script>"; 
    }
    


?>