<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Danh sách sinh viên</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/all.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php 
		if(!isset($_SESSION['user'])){
			header('Location:login.php');
			exit();
		}
		require('connection.php');
		$error=[];
		$sql = "SELECT * FROM sinhvien";
		$sinhvien = mysqli_query($conn, $sql);
	?>
	<div class="header">
		<div class="home">
			<a href="index.php"><i class="fas fa-home"></i>&nbsp; &nbsp;Trang chủ</a>
		</div>
		<h1>Quản lí sinh viên</h1>
	</div>
	<div class="content">
		<table class="table" style="width:100%">
			<thead class="thead-dark">
				<tr>
					<th scope="col">STT</th>
					<th scope="col">Mã sinh viên</th>
					<th scope="col">Họ và tên</th>
					<th scope="col">Mã lớp</th>
					<th scope="col">Giới tính</th>
					<th scope="col">Ngày sinh</th>
					<th scope="col" colspan="2" style="text-align:center">Thao tác</th>
				</tr>
				<tbody>
					<?php if (mysqli_num_rows($sinhvien) > 0): ?>
						<?php $stt=1; ?>
						<?php foreach ($sinhvien as $item) :?>
						<tr>
							<th scope="row"><?php echo $stt; ?></th>
							<td><?php echo $item['MaSV']; ?></td>
							<td><?php echo $item['HoTen']; ?></td>
							<td><?php echo $item['MaLop']; ?></td>
							<td><?php echo $item['GioiTinh']; ?></td>
							<td><?php echo $item['NgaySinh']; ?></td>
							<td class="sua"><a href="suaTT.php?masv=<?php echo $item['MaSV'];?>"><i class="fas fa-edit"></i>Sửa</a></td>
							<td class="xoa"><a href="xoaTT.php?masv=<?php echo $item['MaSV'];?>" onclick="xoa()"><i class="fas fa-minus-circle"></i>Xóa</a></td>
							<?php $stt++; ?>
						</tr>
						<?php endforeach; ?>
					<?php endif; ?>
					<tr>	
						<td class="them" colspan="8"><a href="themSV.php"><i class="fas fa-plus"></i>&nbsp; &nbsp;Thêm mới</a></td>
					</tr>
				</tbody>
		</table>
	</div>
	<script>
		function xoa(){
			if(!confirm('Bạn có muốn xóa không?'))
				return flase;
		}
	</script>
</body>
</html>