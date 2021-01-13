<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include_once(__DIR__.'/../../../dbconnect.php');
    $hsp_id = $_GET['hsp_id'];
    $sqlSelect = "SELECT * FROM `hinhsanpham` WHERE hsp_id=$hsp_id;";
    $resultSelect=mysqli_query($conn,$sqlSelect);
    $hinhsanphamRow = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC);
    $upload_dir = __DIR__ . "/../../../assets/uploads/";
    $subdir = 'products/';
    $old_file = $upload_dir . $subdir . $hinhsanphamRow['hsp_tentaptin'];
    if (file_exists($old_file)) {
        // Hàm unlink(filepath) dùng để xóa file trong PHP
        unlink($old_file);
}
    $hsp_id = $_GET['hsp_id'];
    $sql = "DELETE FROM `hinhsanpham` WHERE hsp_id=" . $hsp_id;
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    header('location:index.php');
?>