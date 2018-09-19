<head>
		<title>CS2102 project splash screen</title>
		<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/startUpPage.css">
	</head>
	<body>

		<div class="box-1">
			<div style="margin-top:30px"></div>
			<h1>Project name</h1>
			<h6><p>Should write the slogan.</p></h6>
			<h1><?php if (Mini\Libs\Helper::logged_in()) {echo "Welcome " . $_SESSION['login_user'] -> name;} else {echo "User not logged in.";};  ?></h1>
			<h6><p>Love, DVA</p></h6>
			<div class="example1">
				<h3>Example1</h3>
				<h6><p>Description1</p></h6>
			</div>

			<div class="example2">
				<h3>Example2</h3>
				<h6><p>Description2</p></h6>
			</div>

			<div class="example3">
				<h3>Example3</h3>
				<h6><p>Description3</p></h6>
			</div>
		</div>

		<div class = "decor">
		</div>

		<div class = "bar">
			<div class="bartext">
				<div class='logo'>Logo</div>			
				<a class="login" id="login" href="<?php echo URL; ?>user/index">Login</a>
				<a class="contact" id="contact" href="#">Contact</a>
			</div>
		</div>
		
		<div class="background">
		</div>

		<div class="process">
			<h2>How it works?</h2>
			<p>Fill in the working process here.</p>
		</div>

		<div style="margin-top:30px"></div>

		
		<footer id="main-footer">
			<p>Copyright &copy;2018, cs2102 team 49 All rights reserved.</p>
		</footer>

	</body>

