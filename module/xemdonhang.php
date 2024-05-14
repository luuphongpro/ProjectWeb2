<?php
    header("Content-Type: application/json");
    include "controller.php";

    $xemlaidonhang = new xemlaidonhang();

    $input = file_get_contents('php://input');
    error_log($input);

    $data = json_decode($input, true);
    $sdt = $data['SĐT'];

    $listdonhang = array();
    $result = $xemlaidonhang->listdonhang($sdt);

    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            $listdonhang[] = $row;
        }
        echo json_encode([
            'message' => 'success',
            'result' => $listdonhang
        ]);
    } else {
        echo json_encode([
            'message' => 'false'
        ]);
    }

?>