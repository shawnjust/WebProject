<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset=utf8 />
<link type="text/css" rel="stylesheet" href="main.css" />
<link type="text/css" rel="stylesheet" href="processmessage.css" />
<title>密码更改信息</title>
</head>
<body>
<div id="container">
<?php
require_once('db_conn.php');

if (!isset($_SESSION['user_id'])) {
?>
	<script type="text/javascript">
	window.location.href="index.php";
	</script>
<?php
	die();
}

if ((!isset($_REQUEST['oldpassword'])) || (!isset($_REQUEST['newpassword']))) {
?>
<script type="text/javascript">
window.location.href="mainpage.php";
</script>
<?php
}

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

<?php
include 'head.php';
?>
 
<div class="block">

<?php
if ($oldpasswordsuccess) {
	if ($success) {
?>
<p id="messagecontent">密码更改成功</p>
<a id="link" href="password.php">点击这里返回修改界面</a>
<?php
	} else {
		?>
<p id="messagecontent">操作异常，请重试</p>
<a id="link" href="password.php">点击这里返回重试</a>

<?php
	}
} else {
?>
<p id="messagecontent">密码错误，请重试</p>
<a id="link" href="password.php">点击这里返回重试</a>
<?php 
}?>
</div>

<?php
include 'foot.php';
?>

</div>
</body>
</html>

