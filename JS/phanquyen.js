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

function closeProductInfo() {
    var overlays = document.querySelectorAll('.overlay');
    var infos = document.querySelectorAll('.info');

    overlays.forEach(function(overlay) {
        overlay.style.display = 'none';
    });

    infos.forEach(function(info) {
        info.style.display = 'none';
    });
}
function showQuyenOverlay() {
    var overlay = document.querySelector(".overlay");
    var info = document.querySelector(".info");
    overlay.style.display = "block";
    info.style.display = "block";
}

function handleCheckboxChange(checkboxId, buttonId) {
    var checkbox = document.getElementById(checkboxId);
    var button = document.getElementById(buttonId);

    if (checkbox.checked) {
        button.disabled = false;
    } else {
        button.disabled = true;
    }
}

    function restoreCheckboxState(checkboxId, buttonId) {
        var checkbox = document.getElementById(checkboxId);
        var button = document.getElementById(buttonId);

        var isChecked = localStorage.getItem(checkboxId);

        if (isChecked === "true") {
            checkbox.checked = true;
            button.disabled = false;
        }
    }
