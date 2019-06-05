<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Quản lí sinh viên</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/all.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
</body>
	<?php
		if(!isset($_SESSION['user'])){
			header('Location:login.php');
		}
		else{
			require('connection.php');
			include('header.php');
		}
	?>
	
	<ul>
		<li><a href="quanliSV.php"><i class="fas fa-stroopwafel fa-spin"></i> Quản lí Sinh viên</a></li>
		<li><a href="quanliLop.php"><i class="fas fa-stroopwafel fa-spin"></i> Quản lí Lớp</a></li>
		<li><a href="quanliDiem.php"><i class="fas fa-stroopwafel fa-spin"></i> Quản lí Điểm</a></li>
		<li><a href="quanliMH.php"><i class="fas fa-stroopwafel fa-spin"></i> Quản lí Môn học</a></li>
	</ul>
</body>
</html>