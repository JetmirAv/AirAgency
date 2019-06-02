<?php include_once("constants.php"); 
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>
<?php include_once("../global/isLogged.php") ?>
<!-- Header Area Start -->
<header class="header-area">
	<!-- Search Form -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<div class="search-form d-flex align-items-center">
		<div class="container">
			<form action="../main/components/getSearchData.php" method="get">
				<input type="search" name="search-form-input" id="searchFormInput" placeholder="Type your keyword ...">
				<button type="submit"><i class="icon_search"></i></button>
		</div>
		</form>
	</div>
	</div>

	<!-- Top Header Area Start -->
	<div class="top-header-area">
		<div class="container">
			<div class="row">

				<div class="col-6">
					<div class="top-header-content">
						<a href="#"><i class="icon_phone"></i> <span><?php echo PHONE; ?></span></a>
						<a href="#"><i class="icon_mail"></i> <span><?php echo EMAIL; ?></span></a>
					</div>
				</div>

				<div class="col-6">
					<div class="top-header-content">
						<!-- Top Social Area -->
						<div class="top-social-area ml-auto">
							<a href="<?php echo FACEBOOK; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
							<a href="<?php echo TWITTER; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
							<a href="<?php echo GOOGLE; ?>"><i class="fa fa-tripadvisor" aria-hidden="true"></i></a>
							<a href="<?php echo INSTAGRAM; ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Top Header Area End -->

	<!-- Main Header Start -->
	<div class="main-header-area">
		<div class="classy-nav-container breakpoint-off">
			<div class="container">
				<!-- Classy Menu -->
				<nav class="classy-navbar justify-content-between" id="robertoNav">

					<!-- Logo -->
					<a class="nav-brand" href="index.php"><img src="./img/core-img/logo.png" alt=""></a>

					<!-- Navbar Toggler -->
					<div class="classy-navbar-toggler">
						<span class="navbarToggler"><span></span><span></span><span></span></span>
					</div>

					<!-- Menu -->
					<div class="classy-menu">
						<!-- Menu Close Button -->
						<div class="classycloseIcon">
							<div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
						</div>
						<!-- Nav Start -->
						<div class="classynav">
							<ul id="nav">
								<li class="active"><a href="./index.php">Home</a></li>
								<li><a href="./flights.php">Flights</a></li>
								<li><a href="./about.php">About Us</a></li>
								<li><a href="./booked.php">Booked</a></li>
								<li><a href="./contact.php">Contact</a></li>
							</ul>
							<!-- Search -->
							<div class="search-btn ml-4" id="search">
								<i class="fa fa-search" aria-hidden="true"></i>
							</div>

							<!-- Book Now -->
							<div class="book-now-btn ml-3 ml-lg-5">
								<?php echo $text; ?>
							</div>

							<div class="book-now-btn ml-3 ml-lg-5">
								<?php echo $logOut; ?>
							</div>
						</div>
						<!-- Nav End -->
					</div>
				</nav>
			</div>
		</div>
	</div>
	<div id="searchData"></div>
</header>
<script>
	$(document).ready(function() {
		load_data();
		//	let query = ''

		function load_data(query) {
			$.ajax({
				url: "../main/components/getSearchData.php",
				method: "post",
				data: {
					query: query
				},
				success: function(data) {
					$('#searchData').html(data);
					//console.log(data);
				}
			});
		}

		$('#searchFormInput').keyup(function() {
			var search = $(this).val();
			//console.log(search);
			if (search != '') {
				load_data(search);
			} else {
				load_data();
			}
		});
	});

</script>
