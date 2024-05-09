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

    $sql = "SELECT * FROM `hoadon` LEFT JOIN account ON hoadon.MaUser=account.SĐT";
    $result = mysqli_query($conn, $sql);

?>


<div id ="timkiem" class="timkiem">
            <form class="filter">
                <div id = "dateStart">
                    <label><b>Ngày bắt đầu: </b></label>
                    <input type= "datetime-local" name="dateStart" value="<?php if(isset($_GET['dateStart'])){echo $_GET['dateStart'];} ?>">
                </div>
                <div id = "dateEnd">
                    <label><b>Ngày kết thúc: </b></label>
                    <input type= "datetime-local" name="dateEnd" value="<?php if(isset($_GET['dateEnd'])){echo $_GET['dateEnd'];} ?>">
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
                    <button type ="submit" id="btn" name="timkiem">Tìm kiếm</button>
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

<?php
if(isset($_GET['timkiem'])){
    $filter = $_GET['filter'];
    
    if(empty($_GET['dateStart'])){
        $dateStart = "2000-01-01T00:00:00";
    }else{
        $dateStart = $_GET['dateStart'];
    }

    if(empty($_GET['dateEnd'])){
        $dateEnd = "2099-01-01T00:00:00";
    }else{
        $dateEnd = $_GET['dateEnd'];
    }

    $filterdata = "SELECT * FROM `hoadon` WHERE `TrangThai` LIKE '%$filter%' && CreTime BETWEEN $dateStart AND $dateEnd";
    
    $filterdata_run = mysqli_query($conn, $filterdata);
    if (mysqli_num_rows($filterdata_run) > 0){
        foreach($filterdata_run as $row) {
            $productIndex=0;
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
    }else {
        echo "Không tìm thấy kết quả";
    }
}

?>

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

<script>
// Hàm để tải nội dung của trang mới bằng AJAX
function loadPage(url) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 400) {
            var response = xhr.responseText;
            var parser = new DOMParser();
            var newDoc = parser.parseFromString(response, 'text/html');
            var newContent = newDoc.querySelector('.food_section');
            $('.food_section').html(newContent);
            bindDetailButtons(); // Gắn kết sự kiện click với nút chi tiết sản phẩm mới
        } else {
            console.error('Request failed with status', xhr.status);
        }
    };
    xhr.onerror = function() {
        console.error('Request failed');
    };
    xhr.send();
}

// Hàm để gắn kết sự kiện click với các nút chi tiết sản phẩm mới
function bindDetailButtons() {
    var detailButtons = document.querySelectorAll('.detail-button');
    detailButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            var productIndex = this.getAttribute('data-product-index');
            var overlay = document.querySelector('.overlay[data-product-index="' + productIndex + '"]');
            overlay.style.display = "flex"; // Hiển thị overlay
            var info = document.querySelector('.info[data-product-index="' + productIndex + '"]');
            info.style.display = "flex"; // Hiển thị overlay
        });
    });

}

bindDetailButtons(); 
</script>
<script src="./JS/qldonhang.js"></script>