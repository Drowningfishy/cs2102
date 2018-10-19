<head>
	<title>cs2102 team 49 homepage</title>
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/homepage.css">
</head>
<?php if (Mini\Libs\Helper::logged_in()) {} else {header("Location:" . URL. 'user/index');};  ?>
<body>
	
	<div class ="float-box">

		<div class="profile">
			<div style="margin-top:130px"></div>
			<div class = "username"><h1><?php if (Mini\Libs\Helper::logged_in()) {echo $_SESSION['login_user'] -> name; } else {echo "Nickname";};  ?></h1> </div>
			<div class = "account">Account balance: <?php echo $_SESSION['login_user'] -> bidding_point_balance;?> points</div>
			<div class = "logout"><a href="<?php echo URL. 'user/logout'?>">Logout</a></div>

		</div>

		<div class ="firstCol">
			<div class="function2"><a href="/task/search">Search for task</a></div>
			<div class="function1"><a href="/task/mytask">Published Tasks Management</a></div>
		</div>
		

		<div class="function4"><a href="<?php if (Mini\Libs\Helper::is_admin()) {echo URL. 'user/admin';} else {echo "#";}?>">User point management(admin only)</a></div>
		<div class="function3"><a href="/task/mybid">Task Bidding management</a></div>
	</div>

	<div class="clear"></div>

    
    

	<footer id = "main-footer2">
		<p>Copyright &copy; Copyright ©2018, cs2102 team 49 All rights reserved</p>
	</footer>

</body>
