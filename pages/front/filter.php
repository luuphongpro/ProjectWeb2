<div class="searchBar">
    <form class="filter" method="get" action="index.php">
        <div class="item ten">
            <label>Tên</label>
            <input name="timkiem" value="<?php if(isset($_GET['txtTimkiem'])){echo $_GET['txtTimkiem'];} ?>" type="text">
        </div>
        <div class="item submit">
            <input class="btnSearch" type="submit">
        </div>
        <div class="item">
            <label>Danh mục</label>
            <select name="category">
                <option value="">---</option>
                <option value="B">Hamburger</option>
                <option value="C">Gà</option>
                <option value="P">Pizza</option>
                <option value="D">Nước</option>
            </select>
        </div>
        <div class="item">
            <label>Giá tối thiểu</label>
            <input name="minPrice" type="number" min = 0 value = "<?php if(isset($_GET['minPrice'])){echo $_GET['minPrice'];}?>">
        </div>
        <div class="item">
            <label>Giá tối đa</label>
            <input name="maxPrice" type="number" min = 0 value = "<?php if(isset($_GET['maxPrice'])){echo $_GET['maxPrice'];} ?>">
            <input type="hidden" name="page" value="1">
        </div>
    </form>
</div>