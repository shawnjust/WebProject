<div class="user_info_block">
<div class="user_info_pic">
<img src="../image/headpic2.png" alt="User Picture" />
</div>
<div class="user_info_nickname_block">
<p class="user_nickname"><a href="people.php?user=1"><?= $nick_name ?></a></p>
<?php
if (!$friend) {
	echo "<p class=\"addfriend\"><a href=\"addfriend.php?user=$user_id\" >关注</a></p>";
}
?>
</div>
<div class="null">
</div>
</div>
