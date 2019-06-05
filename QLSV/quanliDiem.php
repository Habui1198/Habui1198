<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Quản lí điểm</title>
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
		$sql = "SELECT * FROM Diem";
		$diem = mysqli_query($conn, $sql);
	?>
	<div class="header">
		<div class="home">
			<a href="index.php"><i class="fas fa-home"></i>&nbsp; &nbsp;Trang chủ</a>
		</div>
		<h1>Quản lí điểm</h1>
	</div>
	<div class="content">
		<table class="table" style="width:100%">
			<thead class="thead-dark">
				<tr>
					<th scope="col">STT</th>
					<th scope="col">Mã sinh viên</th>
					<th scope="col">Mã môn học</th>
					<th scope="col">Tên môn học</th>
					<th scope="col">Điểm</th>
					<th scope="col" colspan="2" style="text-align:center">Thao tác</th>
				</tr>
			<tbody>
				<?php if (mysqli_num_rows($diem) > 0): ?>
					<?php $stt=1; ?>
					<?php foreach ($diem as $item) :?>
					<tr>
						<th scope="row"><?php echo $stt; ?></th>
						<td><?php echo $item['MaSV']; ?></td>
						<td><?php echo $item['MaMH']; ?></td>
						<td><?php echo $item['TenMH']; ?></td>
						<td><?php echo $item['Diem']; ?></td>
						<td class="sua"><a href="suaDiem.php?masv=<?php echo $item['MaSV'];?>&&diem=<?php echo $item['Diem'];?>&&mamonhoc=<?php echo $item['MaMH'];?>"><i class="fas fa-edit"></i>Sửa</a></td>
						<td class="xoa"><a href="xoaDiem.php?masv=<?php echo $item['MaSV'];?>&&mamonhoc=<?php echo $item['MaMH'];?>" onclick="xoa()"><i class="fas fa-minus-circle"></i>Xóa</a></td>
						<?php $stt++; ?>
					</tr>
					<?php endforeach; ?>
				<?php endif; ?>
				<tr>	
					<td class="them" colspan="7"><a href="themDiem.php"><i class="fas fa-plus"></i>&nbsp; &nbsp;Thêm mới</a></td>
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