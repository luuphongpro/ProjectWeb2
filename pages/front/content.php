<?php 
   if(isset($_GET['chon'])){
        if($_GET['id'] == 'home'){
            include './pages/front/offer.php';
            include './pages/front/food.php';
            include './pages/front/about.php';
            include './pages/front/book.php';
            include './pages/front/client.php';
            
        }
        if($_GET['id'] == 'menu'){
            include './pages/front/food.php';
        }
        if($_GET['id'] == 'about'){
            include './pages/front/about.php';
        }
        if($_GET['id'] == 'book'){
            include './pages/front/book.php';
        }
    }
    $menu_id = isset($_GET['id']) ? $_GET['id']: '';
  ?>
  <script>
    let menu_id = '<?php echo $menu_id; ?>';
    const handleTopMenu = function(menu_id){
    console.log(menu_id);
    let header_item = $('#navbarSupportedContent');
    header_item.find('.nav-item.active').removeClass('active')
    switch (menu_id){
        case 'menu':
            tesst = header_item.find('#header_menu').parent().addClass('active');
            break;
        case 'about':
            tesst = header_item.find('#header_about').parent().addClass('active');
            break;
        case 'book':
            tesst = header_item.find('#header_book').parent().addClass('active');
            break;
        default:
            header_item.find('#header_home').parent().addClass('active');
    }
    }   
    handleTopMenu(menu_id);
    
  </script>
