
function initQuanlyQuyen(){
    chucnang.QLQuyen(ChucNangs)
    $(".addQuyen").on("click",function(){
        $(".container_modal-quyen").addClass("active")
        $(".container_modal-quyen").load("./pages/admin/themquyen.php",function(){
            $(".icon_close-quyen").on("click",function(){
                $(".container_modal-quyen").removeClass("active")
            })
            SubmitFormQuyen()
            Checked_Unchecked()
        })
    })
}
function Checked_Unchecked(){
    $("input[type='checkbox']").change(function(){
        if($(this).is(":checked")){
            console.log($(this).parent())
            $(this).parent().parent().find(".them").prop("checked",true)
        }
        else {
            if($(this).parent().parent().find("input:checked").length==1){
                $(this).parent().parent().find(".them").prop("checked",false)
            }
        }
    })
}
function SubmitFormQuyen(choice='them',maquyen=null){
    Validator({
        form: '#form-themquyen',
        rules: [
            Validator.isRequired("#TenQuyen"),
            Validator.isRequired("#MaQuyen"),
            Validator.isMaxLength("#MaQuyen",10),
        ],
        errorElement: '.form-message',
        onSubmit: function(value){
            var currenAccount=JSON.parse(sessionStorage.getItem('UseLogin'))
            var xhr=new XHR();
            value['SĐT']=currenAccount['SĐT']
            // console.log(value)
            if(choice=='them'){
                return xhr.connect("POST","./module/quyen.php?them",value)
                .then(function(data){
                    if(data=='success'){
                        alert("Thêm nhóm quyền thành công")
                        $(".icon_close-quyen").click()
                        $(".js_qlquyen").click()
                    }
                })
            }
            else {
                value['MaCu']=maquyen;
                return xhr.connect("POST","./module/quyen.php?sua",value)
                .then(function(data){
                    if(data=='success'){
                        alert("Sửa nhóm quyền thành công")
                        $(".icon_close-quyen").click()
                        $(".js_qlquyen").click()
                    }
                })
            }
        }
    })
}
function SuaQuyen(e){
    var maquyen=$(e.currentTarget).parent().parent().attr("id")
    var xhr=new XHR();
    return xhr.connect(undefined,"./module/quyen.php?tim&id="+maquyen)
    .then(function(data){
        var valueQuyen=JSON.parse(data)
        $(".container_modal-quyen").addClass("active")
        $(".container_modal-quyen").load("./pages/admin/suaquyen.php",function(){
            SetFormQuyen(valueQuyen)
            $(".icon_close-quyen").on("click",function(){
                $(".container_modal-quyen").removeClass("active")
            })
            Checked_Unchecked()
            SubmitFormQuyen('sua',maquyen)
        })
    })
}
function SetFormQuyen(data){
    var form = document.querySelector("#form-themquyen");
    // var checkboxes = form.querySelectorAll("input[type='checkbox']:not([disabled])");
    $("#MaQuyen").val(data[0]['MaQuyen'])
    $("#TenQuyen").val(data[0]['TenQuyen'])
    $("#TenQuyen").val(data[0]['TenQuyen'])
    data.forEach((item)=>{
        var inputElements=document.querySelectorAll(`input[name='${item['MaChucnang']}']`)
        for( var input of inputElements){
            var key = input.getAttribute('id').split("_")[1]
            if(item[key]==1){
                input.checked=true;
            }
            else 
            input.checked=false;
        }
    })
}
function XoaQuyen(maquyen){
    var xhr=new XHR();
    return xhr.connect(undefined,"./module/quyen.php?xoa&id="+maquyen)
    .then(function(data){
        if(data=='success'){
            alert("Xóa nhóm quyền thành công!")
            $(".icon_close-quyen").click()
            $(".js_qlquyen").click()
        }
        else {
            alert("Xóa nhóm quyền thất bại, vui lòng kiểm tra lỗi!")
        }
    })
}