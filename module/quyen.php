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
    $sql = "SELECT * FROM chucnang";

    // Thực thi câu truy vấn
    $result = $conn->query($sql);
    
?>
<section id="quanlisp">

<div id="noti">
    <h4 id="noti-title"></h4>
    <div id ="noti-desc"></div>
</div>

<div style = "display : flex ; justify-content: space-between; position: relative;">
        <div id = "addQuyen" class="addQuyen">
            <div>
                <label for ="addIcon"><b>Thêm quyền</b></label>
            </div>
            <div>
                <a id = "addIcon" class = "add_quyen" ><i class="fa-solid fa-plus"></i> </a>
            </div>
        </div>
</div>
    
<div class="quyen_overlay">
        <div class="quyen_info">
            <button type="button" class="close" onClick="closeAddQuyenInfo()">x</button>
            <h2 style="font-family: \'Roboto Mono\', monospace; margin-left : 106px; margin-bottom: 45px;">Thêm Quyền Mới</h2>
            <div>
                <form id = "form_add_quyen" method = "post"  onsubmit = "return validateForm()">
                    <div>
                        <label for ="maquyen_detail"><b>Mã Quyền: </b></label><br>
                        <input id = "maquyen_detail" name = "maquyen_detail" type ="text">
                        <p id = "err_maquyen" style ="display : none ; color : red" >Mã quyền không được bỏ trống</p>
                    </div>
                    <div>
                        <label for ="tenquyen_detail"><b>Tên Quyền: </b></label><br>
                        <input id ="tenquyen_detail" name = "tenquyen_detail" type ="text">
                        <p id ="err_tenquyen" style ="display : none ; color : red ; white-space: nowrap;" >Tên quyền không được bỏ trống</p>
                    </div>
                    <div>
                        <label for ="active_detail"><b>Trạng thái Active: </b></label><br>
                        <input id = "active_detail" name = "active_detail" type ="text">
                        <p id ="err_active" style ="display : none ; color : red; white-space: nowrap;">Không được bỏ trống và nội dung phải là số  !!!</p>
                    </div>
                    <button type ="submit" class="btn-search-quyen">Thêm Quyền</button>
                </form>
            </div>
    </div>
</div>
        <table class="table table-bordered" style="text-align: center ; display: grid">
        <thead>
            <tr>
                <th scope="col">Mã quyền</th>
                <th scope="col">Tên quyền</th>
                <th scope="col">Active</th>
                <th scope="col">Tùy Chỉnh</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo '
                            <tr  style="color: #222222; font-weight: bold;">
                                <th scope="row">'.$row['MaChucnang'].'</th>
                                <td>'.$row['TenChucnang'].'</td>
                                <td>'.$row['Active'].'</td>
                                <td class = "custom-icons">
                                    <div>
                                        <a class= "fix_quyen_detail"><i class="fa-solid fa-wrench"></i> </a>
                                    </div>
                                    <div>
                                        <form class="deleteFormQuyen"  method="post">
                                            <input type="hidden" name="deleteMaQuyen" id="deleteMaQuyen" value="'.$row['MaChucnang'].'">
                                            <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">
                                            <a><i class="fa-solid fa-trash"></i></a>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr> ';
                    }
        }
        ?>
          </tbody>
    </table>
</section>
<link rel="stylesheet" href="./CSS/product_manager.css"/>
   
<script src="./JS/phanquyen.js"></script>