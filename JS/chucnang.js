function Chucnang() {
    this.htmlMenu = {
        CN02: `<li class="nav-item js_qlsp" cn="CN02"><a class="nav-link"><i class="nav-icon fas fa-th"></i><p>Quản lý sản phẩm
                <span class="badge badge-info right"></span></p></a></li>`,
        CN03: `<li class="nav-item js_qldh" cn="CN03"><a class="nav-link"><i class="nav-icon fas fa-book"></i><p>Quản lý bán hàng
                <span class="badge badge-info right"></span></p></a></li>`,
        CN05: `<li class="nav-item js_thongkedt" cn="CN05"><a class="nav-link"><i class="nav-icon fas fa-chart-pie"></i>
                <p>Thống kê doanh thu<span class="badge badge-info right"></span></p></a></li>`,
        CN01: `<li class="nav-item js_qlquyen" cn="CN01"><a class="nav-link"><i class="nav-icon fas fa-chart-pie"></i><p>Quản lý quyền
                <span class="badge badge-info right"></span></p></a></li>`,
        CN04: `<li class="nav-item js_qltk" cn="CN04"><a class="nav-link"><i class="nav-icon fas fa-table"></i><p>Quản lý tài khoản
              <span class="badge badge-info right"></span></p></a></li>`
    };
    this.htmlThem = {
        CN01: `<div class="addQuyen">
                    <label for="addIcon"><b>Thêm quyền</b></label>
                    <a id="addIcon" class="add_quyen"><i class="fa-solid fa-plus"></i></a>
                </div>`,
        CN02: `<div id = "addProduct">
                    <label for ="addIcon"><b>Thêm sản phẩm</b></label>
                    <a id = "addIcon" onclick=showAddSanPham() class = "add_product_detail" ><i class="fa-solid fa-plus"></i> </a>
                </div>`,
        CN03: ``,
        CN04: `<button class="btn btn-primary js_themtk" onclick="ThemTaiKhoan()">Thêm <i class="ti-plus"></i> </button>`,
        CN05: ``,
    };
    


    this.htmlSua = {
        CN01: `<button class="btn" onclick=SuaQuyen(event)><a class= "fix_quyen_detail"><i class="fa-solid fa-wrench"></i> </a></button>`,
        CN02: `   
            <button onclick = "getInfoLoadToForm(event)"  style="background: none; border: none; padding: 0; cursor: pointer;">
                <a  class= "fix_product_detail"><i class="fa-solid fa-wrench"></i> </a>
            </button>
            `,
        CN03: `<button class="detailed btn btn-infor disabled btn-sm" onclick="XuLyDH(event)"> <i class="fa-solid fa-wrench"></i> Xử lý </button>`,
        CN04: `<button class="btn-info mx-1" onclick="SuaTaiKhoan(event)">Sửa</button>`,
        CN05: ``,
    };

    this.htmlXoa = {
        CN01: `<div class="deleteFormQuyen" onclick=XoaQuyen(event)><button class="btn"><a><i class="fa-solid fa-trash"></i></a>
        </button></div>`,
        CN02: ` 
            <button onclick= deletesp(event) style="background: none; border: none; padding: 0; cursor: pointer;">
                <a><i class="fa-solid fa-trash"></i></a>
            </button>
            `,
        CN03: `<button class="delete btn disabled btn-sm" onclick=HuyDH(event)> <i class="fa-solid fa-trash" ></i> Hủy đơn </button>`,
        CN04: `<button class="btn-danger" onclick="XoaTaiKhoan(event)">Xóa </button>`,
        CN05: ``,
    };
    
    this.RenderChucNang=function(chucnang){
        console.log(chucnang)
        if(chucnang['Them']==1)
            $(`[Them='${chucnang['MaChucnang']}']`).html(this.htmlThem[chucnang['MaChucnang']])
        if(chucnang['Sua']==1)
            $(`[Sua='${chucnang['MaChucnang']}']`).html(this.htmlSua[chucnang['MaChucnang']])
        if(chucnang['Xoa']==1)
            $(`[Xoa='${chucnang['MaChucnang']}']`).html(this.htmlXoa[chucnang['MaChucnang']])
    }
}
Chucnang.prototype.Menu = function(ChucNangs) {
    var html = `<li class="nav-item js_home"><a class="nav-link"><i class="nav-icon fas fa-tachometer-alt"></i><p>Trang chủ
        </p></a></li>`;
    ChucNangs.forEach((ChucNang) => {
        if (ChucNang.Xem == 1) {
            html += this.htmlMenu[ChucNang['MaChucnang']] ? this.htmlMenu[ChucNang['MaChucnang']] : '';
        }
        $(`[Them='${ChucNang['MaChucnang']}']`).html(this.htmlThem[ChucNang['MaChucnang']]);
    });
    $(".container_menu").html(html);
}

Chucnang.prototype.QLTaiKhoan = function(ChucNangs) {
    ChucNangs.forEach((ChucNang) => {
        if(ChucNang.MaChucnang=='CN04'){
            this.RenderChucNang(ChucNang)
        }
    })
}
Chucnang.prototype.QLQuyen = function(ChucNangs) {
    ChucNangs.forEach((ChucNang) => {
        if(ChucNang.MaChucnang=='CN01'){
            this.RenderChucNang(ChucNang)
        }
    })
}
Chucnang.prototype.QLSanPham = function(ChucNangs) {
    ChucNangs.forEach((ChucNang) => {
        if(ChucNang.MaChucnang=='CN02'){
            this.RenderChucNang(ChucNang)
        }
    })
}
Chucnang.prototype.QLBanHang=function(ChucNangs){
    ChucNangs.forEach((ChucNang) => {
        if(ChucNang.MaChucnang=='CN03'){
            this.RenderChucNang(ChucNang)
        }
    })
}
