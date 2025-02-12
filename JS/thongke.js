var dataThongKe=[]
function GetValue(){
    var xhr=new XHR()
    return xhr.connect(undefined,"./module/sanphams.php?thongke")
    .then(function(data){
        dataThongKe=JSON.parse(data)
    })
}
function RenderThongKe(flag=false){
    var html="";
    var tong=0;
    if(!flag){
        GetValue()
        .then(function(){
            dataThongKe.forEach((data)=>{
                html+=`<tr>
                <td>${data['MaSP']}</td>
                <td>${data['TenSP']}</td>
                <td><img src="./img/${data['IMG']}" alt="Image" style="width: 100px"></td>
                <td>${data['totalSL']}</td>
                <td>${data['DonGia']}</td>
                <td>${Number(data['DonGia'])*Number(data['totalSL'])}</td>
              </tr>`;
              tong+=Number(data['DonGia'])*Number(data['totalSL']);
            })
            $(".js_danhthu").html(`Tổng doanh thu: ${tong.toLocaleString('vi-VN')}`)
            $(".js_table-thongke").html(html)
        })
    }
    else {
        flag.forEach((data)=>{
            html+=`<tr>
            <td>${data['MaSP']}</td>
            <td>${data['TenSP']}</td>
            <td><img src="./img/${data['IMG']}" alt="Image" style="width: 100px"></td>
            <td>${data['totalSL']}</td>
            <td>${data['DonGia']}</td>
            <td>${Number(data['DonGia'])*Number(data['totalSL'])}</td>
          </tr>`;
          tong+=Number(data['DonGia'])*Number(data['totalSL']);
        })
        $(".js_table-thongke").html(html)
        $(".js_danhthu").html(`Tổng doanh thu: ${tong.toLocaleString('vi-VN')}`)
    }
}
function RenderSelector(){
    var html=`<option value="0">Tất cả</option>`;
    var xhr=new XHR();
    return xhr.connect(undefined,"./module/sanphams.php?gettheloai")
    .then(function(data){
        var theloais=JSON.parse(data);
        theloais.forEach((theloai)=>{
            html+=`<option value="${theloai['categoryId']}">${theloai['categoryName']}</option>`
        })
        $(".js_thongke-theloai").html(html)
    })
}
function FiltertSatistics(){
    var valuefilter={};
    var xhr=new XHR();
    valuefilter['ToTimeST']=$("#ToTimeST").val()
    valuefilter['FormTimeST']=$("#FormTimeST").val()
    valuefilter['categoryST']=$("#categoryST").val()
    return xhr.connect("POST","./module/sanphams.php?thongke",valuefilter)
    .then((data)=>{
        dataThongKe=JSON.parse(data)
        RenderThongKe(dataThongKe)
    })
}