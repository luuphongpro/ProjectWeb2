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
            $strSQL = "SELECT * FROM product WHERE MaSP = '".$id."' ";
            $result = $this->conn-> excuteSQL($strSQL);
            $this->conn->disconnect();
            return $result;

        }
        function locsanpham($tensp, $category){
            $this->conn->constructor();
            $strSQL = "SELECT * FROM product WHERE `TenSP` LIKE '%$tensp%'  && `categoryId` LIKE  '%$category%' ";
            $result = $this->conn->excuteSQL($strSQL);
            $this->conn->disconnect();
            return $result;
        }
        
        
        function xoasanpham($id){
            $this->conn->constructor();
            $strSQL = "DELETE FROM product WHERE MaSP = '" . $id . "'";
            $result = $this->conn->excuteSQL($strSQL);
            $this->conn->disconnect();
            return $result;
        }
        

        function suasanpham($data){
            $this->conn->constructor();
            $strSQL = "UPDATE product 
                    SET TenSP = '".$data['tensp']."', 
                        SoLuongSP = ".$data['soluong'].", 
                        GiaSP = ".$data['cost'].", 
                        TTSP = '".$data['ttsp']."',";
        
            if (!empty($data['img'])) {
                $strSQL .= " IMG = '".$data['img']."',";
            }
        
            $strSQL .= " categoryID = ".$data['theloai']." 
                    WHERE MaSP = '".$data['masp']."' ";  
        
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

        function countProductsByCategory($category){
            $this->conn->constructor();
            $strSQL = "SELECT COUNT(*) AS count FROM product WHERE categoryId = ".$category." ";
            $result = $this->conn->excuteSQL($strSQL);
            $row = mysqli_fetch_assoc($result);
            $count = $row['count'];
            $this->conn->disconnect();
            return $count;         
        }
        function thongke($data=null){
            $this->conn->constructor();
            $conditions = array();
            if($data && $data->FormTimeST && $data->ToTimeST){
                $conditions[] = "hoadon.CreTime BETWEEN '".$data->ToTimeST."' AND '".$data->FormTimeST."'";
            }
            if($data && $data->categoryST && $data->categoryST != '0'){
                $conditions[] = "product.categoryId = '".$data->categoryST."'";
            }
            $strSQL = "SELECT 
                            SUM(chitiethoadon.DonGia) AS totalTong, 
                            product.MaSP, 
                            chitiethoadon.DonGia, 
                            product.TenSP, 
                            SUM(chitiethoadon.SoLuong) AS totalSL, 
                            product.IMG
                        FROM 
                            chitiethoadon
                        LEFT JOIN 
                            product ON chitiethoadon.MaSP = product.MaSP
                        LEFT JOIN 
                            hoadon ON chitiethoadon.MaHoadon = hoadon.MaHoadon";
        
            if (!empty($conditions)) {
                $strSQL .= " WHERE " . implode(" AND ", $conditions);
            } else {
                $strSQL .= " WHERE 1";
            }
            $strSQL .= " GROUP BY product.MaSP, chitiethoadon.DonGia, product.TenSP, product.IMG";
            $result = $this->conn->excuteSQL($strSQL);
            $this->conn->disconnect();
            return $result;
        }
        
        function gettheloai()  {
            $this->conn->constructor();
            $strSQL="SELECT * FROM `category`";
            $result=$this->conn->excuteSQL($strSQL);
            $this->conn->disconnect();
            return $result;
        }


        function getMaImg($masp){
            $this->conn->constructor();
            $strSQL="SELECT TenSP , IMG FROM `product` WHERE MaSP = '".$masp."' ";
            $result=$this->conn->excuteSQL($strSQL);
            $this->conn->disconnect();
            return $result;
        }
}


class xemlaidonhang{
    private $conn;
    function __construct(){
        $this->conn = new connect;
    }

    function listdonhang($sodt){
        $this ->conn->constructor();
        $strSQL = "SELECT * FROM `hoadon` WHERE MaUser = '".$sodt."' ";
        $result = $this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
}


class chitiethoadon{
    private $conn;
    function __construct(){
        $this->conn = new connect;
    }

