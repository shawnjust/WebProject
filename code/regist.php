<!doctype html>
<html>
<head>
<title>注册信息</title>
<meta charset=utf-8 />
<link type="text/css" rel="stylesheet" href="main.css" />
<link type="text/css" rel="stylesheet" href="processmessage.css" />
</head>
<body>
<div id="container">
<?php 

require_once('db_conn.php');

if ((!isset($_REQUEST['user_name'])) || (!isset($_REQUEST['user_name'])) || (!isset($_REQUEST['user_name']))) {
?>
	<script>
	window.location.href="register.php";
	</script>
<?php
}

$name = $_REQUEST['user_name'];
$nick_name = $_REQUEST['nick_name'];
$password = $_REQUEST['password'];

$success = false;
$hasexist = false;

$sql = "select user_name from user_info where user_name = '$name'";
if (!($result = mysql_query($sql))) {
} elseif ($row = mysql_fetch_array($result)) {
	$hasexist = true;
} else {
	$sql = "insert into user_info(user_name, nick_name, user_password) values ('$name', '$nick_name', '$password')";
	if (mysql_query($sql)) {
		$success = true;
	} 
}
?>
<?php
mysql_close($db);

?>
<header>
</header>

<div class="block">
<?php
if ($hasexist) {

?> 
<p id="messagecontent">已存在该用户名</p>
<a id="link" href="register.php">点击这里返回注册界面</a>
<?php

} elseif (!$success) {

?> 
<p id="messagecontent">注册失败， 请重试</p>
<a id="link" href="register.php">点击这里返回注册界面</a>
<?php

} else {

?> 
<p id="messagecontent">注册成功</p>
<a id="link" href="index.php">点击这里返回登陆界面</a>
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
