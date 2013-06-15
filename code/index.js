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
			$("#inputusername").focus();
			return false;
		}

		if (!usernameExp.test(username)) {
			$("#inputusername").focus();
			alert("用户名必须为5到30个字符，包括大小字母、数字以及下划线");
			return false;
		}

		if (!password) {
			$("#inputpassword").focus();
			return false;
		}

		return true;
	});
});

