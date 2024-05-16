<?php 
    include './module/qldonhangCTL.php';
?>
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
                RenderTableChiTietHD();
                ?>
            </table>

            <div>
                <div id="xulydonhang">
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