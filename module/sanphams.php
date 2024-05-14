<?php 
    include './controller.php';
    $sanpham=new sanpham;
    if(isset($_REQUEST['tim'])){
        $id=$_REQUEST['id'];
        $result=$sanpham->timsanpham($id);
        $row=null;
        if(mysqli_num_rows($result)>0){
            $row=mysqli_fetch_assoc($result);
        }
        $data=json_encode($row);
        echo $data;
    }
    else if(isset($_REQUEST['thongke'])){
        if(isset($_REQUEST['dataJSON'])){
            $data=json_decode($_REQUEST['dataJSON']);
            $result=$sanpham->thongke($data);
        }
        else {
            $result=$sanpham->thongke();
        }
        $data=array();
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                $data[]=$row;
            }
        }
        echo json_encode($data);
    }
    else if(isset($_REQUEST['gettheloai'])){
        $result=$sanpham->gettheloai();
        $data=array();
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                $data[]=$row;
            }
        }
        echo json_encode($data);
    }
    else if(isset($_REQUEST['xoasp'])){
        $id=$_REQUEST['id'];
        $result=$sanpham->xoasanpham($id);
        if($result!=0){
            echo 'success';
        }
        else echo 'fail';
    }
    else if(isset($_REQUEST['sua'])){
        $data=$_REQUEST['dataJSON'];
        $result=$sanpham->suasanpham($data);
        return $result;
    }
?>