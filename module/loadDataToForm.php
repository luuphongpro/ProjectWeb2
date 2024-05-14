<?php
    include "controller.php";

    header("Content-Type: application/json");

    $taikhoan = new taikhoan();


    $input = file_get_contents('php://input');
    error_log($input);

    $data = json_decode($input, true);
    $sdt = $data['SĐT'];

    $result=  $taikhoan -> timtaikhoan($sdt);
    $infortaikhoan = array();
    if($result){
        while($row = $result ->fetch_assoc()){
            $infortaikhoan[] = $row;
        }
        echo json_encode([
            "message" => "success",
            "result" => $infortaikhoan
        ]);
        return;
    }
    else{
        echo json_encode([
            "message" => "false"
        ]);
    }
    return;

?>