<?php
session_start();
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
<div>
<?php
require_once('db_conn.php');

$note_content = $_REQUEST['note_content'];
$user_id = $_SESSION['user_id'];

$sql = "insert into note(user_id, content) values ('$user_id', '$note_content')";

if(!(mysql_query($sql))) {
	?><p>发布失败</p><a href="mainpage.php">点击这里返回主页</a><br /><?php
	echo mysql_error();
} else {
	?><p>发布成功</p><a href="mainpage.php">点击这里返回主页</a><br /><?php
}

?>
</div>
<footer>
copyright
</footer>
</div>
</body>
</html>
