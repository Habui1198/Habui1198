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
		$sql="SELECT *FROM diem";
		$diem=mysqli_query($conn,$sql);
		$DiemCu=($_GET['diem']);
		$MaSVCu=($_GET['masv']);
		$MaMHCu=($_GET['mamonhoc']);
		//var_dump($_GET);
		$sql="SELECT * FROM diem WHERE Diem='{$DiemCu}' AND MaSV='{$MaSVCu}' AND MaMH='{$MaMHCu}' LIMIT 1";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0){
			$diem=$result->fetch_assoc();
		}
		if(isset($_POST['submit'])){
			$diem=trim($_POST['diem']);
			if($diem==""){
				$error[]="Không được bỏ trống";
			}
			if(count($error)==0){
			$sql="UPDATE diem SET Diem='{$diem}' WHERE Diem='{$DiemCu}' AND MaSV='{$MaSVCu}' AND MaMH='{$MaMHCu}'";
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
				<form action="" method="post" class="col-md-6 col-sm-8 col-xs-12 form form-diem">
					<?php if (count($error) > 0) :?>
						<?php for ($i = 0; $i < count($error); $i++) :?>
							<div class="alert alert-danger" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<strong>Error: </strong><?php echo $error[$i];?></p>					
							</div>
						<?php endfor;?>
					<?php endif ;?>
					<div class="form-group">
						<label for="">Điểm</label>
						<input type="text" class="form-control" name="diem" placeholder="Điểm" value="<?php if(isset($_POST['diem'])) echo $_POST['diem'];else echo $diem['Diem']; ?>">
					</div>
					<input type="submit" name="submit" class="sua" value="Sửa">
					<input type="button" name="btn-huy" value="Hủy bỏ" onclick="history.back(1)">
				</form>
			</div>
		<div>
	</div>
</body>
</html>