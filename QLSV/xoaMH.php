<?php  
session_start();
if(!isset($_SESSION['user'])){
	header('Location: login.php');
	exit;
}
require('connection.php');
$maMH = $_GET['mamh'];
$sql = "DELETE FROM monhoc WHERE MaMH = '" .$maMH. "'";
if (mysqli_query($conn, $sql)) {
	header('Location: quanliMH.php?status=del_success');
} else {
	header('Location: quanliMH.php?status=del_fail');
}
?>