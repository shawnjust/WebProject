<?php
session_start();
//if (!isset($_SESSION['user_id'])) {
//	require 'index.php';
//	die();
//}
require_once('db_conn.php');

$user_id = $_SESSION['user_id'];
$sql = "select nick_name from user_info where user_id = $user_id";

$success = true;
$nick_name = "";
if (!($result = mysql_query($sql))) {
	$success = false;
} elseif (!($row = mysql_fetch_array($result))) {
	$success = false;
} else {
	$nick_name = $row['nick_name'];
}
?>
<!doctype html>
<html>
<head>
<meta charset=utf-8 />
<link type="text/css" rel="stylesheet" href="main.css" />
<link type="text/css" rel="stylesheet" href="set.css" />
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="mainpage.js"></script>
<script type="text/javascript" src="set.js"></script>
<title>Weibo</title>
</head>
<body>
<div id="container">
<?php include 'head.php'; ?>
<div class="content"> 
	<div id="settingnavigation">
		<div class="tab">
			<a class="dir" href="set.php">基本信息</a>
			<a class="dir" href="password.php">修改密码</a>
		</div>
	</div>
	<div id="modify">
		<div id="modifycontent">
		<form method="get" id="nicknameform" action="modifynickname.php">
			<ul>
				<li>
				<div class="submitelement">
					<h4>昵称：</h4>
					<span><input class="inputbucket" id="inputnickname" type="text" name="nick_name" value="<?= $nick_name?>" /></span>
				</div>
				</li>
				<li>
				<input id="modifybutton" type="submit" value="修改" />
				</li>
			</ul>
		</form>
		</div>
	</div>	
	<div class="null">
	</div>
</div>
<footer>
copyright
</footer>
</div>
</body>
</html>