$(document).ready(function() {
	$("#submitbutton").bind("click", function() {
		var usernameExp = new RegExp("^[0-9a-zA-Z_]{5,30}$");
		var passwordExp = new RegExp("^[0-9a-zA-Z_]{5,30}$");
		var username = $("#inputusername").val();
		var nickname = $("#inputnickname").val();
		var password = $("#inputpassword").val();
		var repeat = $("#inputrepeat").val();

		if (!username) {
			alert("请输入用户名");
			$("#inputusername").focus();
			return false;
		}

		if (!usernameExp.test(username)) {
			alert("用户名必须为5到30个字符，包括大小字母、数字以及下划线");
			$("#inputusername").focus();
			return false;
		}

		if (!nickname) {
			alert("请输入昵称");
			$("#inputnickname").focus();
			return false;
		}

		if (!password) {
			alert("请输入密码");
			$("#inputpassword").focus();
			return false;
		}

		if (!passwordExp.test(password)) {
			alert("密码必须为5到30个字符，包括大小字母、数字以及下划线");
			$("#inputpassword").focus();
			return false;
		}

		if (password != repeat) {
			alert("两次密码输入不一致");
			$("#inputrepeat").focus();
			return false;
		}

		return true;

	});
});
