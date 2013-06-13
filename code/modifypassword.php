<?php
session_start();
require_once('db_conn.php');

$user_id = $_SESSION['user_id'];
$oldpassword = $_REQUEST['oldpassword'];
$newpassword = $_REQUEST['newpassword'];

$sql = "select user_password from user_info where user_id = $user_id";

$oldpasswordsuccess = true;
if (!($result = mysql_query($sql))) {
	$oldpasswordsuccess = false;
} elseif (!($row = mysql_fetch_array($result))) {
	$oldpasswordsuccess = false;
} else {
	$success = true;
	if ($row['user_password'] == $oldpassword) {
		$sql = "update user_info set user_password = '$newpassword' where user_id = $user_id";
		
		if (!(mysql_query($sql))) {
			$success = false;
		} else {
			$success = true;
		}

	} else {
		$oldpasswordsuccess = false;
	}
}



?>
<!doctype html> 
<html>
<head>
<meta charset=utf8 />
<title>密码更改信息</title>
</head>
<body>
<?php
if ($oldpasswordsuccess) {
	if ($success) {
?>
<h3>密码更改成功</h3>
<p><a href="password.php">点击这里返回修改界面</a></p>
<?php
	} else {
		?>
<h3>操作异常，请重试</h3>
<p><a href="password.php">点击这里返回重试</a></p>

<?php
	}
} else {
?>
<h3>密码错误，请重试</h3>
<p><a href="password.php">点击这里返回重试</a></p>
<?php 
}?>
</body>
</html>

