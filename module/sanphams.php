<?php 
    include './controller.php';
    $sanpham=new sanpham;
    if(isset($_REQUEST['tim'])){
        $id=$_REQUEST['id'];
        $result=$sanpham->timsanpham($id);
        $row=null;
        if(mysqli_num_rows($result)>0){
            $row=mysqli_fetch_assoc($result);
        }
        $data=json_encode($row);
        echo $data;
    }
?>