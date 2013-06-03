<!doctype html>
<html>
	<head>
		<meta charset=utf-8 />
		<link type="text/css" rel="stylesheet" href="index.css" />
		<title>Weibo登陆</title>
	</head>
	<body>
	<div id="container">
		<header>
		<img id="headerimg" src="../image/head.jpg" alt="header" />
		</header>

		<div class="content">
			<div id="registerContent">
				<form method="get" id="registerForm" action="loginprocess.php">
					<ul>
						<li>
						<div class="submitelement">
							<h4>用户名：</h4>
							<span><input class="inputbucket" type="text" name="user_name" /></span>
						</div>
						</li>
						<li>
						<div class="submitelement">
							<h4>密码：</h4>
							<span><input class="inputbucket" type="password" name="password" /></span>
						</div>
						</li>
						<li>
						<input id="submitbutton" type="submit" value="登陆" />
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
