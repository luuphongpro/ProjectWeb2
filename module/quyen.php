<?php
    include 'controller.php';
    $chitietquyen=new chitietquyen;
    $quyen=new quyen;
    $chucnang=new chucnang;
    if(isset($_REQUEST['them'])){
        $arrChucNang=array();
        $msqlChucNang=$chucnang->dschucnang();
        $dataJSON=$_REQUEST['dataJSON'];
        $data=json_decode($dataJSON);
        $result = $quyen->themquyen($data);
        if(mysqli_num_rows($msqlChucNang)>0){
            while($row=mysqli_fetch_assoc($msqlChucNang)){
                $chitietquyen->setchitietquyen($row['MaChucnang'],$data);
            }
        }
        if($result!=0){
            echo 'success';
        }
        else echo 'fail';
    }
    else if(isset($_REQUEST['tim'])){
        $id=$_REQUEST['id'];
        $result=$quyen->timquyen($id);
        $array=array();
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                $array[]=$row;
            }
            echo json_encode($array);
        }
        else {
            echo 0;
        }
    }
    else if(isset($_REQUEST['sua'])){
        $data=$_REQUEST['dataJSON'];
        $data=json_decode($data);
        $msqlChucNang=$chucnang->dschucnang();
        $result=$quyen->suaquyen($data);
        if(mysqli_num_rows($msqlChucNang)>0){
            while($row=mysqli_fetch_assoc($msqlChucNang)){
                $chitietquyen->suachitietquyen($row['MaChucnang'],$data);
            }
        }
        if($result!=0){
            echo 'success';
        }
        else echo 'fail';
    }
    else if(isset($_REQUEST['xoa'])){
        $id=$_REQUEST['id'];
        $result=$quyen->xoaquyen($id);
        if($result!=0){
            echo 'success';
        }
        else echo 'fail';
    }
    else if(isset($_REQUEST['get'])){
        $result=$quyen->dsquyen();
        $data=array();
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                $data[]=$row;
            }
        }
        echo json_encode($data);
    }
    else if(isset($_REQUEST['chitiet'])){
        $maquyen=$_REQUEST['id'];
        $result=$chitietquyen->getchitiet($maquyen);
        $array=array();
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                $array[]=$row;
            }
        }
        echo json_encode($array);
    }
?>