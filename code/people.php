<?php
session_start();
//if (!isset($_SESSION['user_id'])) {
//	require 'index.php';
//	die();
//}
require_once('db_conn.php');
?>
<!doctype html>
<html>
<head>
<meta charset=utf-8 />
<link type="text/css" rel="stylesheet" href="main.css" />
<link type="text/css" rel="stylesheet" href="publishblock.css" />
<link type="text/css" rel="stylesheet" href="block.css" />
<title>Weibo</title>
</head>
<body>
<div id="container">
<header>
<div>
<ul class="menu">
<li><a href="#">首页</a></li>
<li><a href="#">个人主页</a></li>
<li><a href="#">好友列表</a></li>
<li><a href="#">个人设置</a></li>
</ul>
</div>
</header>
<div class="content">
<?php 
$user_id = $_GET['user'];
$sql = "SELECT user_info.user_id, nick_name, content FROM note, user_info where user_info.user_id = '$user_id' and user_info.user_id = note.user_id order by publish_time desc";
if (!($result = mysql_query($sql))) {
	echo mysql_error();
} else {
	while ($row = mysql_fetch_array($result)) {
		$nick_name = $row['nick_name'];
		$note_content = $row['content'];
		$publish_user_id = $row['user_id'];
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

