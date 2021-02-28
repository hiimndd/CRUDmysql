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
                //check mssv
                $data = null;
                $query = "SELECT * FROM `thongtin`";
                if($sql = $this->conn->query($query)){
                    while ($row = mysqli_fetch_assoc($sql)) {
                        $data[] = $row;
                    }
                }
                foreach($data as $row){
                    if($row["mssv"] === $mssv){
                    echo "Trùng mã sinh viên";
                    return 0;
                    }      
                }
                //done check
                $query = "INSERT INTO `thongtin`( `hoten`, `mssv`, `ngaysinh`) VALUES ('$hoten','$mssv','$ngaysinh') ";
                if($sql = $this->conn->query($query)){
                    echo "<script>alert('records added successfully');</script>";
                    header("Location: index.php");
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
                $data[] = $row;
            }
        }
        return $data;
    }
    public function uploadUD($id){
        
        $data = null;
        $query = "SELECT * FROM thongtin Where ID = '$id'";
        if($sql = $this->conn->query($query)){
            while ($row = $sql->fetch_assoc()) {
                $data = $row;
            }
        }
        return $data;
        
    }
    public function update($id,$magoc)
    {
        
        if(isset($_POST["btn_update"])){
            if(isset($id)){
                $hoten = $_POST["hoten"];
                $mssv = trim($_POST["mssv"]);
                $ngaysinh = $_POST["ngaysinh"];
                //check
                $data = null;
                $query = "SELECT * FROM `thongtin` where mssv != '$magoc'";
                if($sql = $this->conn->query($query)){
                    while ($row = mysqli_fetch_assoc($sql)) {
                        $data[] = $row;
                    }
                }
                foreach($data as $row){
                    if($row["mssv"] === $mssv){
                    echo "Trùng mã sinh viên";
                    return 0;
                    }      
                }
                //check done
                $query = " UPDATE `thongtin` SET `hoten`='$hoten',`mssv`='$mssv',`ngaysinh`='$ngaysinh' WHERE ID = '$id' ";
                if($sql = $this->conn->query($query)){
                    header("Location: index.php");
                }else{
                    echo "<script>alert('failed!');</script>"; 
                }
                }else{
                    echo "Giá trị ID không tồn tại!";
                }

            
        }
        
    }
    public function delete($id){
        
        $query = "DELETE FROM thongtin WHERE ID = '$id'";
        if($sql = $this->conn->query($query)){
            return true;
        }else{
            return false;
        }
    }
}

?>