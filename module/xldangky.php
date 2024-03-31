<?php 
    include './controller.php';
    
    $data = json_decode($_POST['jsonData'], true);
    $db=new controller;
    $db->constructor();
    $strSQL='SELECT * FROM `account` WHERE `SĐT`='.$data['user1_register'];
    $result=$db->excuteSQL($strSQL);
    if($result->num_rows == 0){
        //Tạo tài khoản thôi
        $strSQL = "INSERT INTO `account` (`TenND`, `SĐT`, `MaQuyen`, `Status`, `CreTime`, `Password`) 
           VALUES ('" . $data['username_register'] . "', '" . $data['user1_register'] . "', 'KH', 'Đang hoạt động',NOW(), '".$data['password_register']."')";
        $db->excuteSQL($strSQL);
        echo '1';
    }
    else {
        //Tài khoản tồn tại
        echo '0';
    }
    $db->disconnect();
?>