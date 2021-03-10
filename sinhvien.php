<?php
    

    class sinhvien {
        private $hoten;
        private $mssv;
        private $ngaysinh;
        private $ID;
        
        function set_hoten($hoten){
            $this->hoten = $hoten;
        }
        function set_mssv($mssv){
            $this->mssv = $mssv;
        }
        function set_ngaysinh($ngaysinh){
            $this->ngaysinh = $ngaysinh;
        }
        function set_ID($ID){
            $this->ID = $ID;
        }
        function get_hoten() {
            return $this->hoten;
        }
        function get_mssv() {
            return $this->mssv;
        }
        function get_ngaysinh() {
            return $this->ngaysinh;
        }
        function get_ID() {
            return $this->ID;
        }
        
    }
?>