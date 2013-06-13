<!doctype html>
<html>
<head>
<title>注册</title>
<meta charset=utf-8 />
</head>
<body>
<?php 

require_once('db_conn.php');

$name = $_REQUEST['user_name'];
$nick_name = $_REQUEST['nick_name'];
$password = $_REQUEST['password'];


$sql = "select user_name from user_info where user_name = '$name'";
if (!($result = mysql_query($sql))) {
	mysql_close($db);
	die('查询失败');
}
if ($row = mysql_fetch_array($result)) {
	mysql_close($db);
	die("已有该用户");
}
$sql = "insert into user_info(user_name, nick_name, user_password)
	values
	('$name', '$nick_name', '$password')";
if (!mysql_query($sql)) {
	mysql_close($db);
	die('Error: '. mysql_error());
}

?>
<script>
window.location.href="index.php";
</script>
<?php
mysql_close($db);

?>
</body>
</html>
