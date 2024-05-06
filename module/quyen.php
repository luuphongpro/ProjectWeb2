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
                    <td>Quản lí sản phẩm</td>
                    <td><label><input type="checkbox" id="qlspCheckbox" onchange="handleCheckboxChange('qlspCheckbox', 'qlspButton')" checked>QLSP</label></td>
                </tr>
                <tr>
                    <td>Thêm sản phẩm</td>
                    <td><label><input type="checkbox" id="themCheckbox" onchange="handleCheckboxChange('themCheckbox', 'deleteButton')" checked>ADD</label></td>
                </tr>
                <tr>
                    <td>Sửa sản phẩm</td>
                    <td><label><input type="checkbox" id="suaCheckbox" onchange="handleCheckboxChange('suaCheckbox', 'suaButton')" checked>Sửa</label></td>
                </tr>
                <tr>
                    <td>Xóa sản phẩm</td>
                    <td><label><input type="checkbox" id="xoaspCheckbox" onchange="handleCheckboxChange('xoaspCheckbox', 'xoaspButton')" checked>Xóa</label></td>
                </tr>
                <tr>
                    <td>Quản lí bán hàng</td>
                    <td><label><input type="checkbox" id="qlbhCheckbox" onchange="handleCheckboxChange('qlbhCheckbox', 'qlbhButton')" checked>QLBH</label></td>
                </tr>
                <tr>
                    <td>Thống kê doanh thu</td>
                    <td><label><input type="checkbox" id="tkdtCheckbox" onchange="handleCheckboxChange('tkdtCheckbox', 'tkdtButton')" checked>TKDT</label></td>
                </tr>
                <tr>
                    <td>Quản lí quyền</td>
                    <td><label><input type="checkbox" id="qlqCheckbox" onchange="handleCheckboxChange('qlqCheckbox', 'qlqButton')" checked>QLQ</label></td>
                </tr>
                <tr>
                    <td>Quản lí tài khoản</td>
                    <td><label><input type="checkbox" id="qltkCheckbox" onchange="handleCheckboxChange('qltkCheckbox', 'qltkButton')" checked>QLTK</label></td>
                </tr>
                <tr>
                    <td>Thêm tài khoản</td>
                    <td><label><input type="checkbox" id="themtkCheckbox" onchange="handleCheckboxChange('themtkCheckbox', 'deleteButton')" checked>ADD</label></td>
                </tr>
                <tr>
                    <td>Sửa tài khoản</td>
                    <td><label><input type="checkbox" id="suatkCheckbox" onchange="handleCheckboxChange('suatkCheckbox', 'suaButton')" checked>Sửa</label></td>
                </tr>
                <tr>
                    <td>Xóa tài khoản</td>
                    <td><label><input type="checkbox" id="xoatkCheckbox" onchange="handleCheckboxChange('xoatkCheckbox', 'xoaspButton')" checked>Xóa</label></td>
                </tr>
            </table>

            <div>
                <button id="qltkButton">QLTTK</button>
                <button id="qlspButton">QLSP</button>
                <button id="tkdtButton">TKDT</button>
                <button id="qlbhButton">QLBH</button>
            </div>
        </div>
    </div>
</div>
<script src="./JS/qlsanpham.js"></script>
<script src="./JS/phanquyen.js"></script>

