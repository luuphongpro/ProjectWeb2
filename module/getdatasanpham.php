<?php
    include "controller.php";
    $sanpham = new sanpham();
    header("Content-Type: application/json");


    $input = file_get_contents('php://input');
    error_log($input);

    $data = json_decode($input, true);

    $masp = $data['MASP'];

    $result = $sanpham -> getMaImg($masp);

    $listsp = array();

    if($result){
        while($row = $result -> fetch_assoc()){
            $listsp[] = $row;
        }
        echo json_encode([
            "message" => "success",
            "result" => $listsp
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