<?php
    include_once 'connectpdo.php';
    include 'sinhvien.php';
    Class SinhVienManager extends connectpdo{
        private $list_SinhVien = null;
        
        public function getListSinhVien($query){
            
            $sql = $this->conn->prepare($query);
            $sql->execute();
            if($sql->rowCount()>0)
            {
                while ($row=$sql->fetch(PDO::FETCH_ASSOC)) {
                    $sv = new sinhvien();
                    $sv->set_hoten($row["hoten"]);
                    $sv->set_mssv($row["mssv"]);
                    $sv->set_ngaysinh($row["ngaysinh"]);
                    $sv->set_ID($row["ID"]);
                    $this->list_SinhVien[] = $sv;
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
            $querycheck = "SELECT * FROM `thongtin` where mssv = '$mssv'";
            if($this->checkID($querycheck,$mssv)){
                return 0;
            }
                
            //done check
            $sv = new sinhvien();
            
            $sv->set_hoten($hoten);
            $sv->set_mssv($mssv);
            $sv->set_ngaysinh($ngaysinh);


            $query = "INSERT INTO `thongtin`( `hoten`, `mssv`, `ngaysinh`) VALUES (:hoten, :mssv,:ngaysinh) ";
            
            if($sql = $this->conn->prepare($query)){
                $sql->bindParam(':hoten',$sv->get_hoten());
                $sql->bindParam(':mssv',$sv->get_mssv());
                $sql->bindParam(':ngaysinh',$sv->get_ngaysinh());
                $sql->execute();
                echo "<script>alert('records added successfully');</script>";
                header("Location: index.php");
            }else{
                echo "<script>alert('failed!');</script>"; 
            }
            return 1;
            
        }
        

        public function edit_SinhVien($id,$magoc,$hoten,$mssv,$ngaysinh){
            if(isset($id)){
                //check
                
                $querycheck = "SELECT * FROM `thongtin` where mssv = '$mssv' AND mssv != '$magoc'";
               
                if($this->checkID($querycheck,$mssv)){
                    echo "Trùng khóa chính";
                    return 0;
                }
                
                
                //done
                $sv = new sinhvien();
            
                $sv->set_hoten($hoten);
                $sv->set_mssv($mssv);
                $sv->set_ngaysinh($ngaysinh);
                $query = " UPDATE `thongtin` SET `hoten`= :hoten,`mssv`=:mssv,`ngaysinh`= :ngaysinh WHERE ID = :id ";

                if($sql = $this->conn->prepare($query)){
                    $sql->bindParam(':hoten',$sv->get_hoten());
                    $sql->bindParam(':mssv',$sv->get_mssv());
                    $sql->bindParam(':ngaysinh',$sv->get_ngaysinh());
                    $sql->bindParam(':id',$id);
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
            $query = "DELETE FROM thongtin WHERE ID = :id";
            if($sql = $this->conn->prepare($query)){
                $sql->bindParam(':id',$id);
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
                return true;
            }

            return false;
        }
        
        
    }
    
?>