<?php
session_start();
$uptypes=array('image/jpg', //上传文件类型列表
'image/jpeg',
'image/png',
'image/pjpeg',
'image/gif',
'image/bmp',
'image/x-png');
$max_file_size=5000000;        //上传文件大小限制, 单位BYTE
$destination_folder="../image/";
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

if (!is_uploaded_file($_FILES["headpic"]["tmp_name"]))  {
?>
<script type="text/javascript">
	window.location.href="mainpage.php";
</script>
<?php
}


$user_id = $_SESSION['user_id'];
$file = $_FILES["headpic"];
$typeerror = false;
$error = false;
if (!in_array($file["type"], $uptypes)) {
	$typeerror = true;
} else {
	if (!file_exists($destination_folder))
		mkdir($destination_folder);
	$filename = $file["tmp_name"];
	$pinfo = pathinfo($file["name"]);
	$ftype = $pinfo["extension"];
	$destination = $destination_folder.$user_id."_".time().".".$ftype;
	if(!move_uploaded_file ($filename, $destination)) {
		echo "<font color='red'>移动文件出错！</a>";
		$error = true;
	} else {
		$sql = "update user_info set pic_path = '$destination' where user_id = $user_id";
		if (!mysql_query($sql)) {
			$error = true;
		}
	}
}

?>

<?php
include 'head.php';
?>
 
<div class="block">

<?php
if (!$typeerror && !$error) {
?>
<p id="messagecontent">头像上传成功</p>
<a id="link" href="mainpage.php">点击这里返回主界面</a>
<?php
} else {
		?>
<p id="messagecontent">上传失败，请重试</p>
<a id="link" href="editheadpic.php">点击这里返回重试</a>
<?php
}
?>
</div>

<?php
include 'foot.php';
?>

</div>
</body>
</html>


