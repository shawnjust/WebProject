$(document).ready(function() {
	
	$('#modifybutton').click(function() {

		var passwordExp = new RegExp("^[0-9a-zA-Z_]{5,30}$");

		var oldpassword = $('#inputoldpassword').val();
		var newpassword = $('#inputnewpassword').val();
		var repeat = $('#inputrepeat').val();

		if (!oldpassword) {
			alert("请输入旧密码");
			$('#inputoldpassword').focus();
			return false;
		}
		
		if (!newpassword) {
			alert("请输入新密码");
			$('#inputnewpassword').focus();
			return false;
		}

		if (!passwordExp.test(newpassword)) {
			alert("密码必须为5到30个字符，包括大小字母、数字以及下划线");
			$("#inputnewpassword").focus();
			return false;
		}

		if (newpassword != repeat) {
			alert("两次密码输入不一致");
			$("#inputrepeat").focus();
			return false;
		}

		return true;

	});

});
