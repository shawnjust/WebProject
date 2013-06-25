<?php
session_start();
//if (!isset($_SESSION['user_id'])) {
//	require 'index.php';
//	die();
//}
if (!isset($_SESSION['user_id'])) {
	?><script type="text/javascript">window.location.href="index.php"</script><?php
	die();
}
$user_id = $_SESSION['user_id'];
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
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="mainpage.js"></script>
<title>Weibo</title>
</head>
<body>
<div id="container">
<?php include 'head.php'; ?>
<div class="content">
<?php 
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM user_info, user_relation where user_relation.user_id_1 = $user_id and user_info.user_id = user_relation.user_id_2";
if (!($result = mysql_query($sql))) {
	//error
} else {
	while ($row = mysql_fetch_array($result)) {
		$_user_id = $row['user_id_2'];
		$_nick_name = $row['nick_name'];
		$_friend = true;
		$_peo_head_pic = $row['pic_path'];
		echo "<div class=\"block\" >";
		include 'user_info.php';
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


