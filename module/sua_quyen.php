<?php
    include './controller.php';

    $quyen = new quyen;
   
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




    $maquyen = $_POST["fix_maquyen"];
    $tenquyen = $_POST["fix_tenquyen"];
    $active = $_POST["fix_active"];
   
    $data = array(
        "maquyen" => $maquyen,
        "tenquyen" => $tenquyen,
    );


    $result = $quyen->suaquyen($data);
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