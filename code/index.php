<!doctype html>
<html>
	<head>
		<meta charset=utf-8 />
		<link type="text/css" rel="stylesheet" href="main.css" />
		<link type="text/css" rel="stylesheet" href="index.css" />
		<script type="text/javascript" src="jquery.js"></script>
		<script type="text/javascript" src="index.js"></script>
		<title>Weibo登陆</title>
	</head>
	<body>
	<div id="container">
		<header>
		</header>

		<div class="content">
			<div id="registerContent">
				<form method="get" id="registerForm" action="loginprocess.php">
					<ul>
						<li>
						<div class="submitelement">
							<h4>用户名：</h4>
							<span><input class="inputbucket" id="inputusername" type="text" name="user_name" /></span>
						</div>
						</li>
						<li>
						<div class="submitelement">
							<h4>密码：</h4>
							<span><input class="inputbucket" id="inputpassword" type="password" name="password" /></span>
						</div>
						</li>
						<li class="buttonli">
						<input class="button" id="loginbutton" type="submit" value="登陆" />
						<button class="button" id="registerbutton" >注册</button>
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
