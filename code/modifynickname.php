<?php
session_start();
require_once('db_conn.php');

$user_id = $_SESSION['user_id'];
$nick_name = $_REQUEST['nick_name'];

$sql = "update user_info set nick_name = '$nick_name' where user_id = $user_id";

$success = true;
if (!(mysql_query($sql))) {
	$success = false;
} else {
	$success = true;
}

?>
<!doctype html> 
<html>
<head>
<meta charset=utf8 />
<title>昵称更改信息</title>
</head>
<body>
<?php
if ($success) {
?>
<h3>昵称更改成功</h3>
<p><a href="set.php">点击这里返回修改界面</a></p>
<?php
} else {
?>
<h3>操作异常，请重试</h3>
<p><a href="set.php">点击这里返回登陆窗口</a></p>
<?php 
}?>
</body>
</html>
