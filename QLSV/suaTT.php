<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sửa thông tin sinh viên</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/all.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php
		if(!isset($_SESSION['user'])){
			header('Location:login.php');
			exit;
		}
		require('connection.php');
		$error=[];
		$maSVCu = $_GET['masv'];
		$sql="SELECT * FROM sinhvien WHERE MaSV = '{$maSVCu}' LIMIT 1";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0){
			$sv=$result->fetch_assoc();
		}
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
			$sql="UPDATE sinhvien SET MaSV='{$maSV}',HoTen='{$hoTen}',MaLop='{$maLop}',GioiTinh='{$gioiTinh}',NgaySinh='{$ngaySinh}'WHERE MaSV='{$maSVCu}'";
				if (mysqli_query($conn, $sql)) {
					header('Location: quanliSV.php?status=update_success');
				} else {
				header('Location: quanliSV.php?status=update_fail');
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
						<input type="text" class="form-control" name="maSV" placeholder="Mã sinh viên" value="<?php if(isset($_POST['maSV'])) echo $_POST['maSV'];else echo $sv['MaSV']; ?>">
					</div>
					<div class="form-group">
						<label for="">Họ và tên</label>
						<input type="text" class="form-control" name="hoTen" placeholder="Họ và tên" value="<?php if(isset($_POST['hoTen'])) echo $_POST['hoTen'];else echo $sv['HoTen']; ?>">
					</div>
					<div class="form-group">
						<label for="">Mã lớp</label>
						<input type="text" class="form-control" name="maLop" placeholder="Mã lớp" value="<?php if(isset($_POST['maLop'])) echo $_POST['maLop'];else echo $sv['MaLop']; ?>">
					</div>
					<div class="form-group">
						<label for="">Giới tính</label>
						<input type="text" class="form-control" name="gioiTinh" placeholder="Giới tính" value="<?php if(isset($_POST['gioiTinh'])) echo $_POST['gioiTinh'];else echo $sv['GioiTinh']; ?>">
					</div>
					<div class="form-group">
						<label for="">Ngày sinh</label>
						<input type="text" class="form-control" name="ngaySinh" placeholder="Ngày sinh" value="<?php if(isset($_POST['ngaySinh'])) echo $_POST['ngaySinh'];else echo $sv['NgaySinh']; ?>">
					</div>
					<input type="submit" name="submit"  value="Sửa" class="sua">
					<input type="button" name="btn-huy" value="Hủy bỏ" onclick="history.back(1)">
				</form>
			</div>
		<div>
	</div>
</body>
</html>