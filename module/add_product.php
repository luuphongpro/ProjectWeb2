<?php
    header("Content-Type: application/json");
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
        $target_file = $target_dir . basename($_FILES["img_detail"]["name"]);   
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $file_name = uuidv4().".".$imageFileType;
        move_uploaded_file($_FILES["img_detail"]["tmp_name"],$target_dir.$file_name);
        


        $tensp = $_POST["tensp_detail"];
        $soluong = $_POST["soluong_detail"];
        $img = $file_name;
        $cost = $_POST["cost_detail"];
        $theloai = $_POST["theloai_detail"];
        $ttsp = $_POST["ttsp_detail"];
    
        $count = $sanpham->countProductsByCategory($theloai);
    
        switch ($theloai) {
            case "001":
                $prefix = "B";
                break;
            case "002":
                $prefix = "P";
                break;
            case "003":
                $prefix = "C";
                break;
            case "004":
                $prefix = "D";
                break;
            default:
                $prefix = "X"; // Default prefix if category is not recognized
        }
    
        $formattedCount = str_pad($count + 1, 3, "0", STR_PAD_LEFT);
    
        $masp = $prefix . $formattedCount;
    
        $data = array(
            "masp" => $masp,
            "tensp" => $tensp,
            "soluong" => $soluong,
            "img" => $img,
            "cost" => $cost,
            "theloai" => $theloai,
            "ttsp" => $ttsp
        );
    
        $result = $sanpham->themsanpham($data);
    
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