<?php
session_start();
if (!isset($_SESSION['user_id'])) {
	?><script type="text/javascript">window.location.href="index.php"</script><?php
	die();
}
$user_id = $_SESSION['user_id'];
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
<link type="text/css" rel="stylesheet" href="user_info.css" />
<title>Weibo</title>
</head>
<body>
<div id="container">
<?php include 'head.php'; ?>
<div class="content">
<?php 
$user_id = $_GET['user'];

$sql = "SELECT * FROM user_info where user_id = '$user_id'";
if (!($result = mysql_query($sql))) {
	echo mysql_error();
} else {

	if ($row = mysql_fetch_array($result)) {
		$nick_name = $row['nick_name'];
		$friend = false;
		if (!isset($_SESSION['user_id'])) {
			$friend = true; 
		} else {
			$main_user_id = $_SESSION['user_id'];
			if ($main_user_id == $user_id) {
				$friend = true;
			} else {
				$sql = "SELECT * FROM user_relation where user_id_1 = '$main_user_id' and user_id_2 = '$user_id'";
				if (($result = mysql_query($sql))) {
					if ($row = mysql_fetch_array($result)) {
						$friend = true;
					}
				}
			}	
		}
		$_nick_name = $nick_name;
		$_user_id = $user_id;
		$_friend = $friend;
		echo "<div class=\"block\" >";
		include 'user_info.php';
		echo "</div>";
	}
}


$sql = "SELECT user_info.user_id, nick_name, content, publish_time FROM note, user_info where user_info.user_id = '$user_id' and user_info.user_id = note.user_id order by publish_time desc";
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
<?php 
include 'foot.php';
?>
</div>
</body>
</html>

