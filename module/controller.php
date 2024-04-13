<?php
    include 'connect.php';
class sanpham{
    private $conn;
    function __construct(){
        $this->conn=new connect;
    }
    function dssanpham(){
        $this->conn->constructor();
        $strSQL="SELECT * FROM product WHERE 1";
        $result=$this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    function timsanpham($id){

    }
    function locsanpham($category){

    }
    function xoasanpham(){

    }


}
class taikhoan{
    private $conn;
    function __construct(){
        $this->conn=new connect;
    }
    function timtaikhoan($SDT){
        $this->conn->constructor();
        $strSQL="SELECT * FROM `account` WHERE SĐT='".$SDT."'";
        $retult=$this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $retult;
    }
    function taotaikhoan($data){
        $strSQL = "INSERT INTO `account` (`TenND`, `SĐT`, `MaQuyen`, `Status`, `CreTime`, `Password`) 
           VALUES ('" . $data['username_register'] . "', '" . $data['user1_register'] . "', 'KH', 'Đang hoạt động',NOW(), '".$data['password_register']."')";
        $result=$this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
}
?>