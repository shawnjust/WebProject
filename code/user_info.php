<div class="user_info_block">
<div class="user_info_pic">
<img src="../image/headpic2.png" alt="User Picture" />
</div>
<div class="user_info_nickname_block">
<p class="user_nickname"><a href="people.php?user=<?= $_user_id?>"><?= $_nick_name ?></a></p>
<?php
if (!$_friend) {
	echo "<p class=\"addfriend\"><a href=\"addfriend.php?user=$_user_id\" >关注</a></p>";
}
?>
</div>
<div class="null">
</div>
</div>
