<?php
session_start();
require_once('db_conn.php');
?>
<!doctype html>
<html>
<head>
	<meta charset=utf8 />
	<link type="text/css" rel="stylesheet" href="main.css" />
	<link type="text/css" rel="stylesheet" href="publishblock.css" />
	<link type="text/css" rel="stylesheet" href="block.css" />
	<link type="text/css" rel="stylesheet" href="user_info.css" />
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="mainpage.js"></script>
	<title>搜索</title>
</head>
<body>
<div id="container">
<?php include 'head.php'; ?>
<div class="content">
<?php 
$keyword = $_GET['keyword'];

$sql = "SELECT * FROM user_info where nick_name like '%$keyword%'";
if (!($result = mysql_query($sql))) {
	echo mysql_error();
} else {
	while ($row = mysql_fetch_array($result)) {
		$_nick_name = $row['nick_name'];
		$_user_id = $row['user_id'];
		$_friend = true;
		echo "<div class=\"block\" >";
		include 'user_info.php';
		echo "</div>";
	}
}


$sql = "SELECT distinct user_info.user_id, nick_name, content, publish_time FROM note, user_info where user_info.user_id = note.user_id and note.content like '%$keyword%' order by publish_time desc";
if (!($result = mysql_query($sql))) {
	echo mysql_error();
} else {
	while ($row = mysql_fetch_array($result)) {
		$nick_name = $row['nick_name'];
		$note_content = $row['content'];
		$publish_user_id = $row['user_id'];
		$publish_time = $row['publish_time'];
		echo "<div class=\"block\" >";
		include 'message.php';
		echo "</div>";
	}
}
?>
</div>
<footer>
copyright
</footer>
</div>
</body>
</html>
