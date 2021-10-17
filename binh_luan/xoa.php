<?php
    $ma_bl = $_GET['ma_bl'];
    $ma_hh = $_GET['ma_hh'];
    $ma_kh = $_GET['ma_kh'];

    $connection = new PDO("mysql:host=127.0.0.1;dbname=ass;charset=utf8","root","");
    $query = "delete from binh_luan where ma_bl=$ma_bl AND ma_hh=$ma_hh AND ma_kh=$ma_kh";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    header('location: danh_sach.php');
?>