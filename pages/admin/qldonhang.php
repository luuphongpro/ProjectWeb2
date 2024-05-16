<?php 
    include '../../module/qldonhangCTL.php';
?>
<div id="timkiem" class="timkiem">
    <form class="filter">
        <div id="dateStart">
            <label><b>Ngày bắt đầu: </b></label>
            <input type="datetime-local" name="dateStart" value="
            <?php if (isset($_GET['dateStart'])) {
                echo $_GET['dateStart'];
            } ?>">
        </div>
        <div id="dateEnd">
            <label><b>Ngày kết thúc: </b></label>
            <input type="datetime-local" name="dateEnd" value="
            <?php if (isset($_GET['dateEnd'])) {
                echo $_GET['dateEnd'];
            } ?>">
        </div>
        <div id="xulydonhang">
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
            <button type="submit" id="btn" name="timkiem">Tìm kiếm</button>
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
            RenderTableDH();
        ?>
    </tbody>
</table>


<link rel="stylesheet" href="./CSS/qldonhangCSS.css">