<?php
include_once 'xlquyen.php';
?>
<div class="bg-light content-modal mt-3">
            <i class="ti-close float-end p-2 bg-danger icon_close-quyen"></i>
            <h2 style="font-family: \'Roboto Mono\', monospace; margin-left : 106px; margin-bottom: 45px;">Thêm Quyền Mới</h2>
            <div class="px-4">
                <form action="" id="form-themquyen">
                    <div class="d-flex justify-content-center">
                        <div class="modal_content-input-box form-group mx-3">
                            <label for="TenQuyen">Mã quyền:</label>
                            <input placeholder="Nhập mã quyền" id="MaQuyen" name="MaQuyen">
                            <span class="form-message"></span>
                        </div>
                        <div class="modal_content-input-box form-group">
                            <label for="TenQuyen">Tên Quyền:</label>
                            <input placeholder="Nhập tên quyền" id="TenQuyen" name="TenQuyen">
                            <span class="form-message"></span>
                        </div>
                    </div>

                    <p>Chi tiết quyền</p>
                    <table class="table" style="border:0px">
                        <thead>
                            <tr>
                                <th>Tên chức năng</th>
                                <th>Xem</th>
                                <th>Thêm</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            RenderTableChiTietQuyen()
                            ?>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn-search-quyen btn btn-primary">Xác nhận sửa</button>
                    </div>
                </form>
            </div>
        </div>