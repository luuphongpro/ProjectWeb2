<?php 

    include 'controller.php';
    function RenderTableDH(){
        $donhang=new donhang;
        $result=$donhang->dshoadon();
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                echo '<tr font-weight="bold" xl="'.$row["TTHoaDon"].'">
                        <th scope="row">'.$row["MaHoadon"].'</th>
                        <td>'.$row["TenND"] .'</td>
                        <td>'.$row["MaUser"] .'</td>
                        <td>'.$row["TongTien"] .'</td>
                        <td>'.$row["CreTime"] .'</td>
                        <td>
                            '.($row["TTHoaDon"] == 0 ?'Chưa xử lý' :"").'
                            '.($row["TTHoaDon"] == 1 ?'Đã xử lý' :"").'
                            '.($row["TTHoaDon"] == 2 ?'Đang giao hàng' :"").'
                            '.($row["TTHoaDon"] == 3 ?'Đã giao hàng' :"").'
                            '.($row["TTHoaDon"] == 4 ?'Hủy đơn' :"").'
                        </td>
                        <td madh="'.$row["MaHoadon"].'">
                            <div Sua="CN03">
                            </div>
                            <div Xoa="CN03">
                            </div>
                        </td>
                    </tr>';
            }
        }
    }   
    function RenderTableChiTietHD(){
        $donhang=new donhang;
        $result=$donhang->dshoadon();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<tr font-weight: bold">
                        <th scope="row">' . $row['MaSP'] . '</th>
                        <td>' . $row['TenSP'] . '</td>
                        <td>' . $row['SoLuong'] . '</td>
                        <td>' . $row['DonGia'] . '</td>
                        <td>' . $row['DonGia'] * $row['SoLuong'] . '</td>
                    </tr> ';
            }
        }
    }
    
?>