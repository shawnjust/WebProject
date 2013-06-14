<?php
session_start();
if (!isset($_SESSION['user_id'])) {
	?><script type="text/javascript">window.location.href="index.php"</script><?php
	die();
}
$user_id = $_SESSION['user_id'];
?>
<!doctype html>
<html>
<head>
<meta charset=utf-8 />
<link type="text/css" rel="stylesheet" href="main.css" />
<link type="text/css" rel="stylesheet" href="processmessage.css" />
<link type="text/css" rel="stylesheet" href="block.css" />
<title>Weibo</title>
</head>
<body>
<div id="container">
<?php 
include 'head.php';
?>
<div class="block">
<?php
require_once('db_conn.php');

$note_content = $_REQUEST['note_content'];
$user_id = $_SESSION['user_id'];

$sql = "insert into note(user_id, content) values ('$user_id', '$note_content')";

if(!(mysql_query($sql))) {
	?><p id="messagecontent">发布失败</p><a id="link" href="mainpage.php">点击这里返回主页</a><?php
	echo mysql_error();
} else {
	?><p id="messagecontent">发布成功</p><a id="link" href="mainpage.php">点击这里返回主页</a><?php
}

?>
</div>
<?php 
include 'foot.php';
?>
</div>
</body>
</html>
