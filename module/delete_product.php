<?php
    include './controller.php';
    $sanpham = new sanpham;

    $masp = $_POST['deleteMaSP'];

    $result = $sanpham->xoasanpham($masp);
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