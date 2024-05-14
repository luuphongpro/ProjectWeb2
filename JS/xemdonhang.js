// $(".donhang-detail").click(function (e) { 
//     e.preventDefault();
    

//     var sdt_user = sessionStorage.getItem().SĐT;
//     console.log(sdt_user);



// });


// var donhang_detail = document.querySelector('.list-donhang');
// donhang_detail.addEventListener("click",async function(e) {
//     e.preventDefault();
//     console.log("in list");
//     var sessionData = JSON.parse(sessionStorage.getItem('UseLogin'));
//     var sdt = sessionData.SĐT;
//     console.log(sdt);

//     const json = await fetch("./module/xemdonhang.php", {
//         method: "POST",
//         headers: {
//             'Content-Type': 'application/json'
//         },
//         body: JSON.stringify({ SĐT: sdt })
//     })
    

//     const response = await json.json();
    
//     if(response.message === "success"){
//         updateTable(response.result);
//     }
    

// });


function listdonhang(){
    var sessionData = JSON.parse(sessionStorage.getItem(UserLogin))
    var sdt = sessionData.SĐT;
    var xhr = new XHR();
    return xhr.connect(undefined,"./module/xemdonhang.php?listdonhang&sdt="+sdt)
    .then(function(data){
        if(data.message == "success"){
            updateTable(data.result);
            console.log("Thành công");
        }
        else {
            var tablebody = document.querySelector('.tabel .list-donhang body');
            tablebody.innerHTML="";
            var row = document.createElement('tr');
            row.innerHTML=`
                <td colspan = 5>Bạn chưa có đơn hàng nào, hãy đặt ngay !!!</td>
            `;
            tablebody.appendChild(row);
        }
    });
}



function updateTable(result){
    var index = 1;
    var tablebody = document.querySelector('.tabel .list-donhang body');
    tablebody.innerHTML="";
    result.foreach(function(item){
        var row = document.createElement('tr');
        row.innerHTML=`
            <tr>
                <th scope="row">${index}</th>
                <td>${item.MaHoadon}</td>
                <td>${item.CreTime}</td>
                <td>${item.TongTien}</td>
                <td style="color: blue">${item.TrangThai}</td>
                <td>
                <a class ="donhang-detail">
                    <i class="fa-solid fa-eye "></i>
                </a>
                </td>
            </tr>
        `;
        tablebody.appendChild(row);
    });
}
