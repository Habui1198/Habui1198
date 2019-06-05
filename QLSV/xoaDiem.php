<?php  
session_start();
if(!isset($_SESSION['user'])){
	header('Location: login.php');
	exit;
}
require('connection.php');
$DiemCu=($_GET['diem']);
$MaSVCu=($_GET['masv']);
$MaMHCu=($_GET['mamonhoc']);
$sql = "DELETE FROM diem WHERE MaSV='{$MaSVCu}' AND MaMH='{$MaMHCu}'";
if (mysqli_query($conn, $sql)) {
	header('Location: quanliDiem.php?status=del_success');
} else {
	header('Location: quanliDiem.php?status=del_fail');
}
?>
