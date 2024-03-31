<?php 
    include './controller.php';

    $ussename=$_REQUEST['user_login'];
    $passpwd=$_REQUEST['password_login'];
    //Khởi tạo biến data để trả dữ liệu phản hồi
    $data=array(
        'flag' =>false,
        'name' =>'',
    );
    $dbdk=new controller;
    $dbdk->constructor();
    $strSQL='SELECT * FROM `account` WHERE SĐT='.$ussename;
    // echo $strSQL;
    $result = $dbdk->excuteSQL($strSQL);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
            if($row['Password']==$passpwd){
                $data['flag']=true;
                $data['name']=$row['TenND'];
            }
        }
    echo json_encode($data);
    $dbdk->disconnect();
?>