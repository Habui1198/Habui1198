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
<body>
	<?php
		if(!isset($_SESSION['user'])){
			header('Location:login.php');
			exit;
		}
		require('connection.php');
		$error=[];
		$sql = "SELECT * FROM diem";
		$diem = mysqli_query($conn, $sql);
		if(isset($_POST['submit'])){
			$maSV=trim($_POST['maSV']);
			$maMH=trim($_POST['maMH']);
			$tenMH=trim($_POST['tenMH']);
			$diem=trim($_POST['diem']);
			if($maSV==""||$maMH==""||$tenMH==""||$diem==""){
				$error[]="Vui lòng điền đủ thông tin!!!";
			}
			if(count($error)==0){
			$sql="INSERT INTO diem(MaSV,MaMH,TenMH,Diem) VALUES ('{$maSV}','{$maMH}','{$tenMH}','{$diem}')";
				if (mysqli_query($conn, $sql)) {
					header('Location: quanliDiem.php?status=add_success');
				} else {
				header('Location: quanliDiem.php?status=add_fail');
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
						<label for="">Mã môn học</label>
						<input type="text" class="form-control" name="maMH" placeholder="Mã môn học">
					</div>
					<div class="form-group">
						<label for="">Tên môn học</label>
						<input type="text" class="form-control" name="tenMH" placeholder="Tên môn học">
					</div>
					<div class="form-group">
						<label for="">Điểm</label>
						<input type="text" class="form-control" name="diem" placeholder="Điểm">
					</div>
					<input type="submit" name="submit" class="them" value="Thêm">
					<input type="button" name="btn-huy" value="Hủy bỏ" onclick="history.back(1)">
				</form>
			</div>
		<div>
	</div>
</body>
</html>