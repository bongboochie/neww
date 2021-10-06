<?php
include('config.php');
if (isset($_GET['manv']))
{
    $conn = mysqli_connect('localhost', 'root', '', 'dhtl_danhba');
    if (!$conn) 
    {
        die("không thể kết nối ");
    }
    ?>
    <?php
    $del_manv = $_GET['manv'];
    echo $del_manv;
    $sql = "DELETE FROM db_nhanvien WHERE db_nhanvien.manv = ' $del_manv'"  ;
    if (mysqli_query($conn, $sql)) 
    {
        echo "true";
    } else {
        echo "false";
    }
    header('location:index.php');
}else{
    echo"không";
}