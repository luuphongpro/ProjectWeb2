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
    function locsanpham($tensp,$category){
        $this->conn -> constructor();
        $strSQL = "SELECT * FROM product WHERE MaTL LIKE '.$category.' && category LIKE '.$tensp." ;
        $result = $this->conn-> excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;

    }
    function xoasanpham($id){
        $this->conn -> constructor();
        $strSQL = "DELETE FROM product WHERE MaSP = '.$id.' ";
        $result = $this->conn-> excuteSQL($strSQL);
        $this->conn->disconnect();
        // return $result;

    }

    function suasanpham($data){
        $this->conn->constructor();
        $strSQL = "UPDATE product 
                   SET TenSP = '".$data['tensp']."', 
                       SoLuongSP = ".$data['soluong'].", 
                       GiaSP = ".$data['cost'].", 
                       TTSP = '".$data['ttsp']."', 
                       IMG = '".$data['img']."', 
                       categoryID = ".$data['theloai']." 
                   WHERE MaSP = ".$data['masp'];
        $result = $this->conn->excuteSQL($strSQL);
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
?>