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
        $this->conn -> constructor();
        $strSQL = "SELECT * FROM product WHERE MaSP = '.$id.' ";
        $result = $this->conn-> excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;

    }
    function locsanpham($category){
        $this->conn -> constructor();
        $strSQL = "SELECT * FROM product WHERE MaTL = '.$category.' ";
        $result = $this->conn-> excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;

    }
    function xoasanpham($id){
        $this->conn -> constructor();
        $strSQL = "DELETE FROM product WHERE MaSP = '.$id.' ";
        $result = $this->conn-> excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;

    }

    function suasanpham($id){
        $this->conn -> constructor();
        $strSQL = "UPDATE product
                    VALUE TenSP = ".$id['']." , SoLuongSP = ".$id['']." , GiaSP = ".$id['']." , TTSP = ".$id['']." , IMG = ".$id['']." , categoryID =".$id['']." 
                     WHERE MaSP = '.$id.' ";
        $result = $this->conn-> excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;

    }
    function themsanpham($data){
        $this->conn -> constructor();
        $strSQL = "INSERT INTO `product` (`MaSP` ,`TenSP` , `SoLuongSP` , `GiaSP` , `TTSP` , `IMG` , `categoryId`)
                    VALUE ('".$data['masp']."', '".$data['tensp']."', '".$data['soluong']."', '".$data['cost']."', '".$data['ttsp']."', '".$data['img']."', '".$data['theloai']."')  ";
        $result = $this->conn-> excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;

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
?>;