$(".js_qlquyen").click(function(e) {
    e.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết
  
    $(".nav-link.active").removeClass("active");
    $(this).find("> a").addClass("active");
    $(".content-wrapper").load("./module/quyen.php", function() {
    });
  });

$("#qlquyen").click((e) =>{ 
    $("#right-content").load("./module/quyen.php",function(){
    })
});
    $(".add_quyen").click(function (e) { 
        e.preventDefault();
        var overlay = document.querySelector('.quyen_overlay');
        var info = document.querySelector('.quyen_info');
        
        if (overlay.style.display === 'none' || info.style.display === 'none') {
            overlay.style.display = 'flex';
            info.style.display = 'block';
        } else {
            overlay.style.display = 'none';
            info.style.display = 'none';
        }
    });

    function closeAddQuyenInfo() {
        var overlay = document.querySelector('.quyen_overlay');
        var info = document.querySelector('.quyen_info');
        overlay.style.display = 'none';
        info.style.display = 'none';
    }


    function validateForm() {
        var tenquyen = document.getElementById("tenquyen_detail").value;
        var maquyen = document.getElementById("maquyen\_detail").value;
        var active = document.getElementById("active_detail").value;

        var err_tenquyen = document.getElementById("err_tenquyen");
        var err_maquyen = document.getElementById("err_maquyen");

        
        var hasError = false;


        if (!/^\d+$/.test(maquyen)) {
            err_maquyen.style.display = "block";
            hasError = true;
        }

       
        if (tenquyen.trim() === '') {
            err_tenquyen.style.display = "block";
            hasError = true;
        }
        if (maquyen.trim() === '') {
            err_maquyen.style.display = "block";
            hasError = true;
        }
        console.log(hasError);
        if (hasError) {
            return false;
        }

        return true;
    }

    var hasError = false;

    function validateFixForm() {
        var tenquyen = document.getElementById("fix_tenquyen").value;
        var maquyen = document.getElementById("fix_maquyen").value;
        var active = document.getElementById("fix_active").value;

        var err_tenquyen = document.getElementById("err_fix_tenquyen");
        var err_maquyen = document.getElementById("err_fix_maquyen");
        var err_active = document.getElementById("err_fix_active");

      

        if (!/^\d+(,\d{3})*(\.\d+)?$/.test(active)) {
            err_active.style.display = "block";
            hasError = true;
        }

        if (!/^\d+$/.test(maquyen)) {
            err_maquyen.style.display = "block";
            hasError = true;
        }

        if (tenquyen.trim() === '') {
            err_tenquyen.style.display = "block";
            hasError = true;
        }
        if (maquyen.trim() === '') {
            err_maquyen.style.display = "block";
            hasError = true;
        }
        if (active.trim() === '') {
            err_active.style.display = "block";
            hasError = true;
        }
        if (hasError) {
            return false;
        }
        return true;
    }

    
    function re_useDel_quyen(){
        document.querySelectorAll('.deleteFormQuyen').forEach(function(form) {
            form.addEventListener("submit", async function(ev) {
                ev.preventDefault(); // Ngăn chặn reload trang
                
                console.log("đã vào");
        
                var confirmation = confirm("Bạn có chắc muốn xóa quyền này?"); // Hỏi xác nhận
                if (!confirmation) return; // Nếu không xác nhận, không làm gì cả
        
                const data = new FormData(ev.target); // Lấy dữ liệu từ form
        
                const json = await fetch('./module/delete_product.php', {
                    method: "POST",
                    body: data
                });
        
                const response = await json.json();
        
                const title = document.getElementById('noti-title');
                const desc = document.getElementById('noti-desc');
        
                if (response.message == "successDel") {
                    removeNoti();
                    title.innerHTML = "SUCCESS"
                    desc.innerHTML = "Xóa quyền thành công"
                    noti.style.backgroundColor = "green"
                    noti.style.transform = "translateX(0)"
                } else {
                    removeNoti();
                    title.innerHTML = "FAILURE" // Sửa lỗi chính tả
                    desc.innerHTML = "Xóa quyền thất bại"
                    noti.style.backgroundColor = "red"
                    noti.style.transform = "translateX(0)"
                }
        
                setTimeout(function() {
                    removeNoti();
                }, 3000);
            });
        });
    }

    function updateTable(result) {
        var tableBody = document.querySelector(".table tbody");
        tableBody.innerHTML = ""; // Xóa nội dung cũ của bảng
    
        // Duyệt qua mỗi đối tượng trong mảng result
        result.forEach(function(item) {
            // Tạo một hàng mới cho mỗi đối tượng
            var row = document.createElement("tr");
            row.style.fontWeight = "bold";
            row.innerHTML = `
                <th scope="row">${item.MaChucnang}</th>
                <td>${item.TenChucnang}</td>  
                <td>${item.Active}</td>
                <td class="custom-icons">
                    <div>
                        <a class="fix_quyen_detail"><i class="fa-solid fa-wrench"></i> </a>
                    </div>
                    <div>
                        <form class="deleteFormQuyen" action="./module/process_quyen_form.php" method="get">
                            <input type="hidden" name="deleteMaQuyen" id="deleteMaQuyen" value="${item.MaChucnang}">
                            <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">
                                <a><i class="fa-solid fa-trash"></i></a>
                            </button>
                        </form>
                    </div>
                </td>
            `;
            tableBody.appendChild(row);
        });
        
    }
    var form_add_quyen = document.getElementById("form_add_quyen");
    var noti = document.getElementById('noti');

    function removeNoti(){
        noti.style.transform = 'translateX(110%)';
    }


    form_add_quyen.addEventListener("submit", async function (ev) {
        ev.preventDefault();
        var kq =  validateForm();
        if(!kq){
            return;
        }
        const data = new FormData(ev.target);
        const json = await fetch('http://localhost/ProjectWeb2/module/them_quyen.php', {
            method: 'POST',
            body: data
        })

        const response = await json.json();
        
        console.log(response);

        const title = document.getElementById('noti-title');
        const desc = document.getElementById('noti-desc');
        
        

        if(response.message == 'successAdd'){
            removeNoti()
            console.log(noti)
            noti.style.backgroundColor = 'green';
            title.innerHTML = 'Success'
            desc.innerHTML = 'ĐÃ thêm thành công'
        }else{
            removeNoti()
            noti.style.backgroundColor = 'red';
            title.innerHTML = 'Error'
            desc.innerHTML = 'Thêm thất bại'
        }

        noti.style.transform = 'translateX(0)';
        setTimeout(() => {
            removeNoti()
        }, 4000)
    })

    function loadPage(url) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', url, true);
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 400) {
                var response = xhr.responseText;
                var parser = new DOMParser();
                var newDoc = parser.parseFromString(response, 'text/html');
                var newTable = newDoc.querySelector('table.table.table-bordered');
                if (newTable) {
                    document.querySelector('#quanlisp table.table.table-bordered').innerHTML = newTable.innerHTML;
                } else {
                    console.error('Table not found in the response');
                }
            } else {
                console.error('Request failed with status', xhr.status);
            }
            // bindEditDeleteListeners();
            re_useDel();
        };
        xhr.onerror = function() {
            console.error('Request failed');
        };
        xhr.send();
    }