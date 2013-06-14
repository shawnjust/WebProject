<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset=utf8 />
<link type="text/css" rel="stylesheet" href="main.css" />
<link type="text/css" rel="stylesheet" href="processmessage.css" />
<title>登陆信息</title>
</head>
<body>
<div id="container">

<header>
</header>

<div class="block">

<?php
require_once('db_conn.php');

if ((!isset($_REQUEST['user_name'])) || (!isset($_REQUEST['password']))) {
?>
	<script>
	window.location.href="register.php";
	</script>
<?php	
}

$name = $_REQUEST['user_name'];
$password = $_REQUEST['password'];

$sql = "select user_id from user_info where user_name = '$name' and user_password = '$password'";

if (!($result = mysql_query($sql))) {
?>
<p id="messagecontent">登录失败，请重新登陆</p>
<a id="link" href="index.php">点击这里返回登陆界面</a>
<?php
}elseif (!($row = mysql_fetch_array($result))) {
?>
<p id="messagecontent">用户名不存在或者密码错误</p>
<a id="link" href="index.php">点击这里返回登陆界面</a>
<?php
} else {
$_SESSION['user_id'] = $row['user_id'];
//require 'mainpage.php';
?>
<script language="javascript" type="text/javascript">
window.location.href="mainpage.php"
</script>
<?php
}
?>

</div>

<?php 
include 'foot.php';
?>

</div>

</body>
</html>
