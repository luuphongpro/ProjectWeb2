function XuLyDH(event){
    var xhr=new XHR();
    var flag=confirm("Bạn thực xự muốn duyệt đơn hàng này?")
    if(flag){
        var madonhang=$(event.currentTarget).parent().parent().attr("madh")
        return xhr.connect(undefined,"./module/donhang.php?xuly&id="+madonhang)
        .then(function(data){
            if(data=="success"){
                alert("Duyệt đơn hàng thành công")
                $(".js_qldh").click()
            }
            else alert("Duyện đơn hàng thất bại");
        })
    }
}
function HuyDH(event){
    var xhr=new XHR();
    var flag=confirm("Bạn thực xự muốn hủy đơn hàng này?")
    if(flag){
        var madonhang=$(event.currentTarget).parent().parent().attr("madh")
        console.log(madonhang)
        return xhr.connect(undefined,"./module/donhang.php?huy&id="+madonhang)
        .then(function(data){
            if(data=="success"){
                alert("Hủy đơn hàng thành công")
                $(".js_qldh").click()
            }
            else alert("Hủy đơn hàng thất bại");
        })
    }
    console.log("cmmm")
}
function initQuanlyDonhang(){
    $("tr").each(function(){
        if($(this).attr("xl")==0){
            $(this).find(".detailed").removeClass("disabled")
            $(this).find(".delete").removeClass("disabled")
        }
    })
    SubmitFilterDH()
}
function SubmitFilterDH(){
    Validator({
        form: ".filter",
        rules: [],
        onSubmit:function(value){
            var xhr=new XHR();
            return xhr.connect("POST","./module/donhang.php?filter",value)
            .then(data =>{
                RenderTableHD(JSON.parse(data))
            })
        }
    })
}
function RenderTableHD(data){
    var html="";
    data.forEach(item => {
        html+=`
            <tr  xl="${item.TTHoaDon}" id_f="${item.MaHoadon}" onclick="XemChiTietDH(event)">
                <th style="font-weight: bold;" scope="item">${item.MaHoadon}</th>
                <td>${item.TenND}</td>
                <td>${item.MaUser}</td>
                <td>${item.TongTien}</td>
                <td>${item.CreTime}</td>
                <td>
                    ${item.TTHoaDon == 0 ? 'Chưa xử lý' : ''}
                    ${item.TTHoaDon == 1 ? 'Đã xử lý' : ''}
                    ${item.TTHoaDon == 2 ? 'Đang giao hàng' : ''}
                    ${item.TTHoaDon == 3 ? 'Đã giao hàng' : ''}
                    ${item.TTHoaDon == 4 ? 'Hủy đơn' : ''}
                </td>
                <td madh="${item.MaHoadon}" class="d-flex justify-content-center">
                    <div Sua="CN03"></div>
                    <div Xoa="CN03"></div>
                </td>
            </tr>
            `;
    });
    $("#showdata").html(html)
    chucnang.QLBanHang(ChucNangs);
}
function XemChiTietDH(e){
    e.stopPropagation()
    var madh=$(e.currentTarget).attr("id_f")
    var xhr=new XHR();
    return xhr.connect(undefined,"./module/donhang.php?xemchitiet&id="+madh)
    .then(function(data){
        console.log(JSON.parse(data))
        RenderTableChitietDH(JSON.parse(data))
    })
}
function RenderTableChitietDH(data){
    var html=`<h1> Chi tiết đơn hàng số ${data[0].MaHoadon}</h1>
    <p>SĐT: ${data[0].MaUser}</p>
    <p>Địa chỉ: ${data[0].Address}</p>
    <p>Tên người dùng: ${data[0].TenND}</p>
    <p>Tình trạng đơn hàng: ${data[0].TTHoaDon ==0 ? "Chưa xử lý" : ""} ${data[0].TTHoaDon ==1 ? "Đã xử lý" : ""}${data[0].TTHoaDon ==4 ? "Đã xóa" : ""}</p>
    <table class="table table-bordered">
        <thead>
            <tr class="list-name">
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
            </tr>
        </thead>

        <tbody>
        `;
    data.forEach(item => {
        html+=`<tr font-weight: bold">
            <th scope="row">${item.MaHoadon}</th>
            <td>${item.TenSP}</td>
            <td>${item.SoLuong}</td>
            <td>${item.DonGia}</td>
            <td>${item.MaHoadon*item.SoLuong}</td>
        </tr> `;
    })
    html+=`</tbody>
    
    </table>
    `;
    $(".content-wrapper").html(html)
}