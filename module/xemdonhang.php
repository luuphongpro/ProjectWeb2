<?php
header("Content-Type: application/json");

    include "controller.php";
    
    $xemlaidonhang = new xemlaidonhang();
    // $input = file_get_contents('php://input');
    // error_log($input);

    // $data = json_decode(file_get_contents('php://input'), true);
    // $sdt = $data['SĐT'];


    // $listdonhang = array();

    // $result = $xemlaidonhang -> listdonhang($sdt);
    // if ($result) {
    //     while($row = $result ->fetch_assoc()){
    //         $listdonhang[] = $row;
    //     }
    //     echo json_encode([
    //         'message' => 'success',
    //         'result' => $listdonhang
    //     ]);
    //     return;
    // }
    // echo json_encode([
    //     'message' => 'false'
    // ]);
    // return;



    if(isset($_REQUEST['listdonhang'])){
        $sdt=$_REQUEST['sdt'];

        $listdonhang = array();

        $result = $xemlaidonhang -> listdonhang($sdt);
        if ($result) {
            while($row = $result ->fetch_assoc()){
                $listdonhang[] = $row;
            }
            echo json_encode([
                'message' => 'success',
                'result' => $listdonhang
            ]);
            return;
        }
        echo json_encode([
            'message' => 'false'
        ]);
        return;
    }
?>