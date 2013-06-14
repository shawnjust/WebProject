<?php
session_start();
if (isset($_SESSION['user_id'])) {
	unset($_SESSION['user_id']);
}
?>
<!doctype>
<html>
<head>
<meta charset=utf8 />
<script>
window.location.href="index.php";
</script>
</head>
<body>
</body>
</html>
