<?php
    include './controller.php';
    $quyen = new quyen;

    $masp = $_POST['deleteMaQuyen'];

    $result = $quyen->xoaquyen($maquyen);
    if ($result) {
        echo json_encode([
            'message' => 'successDel'
        ]);
        return;
    }
    echo json_encode([
        'message' => 'falseDel'
    ]);
    return;
?>