<?php
    include_once 'connectpdo.php';
    Class SinhVienManager extends connectpdo{
        private $list_SinhVien = null;
        public function getListSinhVien($query){
            $sql = $this->conn->prepare($query);
            $sql->execute();
            if($sql->rowCount()>0)
            {
                while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
                    $this->list_SinhVien[] = $row;
                }
            }
            return $this->list_SinhVien;
        }
        public function load_ds_SinhVien($filetype = 'text'){
            
        }
        public function save_ds_SinhVien($filetype = 'text'){
        
        }
        public function add_SinhVien($hoten,$mssv,$ngaysinh){
            //check mssv
            $querycheck = "SELECT * FROM `thongtin`";
            if($this->checkID($querycheck,$mssv)){
                echo "Trùng khóa chính";
                return 0;
            }
                
            //done check                
            $query = "INSERT INTO `thongtin`( `hoten`, `mssv`, `ngaysinh`) VALUES ('$hoten','$mssv','$ngaysinh') ";
            if($sql = $this->conn->prepare($query)){
                $sql->execute();
                echo "<script>alert('records added successfully');</script>";
                header("Location: index.php");
            }else{
                echo "<script>alert('failed!');</script>"; 
            }
            
        }
        

        public function edit_SinhVien($id,$magoc,$hoten,$mssv,$ngaysinh){
            if(isset($id)){
                //check
                $querycheck = "SELECT * FROM `thongtin` where mssv != '$magoc'";
                if($this->checkID($querycheck,$mssv)){
                    echo "Trùng khóa chính";
                    return 0;
                }
                //done
                $query = " UPDATE `thongtin` SET `hoten`='$hoten',`mssv`='$mssv',`ngaysinh`='$ngaysinh' WHERE ID = '$id' ";

                if($sql = $this->conn->prepare($query)){
                    $sql->execute();
                    header("Location: index.php");
                }else{
                    echo "<script>alert('failed!');</script>"; 
                }
            }else{
                echo "Giá trị ID không tồn tại!";
            }
        }
        public function remove_SinhVien($id){
            $query = "DELETE FROM thongtin WHERE ID = '$id'";
            if($sql = $this->conn->prepare($query)){
                $sql->execute();
                return true;
            }else{
                return false;
            }
        }
        public function checkID($query,$mssv){
            $data = null ;
            $sql = $this->conn->prepare($query);
            $sql->execute();
            if($sql->rowCount()>0){
                while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
                    $data[] = $row;
                }
            }
            foreach($data as $row){
                if($row["mssv"] === $mssv){
                    return true;
                }      
            }

            return false;
        }
        
    }
?>