<?php
    header("Content-Type: application/json");
    include './controller.php';
    $quyen = new quyen;

        $maquyen = $_POST["maquyen_detail"];
        $tenquyen = $_POST["tenquyen_detail"];
        $active = $_POST["active_detail"];
        
        $data = array(
            "maquyen" => $maquyen,
            "tenquyen" => $tenquyen,
            "active" => $active,
        );
    
        $result = $quyen->themquyen($data);
    
        if ($result) {
            echo json_encode([
                'message' => 'successAdd'
            ]);
            return;
        } else {
            echo json_encode([
                'message' => 'falseAdd'
            ]);
            return;
        }
   

    


?>