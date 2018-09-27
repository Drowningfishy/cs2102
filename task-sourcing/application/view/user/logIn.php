
	<head>
		<title>cs2102 project LoginPage</title>
		<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/loginPage.css">
	</head>

	<body>
		<div class='whole'>

			<div style="margin-top:10px"></div>
			<form class="form-login" action="/user/login" method="post">

				<h1>L O G O</h1>
				
				<label for="email" class="email-only"> Email Address</label>
				<input type="email" name="email" id="email" class="form-control" placeholder="Please enter your email address" class="validate"
                       value="<?php echo isset($email) ? $email : ''; ?>">
				    
				<br>

				<label for="password" class="pwd-only"> Password</label>
				<input type="password" name="password" id="password" class="validate" class="form-control" placeholder="Please enter your password">

				<div style="margin-top:40px"></div>
				<button type="submit" name="action" id="loginBtn" class="btn btn-lg btn-primary btn-block"><a href="/homepage">Log in</a> </button>
				
				<br>

				<a href="/user/register" class="noaccount">Do not have an account yet?</a>
		    
		    </form>
		</div>
	</body>
