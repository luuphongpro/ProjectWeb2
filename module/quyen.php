<link rel="stylesheet" href="./CSS/phanquyen.css">
<link rel="stylesheet" href="./CSS/qlsanpham.css">
<link rel="stylesheet" href="./CSS/qlmember.css">

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
                                <th scope="col">Chỉnh sửa quyền</th>
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
                    <td><button class="btn-choose-quyen" onClick="showQuyenOverlay()">Bảng chọn quyền</button></td>    
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
    <div class="overlay">
        <div class="info">
            <div class="topform">
                <h2>Bảng phân quyền</h2>
                <button type='button' class='closequyen' onClick='closeProductInfo()'>x</button>
            </div>
            <div>
                <table class="table table-bordered" style="border: none" id="table">
                    <tr>
                        <th>Tên Quyền</th>
                        <th>Quyền Sử Dụng</th>
                    </tr>
                    <tr>
                        <td>Submit</td>
                        <td><label><input type="checkbox" id="submitCheckbox" onchange="handleCheckboxChange('submitCheckbox', 'submitButton')">Submit</label></td>
                    </tr>
                    <tr>
                        <td>Delete</td>
                        <td><label><input type="checkbox" id="deleteCheckbox" onchange="handleCheckboxChange('deleteCheckbox', 'deleteButton')">Delete</label></td>
                    </tr>
                    <tr>
                        <td>OK</td>
                        <td><label><input type="checkbox" id="okCheckbox" onchange="handleCheckboxChange('okCheckbox', 'okButton')">OK</label></td>
                    </tr>
                    <tr>
                        <td>Change</td>
                        <td><label><input type="checkbox" id="changeCheckbox" onchange="handleCheckboxChange('changeCheckbox', 'changeButton')">Change</label></td>
                    </tr>
                </table>

                <div>
                    <input type="submit" id="submitButton" disabled value="Submit">
                    <button id="deleteButton" disabled>Delete</button>
                    <button id="okButton" disabled>OK</button>
                    <button id="changeButton" disabled>Change</button>
                </div>
            </div>
        </div>
    </div>
<script src="./JS/qlsanpham.js"></script>
<script src="./JS/phanquyen.js"></script>

