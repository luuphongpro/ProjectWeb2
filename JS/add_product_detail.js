document.querySelector('.add_product_detail').addEventListener('click', function() {
    var overlay = document.querySelector('.overlay');
    var info = document.querySelector('.info');
    
    if (overlay.style.display === 'none' || info.style.display === 'none') {
        overlay.style.display = 'flex';
        info.style.display = 'block';
    } else {
        overlay.style.display = 'none';
        info.style.display = 'none';
    }
});


function closeAddProductInfo() {
    var overlay = document.querySelector('.overlay');
    var info = document.querySelector('.info');
    overlay.style.display = 'none';
    info.style.display = 'none';
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

