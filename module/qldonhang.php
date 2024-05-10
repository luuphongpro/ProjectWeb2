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

    // WHERE chitiethoadon.MaHoadon = $MaHoadon
    $sql2 = "SELECT * FROM chitiethoadon LEFT JOIN product ON chitiethoadon.MaSP=product.MaSP ";
    $result2 = mysqli_query($conn, $sql2);

    if(isset($_POST['setting']))
    {
        $status = $_POST['setting'];
        mysqli_query($conn, "UPDATE hoadon SET setting = '$status' WHERE MaHoadon = $MaHoadon ");
    }
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
                        <option value="0">Chưa xử lý</option>
                        <option value="1">Đã xử lý</option>
                        <option value="2">Đang giao hàng</option>
                        <option value="3">Đã giao hàng</option>
                        <option value="4">Hủy đơn</option>
                    </select>
                </div>
                <div class="submit">
                    <button type ="submit" id="btn" name="timkiem">Tìm kiếm</button>
                </div>
            </form>
        </div>


    <table class="list" style="text-align: center ; display: grid">
        <thead>
            <tr class="list-name">
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
                    while($row = $result->fetch_assoc()){ ?>
                        
                            <tr font-weight="bold">
                                <th scope="row"><?php echo $row['MaHoadon'] ?></th>
                                <td><?php echo $row['TenND']?></td>
                                <td><?php echo $row['MaUser']?></td>
                                <td><?php echo $row['TongTien']?></td>
                                <td><?php echo $row['CreTime']?></td>
                                <td>
                                <?php
                                    if ($row['TrangThai'] == 0)
                                    {?>
                                        Chưa xử lý
                                    <?php }
                                    elseif ($row['TrangThai'] == 1)
                                    {?>
                                        Đã xử lý
                                    <?php }
                                    elseif ($row['TrangThai'] == 2)
                                    {?>
                                        Đang giao hàng
                                    <?php }
                                    elseif ($row['TrangThai'] == 3)
                                    {?>
                                        Đã giao hàng
                                    <?php }
                                    elseif ($row['TrangThai'] == 4)
                                    {?>
                                        Hủy đơn
                                    <?php }
                                ?>
                                </td>
                                <td>
                                    <div>
                                        <button id="detailed" class="detailed"> <i class="fa-solid fa-wrench"></i> Tùy chỉnh </button>
                                    </div>
                                    <div>
                                        <button class="delete"> <i class="fa-solid fa-trash"></i> Xóa </button>
                                    </div>
                                </td>
                            </tr>
                    <?php
                    }
                }
            ?>
        </tbody>
    </table>

    <div class="detail">
        <div id="ctdh" class="ctdh">
            <div>
                <h1> Chi tiết đơn hàng</h1>
                <table class="list" style="text-align: center ; display: grid">
                    <thead>
                        <tr class="list-name">
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Đơn giá</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>

                <?php
                    if($result2->num_rows > 0){
                        while($row = $result2->fetch_assoc()){
                            echo '
                                <tr font-weight: bold">
                                    <th scope="row">'.$row['MaSP'].'</th>
                                    <td>'.$row['TenSP'].'</td>
                                    <td>'.$row['SoLuong'].'</td>
                                    <td>'.$row['DonGia'].'</td>
                                    <td>'.$row['DonGia'] * $row['SoLuong'].'</td>
                                </tr> ';
                        }
                    }
                ?>
                </table>
            
                <div>
                    <div id = "xulydonhang">
                        <select id="chon" name="setting">
                        <option value="0">Chưa xử lý</option>
                        <option value="1">Đã xử lý</option>
                        <option value="2">Đang giao hàng</option>
                        <option value="3">Đã giao hàng</option>
                        <option value="4">Hủy đơn</option>
                        </select>
                        <button id="success"> <i class="fa-solid fa-check"></i> Xác nhận </button>
                        <button id="exit"> <i class="fa-solid fa-xmark"></i> Hủy </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

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

#luachon, #chon{
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

.list-name{
    background-color: #ff0045;
    color: white;
}

.list th, .list td {
    border: 1px solid #dee2e6;
    padding-top: 10px;
    padding-bottom: 10px;
}

.list thead th, .list thead td {
    border-bottom-width: 2px;
}

.detailed , #success{
    border-radius: 5px;
    width: auto;
    background-color:#00ff99;
    color: black;
}

.delete, #exit {
    border-radius: 5px;
    width: auto;
    background-color: red;
    color: white;
}

.detail{
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(90, 86, 86, 0.8);
    display: none;
    justify-content: center;
    align-items: center;
    z-index: 990;
}

.ctdh{
    max-width: 100%;
    position: relative;
    top: 100px;
    left: 120px;
    height: auto;
    width: 1100px;
    margin: 50px auto;
    padding: 50px 20px 20px;

    -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
    border-radius: 10px;
    background: #ffffff;
    box-shadow: 0 0 10px #000000;
    -moz-box-shadow: 0 0 10px #000000;
    -webkit-box-shadow: 0 0 10px #000000;
    display: block;
    pointer-events: auto;
}

h1 {
  text-align: center;
}


</style>

<script>

document.getElementById("detailed").addEventListener("click", function(){
 var e =document.getElementsByClassName("detail");

        e[0].style.display = 'block';
   
});

document.getElementById("exit").addEventListener("click", function(){
   var e =document.getElementsByClassName("detail");
 e[0].style.display= 'none';
});

document.getElementById("success").addEventListener("click", function(){
   var e =document.getElementsByClassName("detail");
 e[0].style.display= 'none';
});

</script>
<script src="./JS/qldonhang.js"></script>