<?php
	$server="localhost";
	$username="root";
	$password="";
	$database="quanli_sinhvien";
	$conn=mysqli_connect($server,$username,$password,$database);
	$conn->set_charset('utf8');
	if($conn->connect_error){
		exit('lỗi kết nối:'.$conn->connect_error);
	}
?>
		