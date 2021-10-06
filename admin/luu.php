<?php
    session_start();
    $manv = $_SESSION['manv'];
    include('config.php');
    echo $manv;
    if(isset($_GET['submit']))
    {
       
        $ten = $_GET['ten'];
        $cv = $_GET['cv'];
        $sdt = $_GET['sdt'];
        $email = $_GET['email'];
        $mpb = $_GET['pb'];
        $sql = "UPDATE db_nhanvien SET
        tennv = '$ten',
        chucvu = '$cv',
        sodidong = '$sdt',
        email = '$email',
        madv = '$mpb' where manv ='$manv'";
        $query = mysqli_query($conn, $sql); 
        header('location: index.php');
    }
    
?>