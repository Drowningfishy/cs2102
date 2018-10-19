<head>
		<title>WhaleTasked SignUpPage</title>
		<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/signUp.css">
	</head>
	<body>
		<div class='whole'>
			
			<form class="form-signup" action="/user/registerUser" method="post">

				<h1>WhaleTasked</h1>

				<label for="username" class="username-only"> Username</label>
				<br/>
				<input type="text" name="name" id="name" placeholder="Username" class="validate"
                       value="<?php echo isset($name) ? $name : ''; ?>" required>

				<br>

				<label for="email" class="email-only"> Email Address</label><br/>
				<input type="email" name="email" id="email" placeholder="Please enter your email address" class="validate"
                       value="<?php echo isset($email) ? $email : ''; ?>" required>
				    
				<br>

				<label for="password" class="pwd-only"> Password</label><br/>
				
				<input type="password" name="password" id="password" placeholder="Please enter your password" class="validate" required minlength="8">

				<br>

				<label for="password" class="pwd-only">Password Confirmation</label><br/>

				<input type="password" name="password_confirm" id="password_confirm" placeholder="Please enter your password" class="validate" required minlength="8">

				<div style="margin-top:40px"></div>
				<button type="submit" id="signUpBtn" class="btn btn-su btn-primary btn-block"><a href="/homepage">Sign Up</a> </button>
				
				<br>

				<a href="/user/index" class="hasaccount">Already have an account?</a>
		    
		    </form>
		</div>
	</body>