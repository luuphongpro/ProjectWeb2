<?php
    include "controller.php";
    header("Content-Type: application/json");

    $chitiethoadon = new chitiethoadon();

    $input = file_get_contents('php://input');
    error_log($input);

    $data = json_decode($input, true);

    $mahd = $data['MAHD'];
    $listchitiet = array();


    $result = $chitiethoadon -> listchitiet($mahd);
    if($result){
        while($row = $result -> fetch_assoc()){
            $listchitiet[] = $row; 
        }
        echo json_encode([
            "message" => "success",
            "result" => $listchitiet
        ]);
        return;
    }else{
        echo json_encode([
            "message" => "false"
        ]);
    }
    return


?>