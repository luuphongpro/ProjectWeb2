<?php
    // Thiết lập kết nối đến cơ sở dữ liệu
    $servername = "localhost";
    $username = "root"; // Thay username bằng tên người dùng của bạn
    $password = ""; // Thay password bằng mật khẩu của bạn
    $dbname = "web2";

    // Tạo kết nối
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
    }

    // Câu truy vấn SQL
    $sql = "SELECT TenND, MaQuyen, Password, SĐT FROM account";

    // Thực thi câu truy vấn
    $result = $conn->query($sql);

    // Kiểm tra và xử lý kết quả
    if ($result->num_rows > 0) {
        echo '
            <section id="quanlisp">
                <div>
                    <table class="table table-bordered" style="text-align: center">
                        <thead>
                            <tr>
                                <th scope="col">Tên tài khoản</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Mã quyền</th>
                                <th scope="col">Mật khẩu</th>
                            </tr>
                        </thead>
                        <tbody>
        ';

        while ($row = $result->fetch_assoc()) {
            $tenND = $row["TenND"];
            $maQuyen = $row["MaQuyen"];
            $sdt = $row["SĐT"];
            $Password = $row["Password"];

            echo '
                <tr style="color: #222222; font-weight: bold;">
                    <th scope="row">'.$tenND.'</th>
                    <td>'.$sdt.'</td>
                    <td>'.$maQuyen.'</td>
                    <td>'.$Password.'</td>
                </tr>';
        }
                    
        echo '
                        </tbody>
                    </table>
                </div>
            </section>
        ';
    } else {
        echo "Không có dữ liệu trong bảng account.";
    }

    // Đóng kết nối
    $conn->close();
?>

<style>
    .table {
        margin-top: 100px;
        margin-left: 100px;
        border-collapse: collapse;
    }
    .table td,
    .table th {
        border: 2px solid #222222; /* Đặt màu viền cho ô trong bảng */
    }

    .table tr:nth-child(even) {
        background-color: #f9f9f9; /* Đặt màu nền cho các dòng chẵn */
    }
    .table thead th {
        background-color: gray;
        color: aliceblue;
        width: 200px; 
    }
    .table tbody td {
        width: 200px; 
    }
</style>
<script src="./JS/qlsanpham.js"></script>