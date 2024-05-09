$(".nav-item.active").removeClass("active")
$(".js_dathang").on("click", function () {
    DonHang()
})
var tongHoaDon = 0
function RenderGioHang() {
    var Cart = JSON.parse(localStorage.getItem("CartWeb2")) || {};
    var tableGioHang = ''
    var bodyGioHang = ''
    tongHoaDon = 0;
    if (Cart['arr']) {
        Cart['arr'].forEach((value, index) => {
            var tong = value['gia'] * value['soluong']
            tongHoaDon += tong
            tableGioHang += `<tr>
                <td class="align-middle"><img src="#" alt="" style="width: 50px;"> ${value['TenSP']}</td>
                <td class="align-middle">${value['gia']}</td>
                <td class="align-middle">
                    <div class="input-group quantity mx-auto" style="width: 100px;">
                        <div class="input-group-btn">
                            <button class="btn btn-sm btn-primary btn-minus" onclick="GiamNe('${value['MaSP']}')">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" class="form-control form-control-sm bg-secondary text-center js_soluong${value['MaSP']}"
                            value="${value['soluong']}">
                        <div class="input-group-btn">
                            <button class="btn btn-sm btn-primary btn-plus" onclick="TangNe('${value['MaSP']}')">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </td>
                <td class="align-middle js_tongsp${value['MaSP']}">${tong}</td>
                <td class="align-middle"><button class="btn btn-sm btn-primary" onclick="DeleteCart(${index})"><i
                            class="fa fa-times"></i></button></td>
                            </tr>`
            bodyGioHang += `<div class="d-flex justify-content-between mb-3 pt-1">
                <h6 class="font-weight-medium">${value['TenSP']}</h6>
                <h6 class="font-weight-medium js_tongsp${value['MaSP']}">${tong}</h6>
            </div>`
        })
        $(".js_table_cart").html(tableGioHang)
        $(".card-body").html(bodyGioHang)
        $(".js_tongtien").text(tongHoaDon)
    }
}
RenderGioHang()
function TangNe(index) {
    var oldValue = Number($(".js_soluong" + index).val())
    $(".js_soluong" + index).val(oldValue + 1)
    var tongtien
    Cart['arr'].forEach((value) => {
        if (value['MaSP'] == index) {
            tongHoaDon += Number(value['gia'])
            value['soluong'] = oldValue + 1
            tongtien = value['soluong'] * value['gia']
        }
    })
    $(".js_tongsp" + index).text(tongtien)
    $(".js_tongtien").text(tongHoaDon)
    localStorage.setItem("CartWeb2", JSON.stringify(Cart))
    RenderGioHang()
}
function GiamNe(index) {
    var oldValue = Number($(".js_soluong" + index).val())
    if (oldValue > 1) {
        $(".js_soluong" + index).val(oldValue - 1)
        var tongtien
        Cart['arr'].forEach((value) => {
            if (value['MaSP'] == index) {
                tongHoaDon -= Number(value['GiaSP'])
                value['soluong'] = oldValue - 1
                tongtien = value['soluong'] * value['gia']
            }
        })
        $(".js_tongsp").text(tongtien)
        $(".js_tongtien").text(tongHoaDon)
        localStorage.setItem("CartWeb2", JSON.stringify(Cart))
    }
    RenderGioHang()
}
function DeleteCart(id) {
    const tableE = document.querySelector(".js_table_cart")
    console.log("truoc khi xoa", Cart['arr'])
    tableE.deleteRow(id)
    Cart['arr'].splice(id, 1)
    localStorage.setItem("CartWeb2", JSON.stringify(Cart))
    console.log("sau khi xoa", Cart['arr'])
    $('.nav-top').each(function () {
        var text = $(this).text().trim()
        if (text == "Giỏ hàng") {
            console.log(text)
            $(this).click()
        }
    })
    RenderGioHang()
}
function DonHang() {
    var account = JSON.parse(sessionStorage.getItem("UseLogin"))
    var donhang = JSON.parse(localStorage.getItem("CartWeb2"))
    if (account['flag'] && donhang['arr']) {
        donhang['tong'] = tongHoaDon
        donhang['SĐT']=account['SĐT']
        delete donhang['TenSP']
        var xhr = new XMLHttpRequest()
        xhr.open("POST", "./module/donhang.php?set")
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("dataJSON=" + JSON.stringify(donhang));
        console.log(JSON.stringify(donhang))
        xhr.onload = function () {
            var message = xhr.responseText
            if (message == "sucsess")
                alert("Đơn hàng đã đặt thành công")
            else
                alert("Đơn hàng bị lỗi, vui lòng kiểm tra kết nối mạng")
            Cart['arr'] = null
            localStorage.setItem("CartWeb2", JSON.stringify(Cart))
            location.reload()
        }
    }
    else {
        alert("Đặt hàng không thành công, vui lòng kiểm tra đăng nhập và giỏ hàng")
    }
}
setTimeout(function () {
    var cart = document.getElementById("cart");
    cart.scrollIntoView({ behavior: 'smooth' });
}, 0)