document.querySelectorAll('.detail-button').forEach(function(button, productIndex) {
    button.addEventListener('click', function() {
        var overlays = document.querySelectorAll('.overlay');
        var infos = document.querySelectorAll('.info');
        
        overlays.forEach(function(overlay, index) {
            if (index === productIndex) {
                overlay.style.display = 'flex';
            } else {
                overlay.style.display = 'none';
            }
        });
        
        infos.forEach(function(info, index) {
            if (index === productIndex) {
                info.style.display = 'flex';
            } else {
                info.style.display = 'none';
            }
        });
    });
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

function quantityup() {
    var newquans = document.querySelectorAll('#quantity');
    newquans.forEach(function(newquan) {
        newquan.value = parseInt(newquan.value) + 1;
    });
}

function quantitydown() {
    var newquans = document.querySelectorAll('#quantity');
    newquans.forEach(function(newquan) {
        if (newquan.value > 1) {
            newquan.value = parseInt(newquan.value) - 1;
        }
    });
}