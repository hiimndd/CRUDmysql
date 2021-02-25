<?php
class handing{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "sinhvien";
    private $conn;
    
    public function __construct(){
        try{
            $this->conn = new mysqli($this->servername,$this->username,$this->password,$this->db);
        }catch(Exception $e){
            echo "connect failed : ".$e->getMessage();
        }
    }
    public function insert(){

            if(isset($_POST["btn_insert"])){
                $hoten = $_POST["hoten"];
                $mssv = $_POST["mssv"];
                $ngaysinh = $_POST["ngaysinh"];
                
                $query = "INSERT INTO `thongtin`( `hoten`, `mssv`, `ngaysinh`) VALUES ('$hoten','$mssv','$ngaysinh') ";
                if($sql = $this->conn->query($query)){
                    echo "<script>alert('records added successfully');</script>";
                }else{
                    echo "<script>alert('failed!');</script>"; 
                }
            }
    }
    public function display(){
        $data = null;
        $query = "SELECT * FROM `thongtin`";
        if($sql = $this->conn->query($query)){
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[]= $row;
            }
        }
        return $data;
    }
}

?>