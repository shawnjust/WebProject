$(document).ready(function() {
	$("#registerbutton").bind("click", function() {
		window.location.href='register.php';
		return false;
	});

	$("#loginbutton").bind("click", function() {
		var usernameExp = new RegExp("^[0-9a-zA-Z_]{5,30}$");
		var passwordExp = new RegExp("^[0-9a-zA-Z_]{5,30}$");
		var username = $("#inputusername").val();
		var password = $("#inputpassword").val();
		
		if (!username) {
			alert("请输入用户名");
			$("#inputusername").focus();
			return false;
		}

		if (!usernameExp.test(username)) {
			alert("用户名必须为5到30个字符，包括大小字母、数字以及下划线");
			return false;
		}

		if (!password) {
			alert("请输入密码");
			$("#inputpassword").focus();
			return false;
		}

		if (!passwordExp.test(password)) {
			alert("密码不和规范 请重新输入");
			return false;
		}
		return true;
	});
});

