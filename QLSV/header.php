<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="header">Quản lí sinh viên</div>
		<?php if(isset($_SESSION['user'])): ?>
		<div class="logout"><a href="login.php"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a></div>
		<?php endif; ?>
</body>
</html>