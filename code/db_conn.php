<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'weiboAdm');
define('DB_PASS', '123456');

$db = mysql_connect(DB_HOST, DB_USER, DB_PASS);
if (!$db)
	die(mysql_error());
mysql_select_db("weibo", $db);

/*$result = mysql_query("select * from user_info");

while ($row = mysql_fetch_array($result))
{
	echo $row['user_id']." ".$row['user_name'];
	echo "<br />";
}
 */
?>
