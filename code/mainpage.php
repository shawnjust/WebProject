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
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="mainpage.js"></script>
<title>Weibo</title>
</head>
<body>
<div id="container">
<?php include 'head.php'; ?>
<div class="content">
<div class="block">
	<div id="publishblock">
		<form method="get" id="note_block" action="publish.php">
			<div><textarea id="note_content" name="note_content"></textarea></div>
			<div><input id="submitbutton" type="submit" value="发布"/></div>
			<div class="null"></div>
		</form>
	</div>
</div>
<?php 
$user_id = $_SESSION['user_id'];
$sql = "SELECT user_info.user_id, nick_name, content, publish_time FROM note, user_info, user_relation where user_relation.user_id_1 = '$user_id' and user_info.user_id = user_relation.user_id_2 and note.user_id = user_relation.user_id_2 union select user_info.user_id, nick_name, content, publish_time FROM note, user_info where user_info.user_id = '$user_id' and user_info.user_id = note.user_id order by publish_time desc";
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
