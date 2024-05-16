function XuLyDH(event){
    var xhr=new XHR();
    var flag=confirm("Bạn thực xự muốn duyệt đơn hàng này?")
    if(flag){
        var madonhang=$(event.currentTarget).parent().parent().attr("madh")
        console.log(madonhang)
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
}