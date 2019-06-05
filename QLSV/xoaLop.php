<?php  
session_start();
if(!isset($_SESSION['user'])){
	header('Location: login.php');
	exit;
}
require('connection.php');
$malop = $_GET['malop'];

$sql = "DELETE FROM lop WHERE MaLop = '" .$malop. "'";
if (mysqli_query($conn, $sql)) {
	header('Location: quanliLop.php?status=del_success');
} else {
	header('Location: quanliLop.php?status=del_fail');
}
?>