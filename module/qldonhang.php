<script src="https://kit.fontawesome.com/2d8d1ff741.js" crossorigin="anonymous"></script>
<?php

    $servername = "localhost";
    $username = "root"; // Thay username bằng tên người dùng của bạn
    $password = ""; // Thay password bằng mật khẩu của bạn
    $dbname = "web2";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM hoadon";
    $result = mysqli_query($conn, $sql);

?>


<div id ="timkiem" class="timkiem">
            <form class="filter">
                <div id = "dateStart">
                    <label><b>Ngày bắt đầu: </b></label>
                    <input type= "datetime-local" name="dateStart">
                </div>
                <div id = "dateEnd">
                    <label><b>Ngày kết thúc: </b></label>
                    <input type= "datetime-local" name="dateEnd">
                </div>
                <div id = "xulydonhang">
                    <label><b>Xử lý: </b></label>
                    <select id="luachon" name="filter">
                        <option value="">Lựa chọn</option>
                        <option value="Chưa">Chưa xử lý</option>
                        <option value="Đã">Đã xử lý</option>
                    </select>
                </div>
                <div class="submit">
                    <button type ="submit" id="btn">Tìm kiếm</button>
                </div>
            </form>
        </div>


    <table class="list" style="text-align: center ; display: grid">
        <thead>
            <tr>
                <th>Mã đơn hàng</th>
                <th>Tên Khách Hàng</th>
                <th>Số điện thoại</th>
                <th>Tổng tiền</th>
                <th>Ngày đặt</th>
                <th>Trạng thái</th>
                <th>Tùy Chỉnh</th>
            </tr>
        </thead>
        <tbody id="showdata">
        <?php
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo '
                            <tr font-weight: bold">
                                <th scope="row">'.$row['MaHoadon'].'</th>
                                <td>'.$row['TenND'].'</td>
                                <td>'.$row['MaUser'].'</td>
                                <td>'.$row['TongTien'].'</td>
                                <td>'.$row['CreTime'].'</td>
                                <td>'.$row['TrangThai'].'</td>
                                <td>
                                    <div>
                                        <button class="detailed"> <i class="fa-solid fa-wrench"></i> Tùy chỉnh </button>
                                    </div>
                                    <div>
                                        <button class="delete"> <i class="fa-solid fa-trash"></i> Xóa </button>
                                    </div>
                                </td>
                            </tr> ';
                    }
                }
            ?>
        </tbody>
    </table>


<style>
    
.timkiem {
    background-color: #00ff99;
    width: 1200px;
    margin: 10px auto 0;
    border-radius: 10px;
}

.filter{
    padding: 20px;
    display: grid;
    grid-template-columns: 30% 30% 25% 15%;
    grid-column: span 1;
    column-gap: 1%;
    row-gap: 10px;
}

#luachon{
    border-radius: 10px;
    width: 150px;
}

#btn{
    border-radius: 20px;
    width: 100px;
    background-color:#ff0045;
    color: white;
}

.list {
    margin: 10px;
    border: 1px solid #dee2e6;
}

.list th, .list td {
    border: 1px solid #dee2e6;
    padding-top: 10px;
    padding-bottom: 10px;
}

.list thead th, .list thead td {
    border-bottom-width: 2px;
}

.detailed{
    border-radius: 5px;
    width: auto;
    background-color:#00ff99;
    color: black;
}

.delete {
    border-radius: 5px;
    width: auto;
    background-color: red;
    color: white;
}

</style>


<script src="./JS/qldonhang.js"></script>