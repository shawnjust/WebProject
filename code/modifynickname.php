<?php
session_start();
?>
<!doctype html> 
<html>
<head>
<meta charset=utf8 />
<link type="text/css" rel="stylesheet" href="main.css" />
<link type="text/css" rel="stylesheet" href="processmessage.css" />
<title>昵称更改信息</title>
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
if (!isset($_REQUEST['nick_name'])) {
?>
	<script type="text/javascript">
	window.location.href="mainpage.php";
	</script>
<?php
	die();
}
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

<?php 
include 'head.php';
?>

<div class="block">

<?php
if ($success) {
?>
<p id="messagecontent">昵称更改成功</p>
<a id="link" href="set.php">点击这里返回修改界面</a>
<?php
} else {
?>
<p id="messagecontent">操作异常，请重试</p>
<a id="link" href="set.php">点击这里返回登陆窗口</a>
<?php 
}?>

</div>

<?php 
include 'foot.php';
?>
</div>
</body>
</html>
