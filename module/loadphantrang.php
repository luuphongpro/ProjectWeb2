<?php
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "web2";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $perPage = 6;
    $sqltotal = "SELECT * FROM product";
    $tongsotrang = $conn->query($sqltotal);
    $leng = $tongsotrang->num_rows;
    $pageTotal = ceil($leng / $perPage);

    if(isset($_GET['trang'])){
        $page = $_GET['trang'];
    } else {
        $page = 1;
    }
    $begin = ($page - 1) * $perPage;

    $sql = "SELECT * FROM product ORDER BY MaSP  LIMIT $begin , $perPage ";
    $result = mysqli_query($conn, $sql);
    $list = array();
    if($result){
        while($row = $result -> fetch_assoc()){
            $list[] = $row;
        }
        echo json_encode([
            "result" => $list
        ]);
    }
?>