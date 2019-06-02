<!DOCTYPE html>
<html lang="en">

<!doc <head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/form-elements.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="shortcut icon" href="assets/ico/favicon.png">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

	</head>
	<?php include "components/head.php"; ?>

	<body>
		<?php include "components/header.php"; ?>

		<!-- Top content -->
		<div class="top-content">

			<div class="inner-bg">
				<div class="container">
					<div class="row">
						<div style="margin-left:30%;" class="col-sm-5">

							<div style="width:100%;" class="form-box">
								<div class="form-top">
									<div class="form-top-left">
										<h3>reset Password</h3>
										<p>Enter email to contionu:</p>
										<?php
										if (isset($_SESSION['error'])) {
											foreach ($_SESSION['error'] as $logInError) {
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
											<label class="sr-only" for="form-username">Email</label>
											<input type="text" name="form-email" placeholder="Username..." class="form-username form-control" id="form-username">
										</div>
										<!-- <div class="form-group">
											<label class="sr-only" for="form-password">Password</label>
											<input type="password" name="form-password" placeholder="Password..." class="form-password form-control" id="form-password">
										</div> -->
										<button type="submit" name="forgotPassword" class="btn">Reset password</button>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>

			</div>
		</div>

		</div>

		<?php

		session_unset();
		?>

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