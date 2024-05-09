<label for="">Từ ngày</label>
<input type="date" id="ToTimeST">
<label for="">Đến ngày</label>
<input type="date" id="FormTimeST">
<label for="">Thuộc loại</label>
<select name="" id="categoryST" class="js_thongke-theloai">
</select>
<button class="btn btn-info p-0 mx-2" onclick="FiltertSatistics()">Lọc <i class="ti-filter"></i> </button>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Hình Ảnh</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Thành tiền</th>
        </tr>
    </thead>
    <tbody class="js_table-thongke">
    </tbody>
</table>