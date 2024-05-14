<?php
include_once 'xlquyen.php';
?>
<section id="quanlisp">
    <div id="noti">
        <h4 id="noti-title"></h4>
        <div id="noti-desc"></div>
    </div>
    <div style="display : flex ; justify-content: space-between; position: relative;">
        <div Them="CN01">
            
        </div>
    </div>
    <div class="modal container_modal-quyen">

    </div>

    <table class="table table-bordered" style="text-align: center ; display: grid">
        <thead>
            <tr>
                <th scope="col">Mã quyền</th>
                <th scope="col">Tên Quyền</th>
                <th scope="col">Người tạo</th>
                <th scope="col">Thời gian tạo</th>
                <th scope="col">Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            RenderTableQuyen();
            ?>
        </tbody>
    </table>
</section>