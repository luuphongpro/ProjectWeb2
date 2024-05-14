<?php
    include "controller.php";

    $taikhoan = new taikhoan();

    $tennd = $_POST['loginname'];
    $sdt = $_POST['phone'];
    $diachi = $_POST['address'];
    $matkhau = $_POST['password'];

    $data = array(
        "tennd" => $tennd,
        "sdt" => $sdt,
        "diachi" => $diachi,
        "matkhau" => $matkhau
    );

    $result = $taikhoan -> suataikhoan2_0($data);

    if($result){
        echo json_encode([
            "message" => "success"
        ]);
        return;
    }else{
        echo json_encode([
            "message" => "false"
        ]);
    }



?>