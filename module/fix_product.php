<?php
    include './controller.php';

    $sanpham = new sanpham;
   
    function uuidv4()
    {
        $data = random_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

    $target_dir = "../img/";
    $target_file = $target_dir . basename($_FILES["fix_img"]["name"]);   
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $file_name = uuidv4().".".$imageFileType;
    move_uploaded_file($_FILES["fix_img"]["tmp_name"],$target_dir.$file_name);




    $masp = $_POST["fix_masp"];
    $tensp = $_POST["fix_tensp"];
    $soluong = $_POST["fix_soluong"];
    $img = $file_name;
    $cost = $_POST["fix_cost"];
    $theloai = $_POST["fix_theloai"];
    $ttsp = $_POST["fix_ttsp"];

    $data = array(
        "masp" => $masp,
        "tensp" => $tensp,
        "soluong" => $soluong,
        "img" => $img,
        "cost" => $cost,
        "theloai" => $theloai,
        "ttsp" => $ttsp
    );


    $result = $sanpham->suasanpham($data);
    if ($result) {
        echo json_encode([
            'message' => 'successFix'
        ]);
        return;
    }
    echo json_encode([
        'message' => 'falseFix'
    ]);
    return;
?>