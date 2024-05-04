<?php
    include './controller.php';
    $sanpham = new sanpham;

    $tensp = $_POST["tensp"] ?? "";
    $theloai = $_POST["theloai"] ?? "";
    $result = $sanpham->locsanpham($tensp, $theloai);

    $output = array(); // Khởi tạo một mảng để lưu trữ kết quả

    if ($result && $result->num_rows > 0) {
        // Duyệt qua mỗi hàng từ kết quả truy vấn
        while ($row = $result->fetch_assoc()) {
            // Thêm hàng vào mảng kết quả
            $output[] = $row;
        }
        // Trả về kết quả dưới dạng JSON
        echo json_encode([
            'message' => 'successSearch',
            'result' => $output
        ]);
        return;
    } else {
        // Trả về thông báo khi không tìm thấy kết quả
        echo json_encode([
            'message' => 'falseSearch'
        ]);
    }

?>
