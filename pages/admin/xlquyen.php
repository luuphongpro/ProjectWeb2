<?php
include '../../module/controller.php';
function RenderTableQuyen()
{
    $quyen = new quyen;
    $result = $quyen->dsquyen();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '
                <tr  style="color: #222222; font-weight: bold;">
                    <td>' . $row['MaQuyen'] . '</td>
                    <td>' . $row['TenQuyen'] . '</td>
                    <td>' . $row['TenND'] . '</td>
                    <td>' . $row['ThoiGian'] . '</td>
                    <td class = "custom-icons" id="' . $row['MaQuyen'] . '">
                        <div Sua="CN01">
                            
                        </div>
                        <div Xoa="CN01">
                            
                        </div>
                    </td>
                </tr> ';
        }
    }
}

function RenderTableChiTietQuyen()
{
    $chucnang = new chucnang();
    $result = $chucnang->dschucnang();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<tr>
                <td>'.$row['TenChucnang'].'</td>
                <td>
                    <input type="checkbox" id="'.$row['MaChucnang'].'_Xem" name="'.$row['MaChucnang'].'" value="1" class="them"> 
                </td>
                <td>
                    <input type="checkbox" id="'.$row['MaChucnang'].'_Them" name="'.$row['MaChucnang'].'" value="1">
                </td>
                <td>
                    <input type="checkbox" id="'.$row['MaChucnang'].'_Sua" name="'.$row['MaChucnang'].'" value="1">
                </td>
                <td>
                    <input type="checkbox" id="'.$row['MaChucnang'].'_Xoa" name="'.$row['MaChucnang'].'" value="1">
                </td>
            </tr>';
        }
    }
}
?>

<!-- <link rel="stylesheet" href="./CSS/product_manager.css"/> -->

<!-- <script src="./JS/phanquyen.js"></script> -->