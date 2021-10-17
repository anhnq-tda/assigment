<?php
    $ma_hh = $_GET['ma_hh'];
    $connection = new PDO("mysql:host=127.0.0.1;dbname=ass;charset=utf8","root","");
    $query = "delete from hang_hoa where ma_hh=$ma_hh";
    $stmt = $connection->prepare($query);
    $stmt->execute();
    header('location: danh_sach.php');
?>