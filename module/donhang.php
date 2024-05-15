<?php 
    include 'controller.php';
    $donhang=new donhang;
    $sanpham=new sanpham;
    if(isset($_REQUEST['set'])){
        $data=$_REQUEST['dataJSON'];
        $data=json_decode($data);
        $flagHoaDon=$donhang->setHoadon($data);
        if(is_array($data->arr)){
            foreach($data->arr as $item){
                $flagChiTiet=$donhang->setChiTietDonHang($item);
            }
        }
        else {
            $flagChiTiet=$donhang->setChiTietDonHang($data->arr[0]);
        }
        if($flagHoaDon!=0){
            echo "sucsess";
        }
        else {
            echo "fail";
        }
    }
    else if(isset($_REQUEST['xuly'])){
        $id=$_REQUEST['id'];
        $result=$donhang->getdssanpham($id);
        $flag=true;
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                if($row['SoLuong']>$sanpham->gettonkho($row['MaSP'])){
                    $flag=false;
                    echo 'fail';
                }
            }
        }
        if($flag){
            $result=$donhang->getdssanpham($id);
            while($row=mysqli_fetch_assoc($result)){
                $tonkho=(int)$sanpham->gettonkho($row['MaSP'])-$row['SoLuong'];
                $sanpham->settonkho($row['MaSP'],$tonkho);
            }
            $result=$donhang->xulydonhang($id,1);
            if($result!=0){
                echo 'success';
            }
            else {echo 'fail';}
        }
        
    }
    else if(isset($_REQUEST['huy'])){
        $id=$_REQUEST['id'];
        $result=$donhang->xulydonhang($id,4);
        if($result!=0)
            echo 'success';
        else echo 'fail';
    }
?>