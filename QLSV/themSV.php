<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Thêm sinh viên</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/all.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
</body>
	<?php
		if(!isset($_SESSION['user'])){
			header('Location:login.php');
			exit;
		}
		require('connection.php');
		$error=[];
		$sql="SELECT * FROM lop";
		$lop = mysqli_query($conn, $sql);
		if(isset($_POST['submit'])){
			$maSV=trim($_POST['maSV']);
			$hoTen=trim($_POST['hoTen']);
			$maLop=trim($_POST['maLop']);
			$gioiTinh=trim($_POST['gioiTinh']);
			$ngaySinh=trim($_POST['ngaySinh']);
			if($maSV==""||$hoTen==""||$maLop==""||$gioiTinh==""||$ngaySinh==""){
				$error[]="Vui lòng điền đủ thông tin!!!";
			}
			if(count($error)==0){
			$sql="INSERT INTO sinhvien(MaSV,HoTen,MaLop,GioiTinh,NgaySinh) VALUES ('{$maSV}','{$hoTen}','{$maLop}','{$gioiTinh}','{$ngaySinh}')";
				if (mysqli_query($conn, $sql)) {
					header('Location: quanliSV.php?status=add_success');
				} else {
				header('Location: quanliSV.php?status=add_fail');
				}
			}
		}
	?>
	<div class="content">
		<div class="container-fuild">
			<div class="row  justify-content-center">
				<form action="" method="post" class="col-md-6 col-sm-8 col-xs-12 form">
					<?php if (count($error) > 0) :?>
						<?php for ($i = 0; $i < count($error); $i++) :?>
							<div class="alert alert-danger" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<strong>Error: </strong><?php echo $error[$i];?></p>					
							</div>
						<?php endfor;?>
					<?php endif ;?>
					<div class="form-group">
						<label for="">Mã sinh viên</label>
						<input type="text" class="form-control" name="maSV" placeholder="Mã sinh viên">
					</div>
					<div class="form-group">
						<label for="">Họ và tên</label>
						<input type="text" class="form-control" name="hoTen" placeholder="Họ và tên">
					</div>
					<div class="form-group">
						<label for="">Mã lớp</label>
						<select class="form-control" name="maLop">
							<?php if (mysqli_num_rows($lop) > 0): ?>
								<?php foreach ($lop as $item) :?>
									<option value="<?php echo $item['MaLop'] ?>"><?php echo $item['MaLop']; ?></option>
								<?php endforeach; ?>
							<?php endif; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="">Giới tính</label>
						<select class="form-control" name="gioiTinh">
							<option>Nam</option>
							<option>Nữ</option>
							<option>Không</option>
						</select>
					</div>
					<div class="form-group">
						<label for="">Ngày sinh</label>
						<input type="text" class="form-control" name="ngaySinh" placeholder="Ngày sinh">
					</div>
					<input type="submit" name="submit" class="them" value="Thêm">
					<input type="button" name="btn-huy" value="Hủy bỏ" onclick="history.back(1)">
				</form>
			</div>
		<div>
	</div>
</body>
</html>