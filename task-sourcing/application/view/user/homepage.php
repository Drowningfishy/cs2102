<head>
	<title>cs2102 team 49 homepage</title>
	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/homepage.css">
</head>
<?php if (Mini\Libs\Helper::logged_in()) {} else {header("Location:" . URL. 'user/index');};  ?>
<body>
	
	<div class ="float-box">
		<div class="profilelogo">Here should be Logo</div>

		<div class="function1"><a href="/task/search">Search for task</a></div>
		<div class="function2">Published Tasks Management</div>

		<div class="profile">
			<div class = "username"><h1><?php if (Mini\Libs\Helper::logged_in()) {echo $_SESSION['login_user'] -> name; } else {echo "Nickname";};  ?></h1> </div>
			<div class = "account">Account balance: xx points</div>
			<div class = "task_no">No. of Your pending task: xx</div>
			<div class = "logout"><a href="<?php echo URL. 'user/logout'?>">Logout</a></div>

		</div>

		<div class="function3">CRUD entries(admin only)</div>
		<div class="function4">Task Bidding management</div>
	</div>

	<div class="clear"></div>

    
    

	<footer id = "main-footer2">
		<p>Copyright &copy; Copyright ©2018, cs2102 team 49 All rights reserved</p>
	</footer>

</body>
