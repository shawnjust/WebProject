<?php
session_start();
require_once('db_conn.php');

$user_id_1 = $_SESSION['user_id'];
$user_id_2 = $_REQUEST['user'];

$sql = "insert into user_relation values ($user_id_1, $user_id_2)";

$success = true;
if (!(mysql_query($sql))) {
	//出错处理
	$success = false;
} else {
	$success = true;
}

?>
<!doctype html> 
<html>
<head>
<meta charset=utf8 />
<title>加好友信息</title>
</head>
<body>
<?php
if ($success) {
?>
<h3>加好友成功</h3>
<p><a href="mainpage.php">点击这里返回主界面</a></p>
<?php
} else {
?>
<h3>操作异常，请重新登录</h3>
<p><a href="index.php">点击这里返回登陆窗口</a></p>
<?php 
}?>
</body>
</html>
