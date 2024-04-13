<?php 
    include './controller.php';
    $taikhoan=new taikhoan;
    $ussename=$_REQUEST['user_login'];
    $passpwd=$_REQUEST['password_login'];
    //Khởi tạo biến data để trả dữ liệu phản hồi
    $data=array(
        'flag' =>false,
        'name' =>'',
    );
    // echo $strSQL;
    $result=$taikhoan->timtaikhoan($ussename);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
            if($row['Password']==$passpwd){
                $data['flag']=true;
                $data['name']=$row['TenND'];
            }
        }
    echo json_encode($data);
?>