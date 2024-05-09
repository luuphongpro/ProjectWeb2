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
                <td>${data['totalTong']}</td>
              </tr>`;
            })
            $(".js_table-thongke").html(html)
        })
    }
    else {
        console.log(dataThongKe)
        flag.forEach((data)=>{
            html+=`<tr>
            <td>${data['MaSP']}</td>
            <td>${data['TenSP']}</td>
            <td><img src="./img/${data['IMG']}" alt="Image" style="width: 100px"></td>
            <td>${data['totalSL']}</td>
            <td>${data['DonGia']}</td>
            <td>${data['totalTong']}</td>
          </tr>`;
        })
        $(".js_table-thongke").html(html)
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