<head>
	<title>cs2102 team 49 homepage</title>
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/homepage.css">
</head>
<?php if (Mini\Libs\Helper::logged_in()) {} else {header("Location:" . URL. 'user/index');};  ?>
<body>
	
	<div class ="float-box">

		<div class="profile">
			<div style="margin-top:130px"></div>
			<div class = "username"><h1 style="color:#000000"><?php if (Mini\Libs\Helper::logged_in()) {echo $_SESSION['login_user'] -> name; } else {echo "Nickname";};  ?></h1> </div>
			<div class = "account">Account balance: <?php echo $_SESSION['login_user'] -> bidding_point_balance;?> points</div>
			<div class = "logout"><a href="<?php echo URL. 'user/logout'?>" style = "text-decoration:none;color:#000000" >Logout</a></div>

		</div>

			<div class="function2"><a href="/task/search" style = "text-decoration:none;color:#3333CC"><div style="margin-top:300px"></div>Search for task</a></div>
			<div class="function1"><a href="/task/mytask" style = "text-decoration:none;color:#3333CC"><div style="margin-top:300px"></div>Published Tasks Management</a></div>
		

		<div class="function4"><div style="margin-top:300px"></div><a href="<?php if (Mini\Libs\Helper::is_admin()) {echo URL. 'user/admin';} else {echo "#";}?>"style = "text-decoration:none;color:#3333CC" >User point management(admin only)</a></div>
		<div class="function3"><a href="/task/mybid" style = "text-decoration:none;color:#3333CC"><div style="margin-top:300px"></div>Task Bidding management</a></div>
	</div>

	<div class="clear"></div>

    
    



</body>
