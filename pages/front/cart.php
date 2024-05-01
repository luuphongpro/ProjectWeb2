<div class="container-fluid pt-5" id="cart">
    <div class="row px-xl-5">
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                <thead class="text-dark cart-css">
                    <tr class="cart-css">
                        <th >Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng</th>
                        <th>Hủy bỏ</th>
                    </tr>
                </thead>
                <tbody class="align-middle js_table_cart">
                    
                </tbody>
            </table>
        </div>
        <div class="col-lg-4">
            <form class="mb-5" action="">
                <div class="input-group">
                    <input type="text" class="form-control p-4" placeholder="Mã giảm giá">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Áp dụng mã</button>
                    </div>
                </div>
            </form>
            <div class="card border-secondary mb-5">
                <div class="card-header bg-secondary border-0">
                    <h4 class="font-weight-semi-bold m-0">Mua hàng </h4>
                </div>
                <div class="card-body">
                </div>
                <div class="card-footer border-secondary bg-transparent">
                    <div class="d-flex justify-content-between mt-2">
                        <h5 class="font-weight-bold">Tổng tiền</h5>
                        <h5 class="font-weight-bold js_tongtien"></h5>
                    </div>
                    <button class="btn btn-block btn-primary my-3 py-3 js_dathang">Đặt hàng</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="JS/cart.js" defer></script>