<?php  
session_start();
if(!isset($_SESSION['user'])){
	header('Location: login.php');
	exit;
}
require('connection.php');
$masv = $_GET['masv'];

$sql = "DELETE FROM sinhvien WHERE MaSV = '" .$masv. "'";
if (mysqli_query($conn, $sql)) {
	header('Location: quanliSV.php?status=del_success');
} else {
	header('Location: quanliSV.php?status=del_fail');
}
?>