<?php
    if(isset($_GET["btn_search"])){
        include "./module/process_product_form.php";
    }else{
        include "./module/qldonhang.php";
    }
?>