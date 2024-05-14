<?php
    include "controller.php";

    $taikhoan = new taikhoan();

    // $tennd = $_POST['loginname'];
    // $sdt = $_POST['phone'];
    // $address = $_POST['address'];
    // $passpwd = $_POST['password'];

    // $data = array(
    //     "tennd" => $tennd,
    //     "sdt" => $sdt,
    //     "address" => $address,
    //     "password" => $passpwd
    // );


    // $result = $taikhoan -> suataikhoan2_0($data);
    // if($result){
    //     echo json_encode([
    //         "message" => "success",
    //     ]);
    //     return;
    // }
    // else{
    //     echo json_encode([
    //         "message" => "false"
    //     ]);
    // }
    // return;


    if($_REQUEST['loadtoform']){
        $sdt = $_REQUEST['sdt'];

        $result=  $taikhoan -> timtaikhoan($sdt);

        if($result){
            echo json_encode([
                "message" => "success",
            ]);
            return;
        }
        else{
            echo json_encode([
                "message" => "false"
            ]);
        }
        return;
    }

?>