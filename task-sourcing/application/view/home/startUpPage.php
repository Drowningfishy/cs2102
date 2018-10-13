<head>
		<title>CS2102 project splash screen</title>
		<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/startUpPage.css">
	</head>
	<body>

		<div class="box-1">
			<div style="margin-top:30px"></div>
			<h1>TaskHub</h1>
			<h6><p>TaskHub, 100% guaranteed quality of your life.</p></h6>
			<h1><?php if (Mini\Libs\Helper::logged_in()) {echo "Welcome " . $_SESSION['login_user'] -> name;} else {echo "User not logged in.";};  ?></h1>
			<h6><p>Love, DVA</p></h6>
			<div class="example1">
				<h3>Example1</h3>
				<h6><p>Task Name: Buy KOI hot cocoa</p></h6>
				<h6>Avg. Reward: $10</h6>
				<h6><p>Description: Sent to PGP R4 lounge. Delivered by 2:30 pm on August 5th. KOI hot cocoa, middle size, 50% sugar.</p></h6>
			</div>

			<div class="example2">
				<h3>Example2</h3>
				<h6><p>Task Name : House Cleaning</p></h6>
				<h6>Avg. Reward: $100</h6>
				<h6><p>Description: The house is 160 square metres which has four rooms. It is located at Chinatown,888. Please come on Sep 9th.</p></h6>
			</div>

			<div class="example3">
				<h3>Example3</h3>
				<h6><p>Task Name: Good transporting</p></h6>
				<h6>Avg. Reward: $10</h6>
				<h6><p>Description: The goods is a fridge which weights 10kg. It should be transported from Kent Ridge to PGP before Oct 10th.</p></h6>
			</div>
		</div>

		<div class = "decor">
		</div>

		<div class = "bar">
			<div class="bartext">
			 <div class='logo'>Logo</div>
                <div class="hyperlink">
                 	<a class="startup page" id="startup page" href="<?php echo URL; ?>">SplashScreen</a>
                    <a class="home" id="home" href="<?php echo URL; ?>user/index">Home</a>
                    <a class="login" id="login" href="<?php echo URL; ?>user/index">Login</a>
                    <a class="logout" id="logout" href="<?php echo URL; ?>user/logout">Logout</a>
                </div>
            </div>
		</div>
		

		<div class="background">
		</div>

		<div class="process">
			<h2>How it works?</h2>
			<p>Fill in the working process here.</p>
		</div>

		<div style="margin-top:30px"></div>


	</body>