    function listchitiet($mahd){
        $this ->conn ->constructor();
        $strSQL = "SELECT * FROM chitiethoadon WHERE MaHoadon = '".$mahd."' ";
        $result = $this ->conn -> excuteSQL($strSQL);
        $this -> conn -> disconnect();
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
        $strSQL="SELECT * FROM `account` WHERE SĐT = '".$SDT."' ";
        $retult=$this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $retult;
    }
    function taotaikhoan($data){
        $this->conn->constructor();
        $strSQL = "INSERT INTO `account` (`TenND`, `SĐT`, `MaQuyen`, `Status`, `CreTime`, `Password`, `Address`) 
           VALUES ('" .$data->TenND. "', '" . $data->SDT. "', 'KH', 'Đang hoạt động', NOW(), '".$data->Password."','".$data->Address."')";
        $result=$this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    function suataikhoan($data){
        $this->conn->constructor();
        $strSQL="UPDATE `account` SET `TenND`='".$data->TenND."',`MaQuyen`='".$data->MaQuyen."',`Address`='".$data->Address."',`Password`='".$data->Password."' WHERE `SĐT`=".$data->SĐT."";
        $result=$this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    function dstaikhoan(){
        $this->conn->constructor();
        $strSQL="SELECT * FROM `account` WHERE `Status`='Đang hoạt động'";
        $result=$this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    function xoataikhoan($sdt){
        $this->conn->constructor();
        $strSQL="UPDATE `account` SET `Status`='Delected' WHERE `SĐT`='".$sdt."'";
        $result=$this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }

    function suataikhoan2_0($data){
        $this->conn->constructor();
        $strSQL="UPDATE `account` SET `TenND`='".$data['tennd']."',
                        `Address`='".$data['diachi']."',
                        `Password`='".$data['matkhau']."'
                        WHERE `SĐT`=".$data['sdt']."";
        $result=$this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }

}
class donhang{
    private $conn;
    private $madonhang;
    function __construct(){
        $this->conn=new connect;
    }
    function setHoadon($data) {
        $this->conn->constructor();
        $strSQL="SELECT COUNT(*) as total FROM hoadon;";
        $result=$this->conn->excuteSQL($strSQL);
        $row=mysqli_fetch_assoc($result);
        $this->madonhang=$row['total']+1;
        $strSQL = "INSERT INTO `hoadon` (`MaHoadon`, `CreTime`, `TTHoaDon`, `TongTien`, `MaUser`) 
        VALUES ('" . ($this->madonhang) . "', NOW(), '0', '" . $data->tong . "','" . $data->SĐT . "')";
        $result=$this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    
    function setChiTietDonHang($data){
        $this->conn->constructor();
        $strSQL="INSERT INTO `chitiethoadon`(`SoLuong`, `DonGia`,`MaHoadon`, `MaSP`) 
        VALUES ('".$data->soluong."','".$data->gia."','".($this->madonhang)."','".$data->MaSP."')";
        $result=$this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
}
class quyen{
    private $conn;
    function __construct(){
        $this->conn=new connect;
    }
    function dsquyen(){
        $this->conn->constructor();
        $strSQL="SELECT quyen.MaQuyen, quyen.TenQuyen, account.TenND, quyen.ThoiGian FROM `quyen` 
        LEFT JOIN account ON account.SĐT=quyen.SĐT
        WHERE TrangThai='active'";
        $result=$this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    function timquyen($id){
        $this->conn -> constructor();
        $strSQL = "SELECT * 
        FROM quyen 
        LEFT JOIN chitietquyen ON chitietquyen.MaQuyen=quyen.MaQuyen
        WHERE quyen.MaQuyen = '".$id."' AND quyen.TrangThai='active'";
        $result = $this->conn-> excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    function locquyen($tenquyen, $category){
        $this->conn->constructor();
        $strSQL = "SELECT * FROM chucnang WHERE `TenChucnang` LIKE '%$tenquyen%'  && `categoryId` LIKE  '%$category%' ";
        $result = $this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    
    

    function xoaquyen($id){
        $this->conn->constructor();
        $strSQL = "UPDATE `quyen` SET `TrangThai`='deleted' WHERE MaQuyen='".$id."'";
        $result = $this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    

    function suaquyen($data){
        $this->conn->constructor();
        $strSQL = "UPDATE `quyen` SET `TenQuyen`='".$data->TenQuyen."',`MaQuyen`='".$data->MaQuyen."'
        WHERE MaQuyen='".$data->MaCu."' AND quyen.TrangThai='active'" ;  
        $result = $this->conn->excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    

    function themquyen($data){
        $this->conn->constructor();
        $strSQL = "INSERT INTO `quyen`(`TenQuyen`, `MaQuyen`, `TrangThai`, `SĐT`, `ThoiGian`) 
        VALUES ('".$data->TenQuyen."','".$data->MaQuyen."','active','".$data->SĐT."',NOW())";
        $result = $this->conn-> excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
}
class chucnang {
    private $conn;
    function __construct(){
        $this->conn=new connect;
    }
    function dschucnang(){
        $this->conn->constructor();
        $strSQL = "SELECT * FROM `chucnang` WHERE Active=1";
        $result = $this->conn-> excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    
}
class chitietquyen {
    private $conn;
    function __construct(){
        $this->conn=new connect;
    }
    function setchitietquyen($machucnang,$data){
        $this->conn->constructor();
        $strSQL = "INSERT INTO `chitietquyen`(`MaChucnang`, `MaQuyen`, `Xem`, `Them`, `Sua`, `Xoa`) 
        VALUES ('".$machucnang."','".$data->MaQuyen."','".$data->$machucnang[0]."','".$data->$machucnang[1]."','".$data->$machucnang[2]."','".$data->$machucnang[3]."')";
        $result = $this->conn-> excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    function suachitietquyen($machucnang,$data){
        $this->conn->constructor();
        $strSQL = "UPDATE `chitietquyen` 
        SET `Xem`='".$data->$machucnang[0]."',`Them`='".$data->$machucnang[1]."',`Sua`='".$data->$machucnang[2]."',`Xoa`='".$data->$machucnang[3]."' 
        WHERE `MaQuyen`='".$data->MaQuyen."' AND `MaChucnang`='".$machucnang."'";
        $result = $this->conn-> excuteSQL($strSQL);
        $this->conn->disconnect();
        return $result;
    }
    function getchitiet($maquyen){
        $this->conn->constructor();
        $strSQL="SELECT * FROM `chitietquyen` WHERE `MaQuyen`='".$maquyen."'";
        $result=$this->conn->excuteSQL($strSQL);
        return $result;
    }
}
?>