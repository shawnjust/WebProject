<header>
<div id="navigation">
<ul class="menu">
<li><a href="mainpage.php">首页</a></li>
<li><a href="people.php?user=<?= $user_id?>">个人主页</a></li>
<li><a href="friendlist.php">好友列表</a></li>
<li><a href="set.php">个人设置</a></li>
</ul>
<div class="null">
</div>
</div>
<div>
<form id="searchform" method="get" action="search.php">
	<input id="searchinput" type="text" name="keyword"/>
	<input id="searchbutton" type="submit" value="搜索" />
</form>
</div>
</header>
