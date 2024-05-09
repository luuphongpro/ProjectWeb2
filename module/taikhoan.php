<?php 
    include './controller.php';
    $taikhoan=new taikhoan;
    if(isset($_REQUEST['them'])){
        $data = json_decode($_REQUEST['dataJSON'], true);
        $result=$taikhoan->timtaikhoan($data->user1_register);
        if($result->num_rows == 0){
            //Tạo tài khoản thôi
            $taikhoan->taotaikhoan($data);
            echo '1';
        }
        else {
            //Tài khoản tồn tại
            echo '0';
        }
    }
    else if(isset($_REQUEST['tim'])){
        $data=json_decode($_REQUEST['dataJSON']);
        $result=$taikhoan->timtaikhoan($data->user1_register);
        $data=new stdClass();
        if($result->num_rows == 0){
            //Tài khoản không tồn tại
            $data->flag=false;
            echo json_encode($data);
        }
        else {
            //Tài khoản tồn tại
            $data->flag=true;
            $data->row=mysqli_fetch_assoc($result);
            echo json_encode($data);
        }
    }
    else if(isset($_REQUEST['get'])){
        $result=$taikhoan->dstaikhoan();
        $arraccount=array();
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                $arraccount[]=$row;
            }
        }
        echo json_encode($arraccount);
    }
    else if(isset($_REQUEST['update'])){
        $data=$_REQUEST['dataJSON'];
        $data=json_decode($data);
        $result=$taikhoan->suataikhoan($data);
        echo $result;
    }
    else if(isset($_REQUEST['delete'])){
        $data=$_REQUEST['SDT'];
        $result=$taikhoan->xoataikhoan($data);
        echo $result;
    }
    else if(isset($_REQUEST['create'])){
        $data=$_REQUEST['dataJSON'];
        $data=json_decode($data);
        $result=$taikhoan->timtaikhoan($data->SDT);
        if(mysqli_num_rows($result)==0){
            $result=$taikhoan->taotaikhoan($data);
            echo 'success';
        }
        else {
            echo 'fail';
        }
    }
    // else if(isset($_REQUEST['sua'])){
    //     $data=json_decode($_REQUEST['dataJSON']);
    //     $result=$taikhoan->suataikhoan($data['user1_register']);
    //     if($result->num_rows == 0){
    //         //Tài khoản không tồn tại
    //         echo '0';
    //     }
    //     else {
    //         //Tài khoản tồn tại
    //         echo '1';
    //     }
    // }
?>