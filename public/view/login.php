<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Page</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="./../css/header.min.css">
	<link rel="stylesheet" type="text/css" href="./../css/form.min.css">
</head>

<body>
	<?php include "./include/header.php" ?>

	<section class="login-body">
		<div class="row">
			<div class="input-cart col s12 m10 push-m1 z-depth-2 grey lighten-5">
				<div class="col s12 m5 login">
					<h4 class="center">Log in</h4>
					<br>
					
						<div class="row">
							<div class="input-field">
								<input type="text" id="user" name="username" class="validate" required="required">
								<label for="user">Username</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field">
								<input type="password" id="pass" name="password" class="validate" required="required">
								<label for="pass">Password</label>
							</div>
						</div>
						<div class="row">
							<div class="switch col s6">
								<label>
									<input type="checkbox">
									<span class="lever"></span>
									Remember Me
								</label>
							</div>
							<div class="col s6">
								<button type="submit" name="login" onclick="onLogin()"
									class="btn waves-effect waves-light black right">Log
									in</button>
								<p id="response">Status</p>
							</div>
						</div>
					
				</div>
				<!-- Signup form -->
				<div class="col s12 m7 signup">
					<div class="signupForm">
						<h4 class="center">Sign up</h4>
						<br>
							<div class="row">
								<div class="input-field col s12 m6">
									<input type="text" id="name-picked" name="namepicked" class="validate"
										required="required">
									<label for="name-picked">Pick a Username</label>
								</div>
								<div class="input-field col s12 m6">
									<input type="password" id="pass-picked" name="passpicked" class="validate"
										required="required">
									<label for="pass-picked">Password</label>
								</div>
							</div>
							<div class="row">
								<div class="input-field email">
									<div class="col s12">
										<input type="text" id="email" name="email" class="validate" required="required">
										<label for="email">Your E-Mail</label>
									</div>
								</div>
							</div>
						<div class="row">
							<button type="submit" name="btn-signup" onclick="onRegister()"
								class="btn blue right waves-effect waves-light">Sign
								Up</button>
						</div>
					</div>
					<div class="signup-toggle center">
						<h4 class="center">Have No Account ? <a href="#!">Sign Up</a></h4>
					</div>
				</div>
				<div class="col s12">
					<br>
					<div class="legal center">
					</div>

				</div>
			</div>
		</div>

		<script src="https://code.jquery.com/jquery-1.12.4.min.js"
			integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>
		<!-- <script src="asset/js/init.js"></script> -->
	</section>

	<script src="./../js/animation.js"></script>

	<?php include "./include/footer.php" ?>
</body>

</html>