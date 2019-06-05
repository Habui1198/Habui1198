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
		$sql="SELECT *FROM lop";
		$lop=mysqli_query($conn,$sql);
		$maLopCu = $_GET['malop'];
		$sql="SELECT * FROM lop WHERE MaLop = '{$maLopCu}' LIMIT 1";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0){
			$lop=$result->fetch_assoc();
		}
		if(isset($_POST['submit'])){
			$maLop=trim($_POST['maLop']);
			$tenLop=trim($_POST['tenLop']);
			if($maLop==""||$tenLop==""){
				$error[]="Vui lòng điền đủ thông tin!!!";
			}
			if(count($error)==0){
			$sql="UPDATE lop SET MaLop='{$maLop}',TenLop='{$tenLop}'WHERE MaLop='{$maLopCu}'";
				if (mysqli_query($conn, $sql)) {
					header('Location: quanliLop.php?status=add_success');
				} else {
				header('Location: quanliLop.php?status=add_fail');
				}
			}
		}
	?>
	<div class="content">		
		<div class="container-fulid">
			<div class="row  justify-content-center">
				<form action="" method="post" class="col-md-6 col-sm-8 col-xs-12 form form-lop">
					<?php if (count($error) > 0) :?>
						<?php for ($i = 0; $i < count($error); $i++) :?>
							<div class="alert alert-danger" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<strong>Error: </strong><?php echo $error[$i];?></p>					
							</div>
						<?php endfor;?>
					<?php endif ;?>
					<div class="form-group">
						<label for="">Mã lớp</label>
						<input type="text" class="form-control" name="maLop" placeholder="Mã lớp" value="<?php if(isset($_POST['maLop'])) echo $_POST['maLop'];else echo $lop['MaLop']; ?>">
					</div>
					<div class="form-group">
						<label for="">Tên Lớp</label>
						<input type="text" class="form-control" name="tenLop" placeholder="Tên lớp" value="<?php if(isset($_POST['tenLop'])) echo $_POST['tenLop'];else echo $lop['TenLop']; ?>">
					</div>
					<input type="submit" name="submit" class="sua" value="Sửa">
					<input type="button" name="btn-huy" value="Hủy bỏ" onclick="history.back(1)">
				</form>
			</div>
		<div>
	</div>
</body>
</html>