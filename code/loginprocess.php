<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset=utf8 />
<title></title>

<?php
require_once('db_conn.php');

$name = $_REQUEST['user_name'];
$password = $_REQUEST['password'];

$sql = "select user_id from user_info where user_name = '$name' and user_password = '$password'";

if (!($result = mysql_query($sql))) {
?>
<script language="javascript" type="text/javascript">
window.location.href="loginerror.php"
</script>
<?php
}elseif (!($row = mysql_fetch_array($result))) {
?>
<script language="javascript" type="text/javascript">
window.location.href="loginerror.php"
</script>
<?php
} else {
$_SESSION['user_id'] = $row['user_id'];
//require 'mainpage.php';
?>
<script language="javascript" type="text/javascript">
window.location.href="mainpage.php"
</script>
<?php
}
?>
</head>
<body>
</body>
</html>
