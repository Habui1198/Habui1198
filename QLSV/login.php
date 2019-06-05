<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Đăng nhập</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/all.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php
		require('connection.php');
		$title="Ðăng nhập";
		$error=[];
		if(isset($_POST['submit']))
		{
			$taikhoan=trim($_POST['TenDangNhap']);
			$matkhau=trim($_POST['Matkhau']);
			$sql = "SELECT * FROM taikhoan WHERE taikhoan = '".$taikhoan."' AND matkhau = '". $matkhau ."' LIMIT 1";	
			$result=mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)>0){
				$row =$result->fetch_assoc();
				
				$_SESSION['user']=$row;
				header('Location:index.php');
			}
			else{
				$error[]="Đăng nhập thất bại";
			}
		}
	?>
	<div class="container-fluid bg">
		<div class="row justify-content-center" style="margin-top:40px">
			<div class="col-md-4 col-sm-8 col-xs-12 row-container" >
				<form action="login.php" method="post">
					<?php if (count($error) > 0) :?>
						<?php for ($i = 0; $i < count($error); $i++) :?>
							<div class="alert alert-danger" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<strong>Error: </strong><?php echo $error[$i];?>					
							</div>
						<?php endfor;?>
					<?php endif;?>					
					<div class="form-group">
						<label for="">Tên đăng nhập</label>
						<input type="text" class="form-control" name="TenDangNhap" id="TenDangNhap" placeholder="Tên đăng nhập..." value="<?php if(isset($_POST['TenDangNhap'])) echo $_POST['TenDangNhap'] ?>">
					</div>
					<div class="form-group">
						<label for="">Mật khẩu</label>
						<input type="password" class="form-control" name="Matkhau" id="Matkhau" placeholder="Mật khẩu...">
					</div>
					<input  type="submit" class="btn btn-success btn-block" id="login" name="submit" value="login">
				</form>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</body>
</html>
