<?php
    include './controller.php';
    $sanpham = new sanpham;

    $tensp = $_POST["tensp"] ?? "";
    $theloai = $_POST["theloai"] ?? "";
    $result = $sanpham->locsanpham($tensp, $theloai);

    $output = array();

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
        echo json_encode([
            'message' => 'successSearch',
            'result' => $output
        ]);
        return;
    } else {
        echo json_encode([
            'message' => 'falseSearch'
        ]);
    }

?>
