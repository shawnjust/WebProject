<?php
session_start();
?>

<!doctype html> 
<html>
<head>
<meta charset=utf8 />
<link type="text/css" rel="stylesheet" href="main.css" />
<link type="text/css" rel="stylesheet" href="processmessage.css" />
<title>加好友信息</title>
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
if (!isset($_REQUEST['user'])) {
?>
	<script type="text/javascript">
	window.location.href="mainpage.php";
	</script>
<?php
	die();
}

$user_id_1 = $_SESSION['user_id'];
$user_id = $user_id_1;
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

<?php 
include 'head.php';
?>

<div class="block">

<?php
if ($success) {
?>
<p id="messagecontent">加好友成功</p>
<a id="link" href="mainpage.php">点击这里返回主界面</a>
<?php
} else {
?>
<p id="messagecontent">加好友异常，可能他已是您的好友</p>
<a id="link" href="mainpage.php">点击这里返回主页面</a>
<?php 
}?>

</div>

<?php 
include 'foot.php';
?>

</div>
</body>
</html>
