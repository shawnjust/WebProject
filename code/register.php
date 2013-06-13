<!doctype html>
<html>
	<head>
		<meta charset=utf-8 />
		<link type="text/css" rel="stylesheet" href="main.css" />
		<link type="text/css" rel="stylesheet" href="register.css" />
		<title>Weibo注册</title>
		<script type="text/javascript" src="jquery.js"></script>
		<script type="text/javascript" src="regist.js"></script>
	</head>
	<body>
	<div id="container">
		<header>
		</header>

		<div class="content">
			<div id="registerContent">
				<form method="get" id="registerForm" action="regist.php">
					<ul>
						<li>
						<div class="submitelement">
							<h4>用户名：</h4>
							<span><input class="inputbucket" id="inputusername" type="text" name="user_name" /></span>
						</div>
						</li>
						<li>
						<div class="submitelement">
							<h4>昵称：</h4>
							<span><input class="inputbucket" id="inputnickname" type="text" name="nick_name" /></span>
						</div>
						</li>
						<li>
						<div class="submitelement">
							<h4>密码：</h4>
							<span><input class="inputbucket" id="inputpassword" type="password" name="password" /></span>
						</div>
						</li>
						<li>
						<div class="submitelement">
							<h4>重复密码：</h4>
							<span><input class="inputbucket" id="inputrepeat" type="password" /></span>
						</div>
						</li>
						<li>
						<input id="submitbutton" type="submit" value="注册" />
						</li>
					</ul>
				</form>
			</div>
		</div>
		<footer>
		copyright
		</footer>
	</div>
	</body>
</html>
