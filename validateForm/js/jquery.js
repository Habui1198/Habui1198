
function isEmail(inputEmail){
	var regex=/^([a-zA-Z0-9_+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return regex.test(inputEmail);
}
function validateUsername(inputUsername){
	return inputUsername.length>=3;
}
function validatePassword(inputPassword){
	return inputPassword.length>=6;
}
$(document).ready(function(){
		$('#username').change(function(){
			var username=$(this).val().trim();
			if(!validateUsername(username))
				$('#errorUsername').html("Tên đăng nhập phải lớn hơn 3 ký tự");
			else
				$('#errorUsername').html('');
		});
		$('#email').change(function(){
			var email=$(this).val().trim();	
			if(!isEmail(email)){
				$("#errorEmail").html('Định dạng email không đúng!!!');
			}
			else
				$('#errorEmail').html("");	
		});
		$('#password').change(function(){
			var password=$(this).val().trim();
			if(!validatePassword(password))
				$("#errorPassword").html("Mật khẩu phải lớn hơn 5 ký tự!!!");
			else
				$("#errorPassword").html("");
		});	
		$('#login').click(function(){
			var username=$('#username').val().trim();
			var email=$('#email').val().trim();
			var password=$('#password').val().trim();
			if(username)
				$('#errorUsername').html("");
			if(email)
				$('#errorEmail').html("");
			if(password)
				$('#errorPassword').html("");
			if(username=='')
				$('#errorUsername').html('Vui lòng điền vào trường này!!!');
			if(email=='')
				$('#errorEmail').html('Vui lòng điền vào trường này!!!');
			else if(!isEmail(email)){
				$("#errorEmail").html('Định dạng email không đúng!!!');
			}
			if(password=='')
				$('#errorPassword').html('Vui lòng điền vào trường này!!!');
			else if(!validatePassword(password))
				$("#errorPassword").html("Mật khẩu phải lớn hơn 5 ký tự!!!");
			else
				alert("Đăng nhập thành công!!!");

		});
});
