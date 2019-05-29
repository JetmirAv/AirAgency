<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSS -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/form-elements.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<!-- Favicon and touch icons -->
	<link rel="shortcut icon" href="assets/ico/favicon.png">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">


	<!-- <style>
		.inputfile {
			width: 0.1px;
			height: 0.1px;
			opacity: 0;
			overflow: hidden;
			position: absolute;
			z-index: -1;
		}

		.inputfile+label {
			font-size: 1.25em;
			font-weight: 700;
			color: white;
			background-color: transparent;
			display: inline-block;
		}

		.inputfile:focus+label,
		.inputfile+label:hover {
			background-color: rgba(0, 0, 0, 0.5);
		}

		.inputfile+label {
			cursor: pointer;
			/* "hand" cursor */
		}

		.inputfile:focus+label {
			outline: 1px dotted #000;
			outline: -webkit-focus-ring-color auto 5px;
		}

		.inputfile+label * {
			pointer-events: none;
		}
	</style>
	 -->
</head>
<?php include "components/head.php"; ?>

<body>
	<?php include "components/header.php"; ?>

	<!-- Top content -->
	<div class="top-content">

		<div class="inner-bg">
			<div class="container">
				<div class="row">
					<div class="col-sm-5">

						<div class="form-box">
							<div class="form-top">
								<div class="form-top-left">
									<h3>Login to our site</h3>
									<p>Enter username and password to log on:</p>
									<?php 
										if(isset($_SESSION['error'])){
											foreach($_SESSION['error'] as $logInError){
												echo "<p style='color:red'>$logInError</p>";
											}
										}									
									
									?>
								</div>
								<div class="form-top-right">
									<i class="fa fa-lock"></i>
								</div>
							</div>
							<div class="form-bottom">
								<form role="form" action="../global/logIn.php" method="post" class="login-form">
									<div class="form-group">
										<label class="sr-only" for="form-username">Username</label>
										<input type="text" name="form-username" placeholder="Username..." class="form-username form-control" id="form-username">
									</div>
									<div class="form-group">
										<label class="sr-only" for="form-password">Password</label>
										<input type="password" name="form-password" placeholder="Password..." class="form-password form-control" id="form-password">
									</div>
									<button type="submit" name="login" class="btn">Sign in!</button>
								</form>
							</div>
						</div>
					</div>

					<div class="col-sm-1 middle-border"></div>
					<div class="col-sm-1"></div>

					<div class="col-sm-5">

						<div class="form-box">
							<div class="form-top">
								<div class="form-top-left">
									<h3>Sign up now</h3>
									<p>Fill in the form below to get instant access:</p>
									<?php 
										if(isset($_SESSION['errors'])){
											foreach($_SESSION['errors'] as $error){
												echo "<p style='color:red'>$error</p>";
											}
										}									
									
									?>
								</div>
								<div class="form-top-right">
									<i class="fa fa-pencil"></i>
								</div>
							</div>
							<div class="form-bottom" style="width: 100%;
																margin: auto;
																height:400px;
																overflow: scroll;
																text-align: center;">
								<form role="form" action="../global/register.php" method="post" class="registration-form" enctype="multipart/form-data">
									<div class="form-group">
										<label style="color:rgba(0.1, 0.1, 0.1, 0.5);" id="inputlabel" for="form-img">Profile picture</label>
										<input type="file" name="form-img" placeholder="profile picture" class="inputfile" id="inputfile" data-multiple-caption="{count} files selected">
									</div>

									<div class="form-group">
										<label class="sr-only" for="form-first-name">First name</label>
										<input type="text" name="form-first-name" placeholder="First name..." class="form-first-name form-control" id="form-first-name">
									</div>
									<div class="form-group">
										<label class="sr-only" for="form-last-name">Last name</label>
										<input type="text" name="form-last-name" placeholder="Last name..." class="form-last-name form-control" id="form-last-name">
									</div>
									<div class="form-group">
										<label class="sr-only" for="form-email">Email</label>
										<input type="text" name="form-email" placeholder="Email..." class="form-email form-control" id="form-email">
									</div>
									<div class="form-group">
										<label class="sr-only" for="form-email">Password</label>
										<input type="password" name="form-password" placeholder="Password..." class="form-email form-control" id="form-email">
									</div>
									<div class="form-group">
										<label class="sr-only" for="form-email">Birthdate</label>
										<input type="date" name="form-date" style="height: 40px; font-size:1.2rem" class="form-control" id="form-email">
									</div>
									<div class="form-group">
										<select name="form-gender">
											<option value=1>Male</option>
											<option value=2>Female</option>
										</select>
									</div>
									<div class="form-group">
										<label class="sr-only" for="form-email">Address</label>
										<input type="text" name="form-address" placeholder="Address..." class="form-email form-control" id="form-email">
									</div>
									<div class="form-group">
										<label class="sr-only" for="form-email">City</label>
										<input type="text" name="form-city" placeholder="City..." class="form-email form-control" id="form-email">
									</div>
									<div class="form-group">
										<label class="sr-only" for="form-email">State</label>
										<input type="text" name="form-state" placeholder="State..." class="form-email form-control" id="form-email">
									</div>
									<div class="form-group">
										<label class="sr-only" for="form-email">Postal</label>
										<input type="text" name="form-postal" placeholder="Postal..." class="form-email form-control" id="form-email">
									</div>
									<div class="form-group">
										<label class="sr-only" for="form-email">Phone</label>
										<input type="text" name="form-phone" placeholder="Phone..." class="form-email form-control" id="form-email">
									</div>

									<button type="submit" name="register" class="btn">Sign me up!</button>
								</form>
							</div>
						</div>

					</div>
				</div>

			</div>
		</div>

	</div>

	<!-- Footer -->

	<!-- Javascript -->
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.backstretch.min.js"></script>
	<script src="assets/js/scripts.js"></script>

	<!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

</body>

</html>