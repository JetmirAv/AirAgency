<!DOCTYPE html>
<html lang="en">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<?php include 'components/head.php' ?>
  
<body>
	<!-- Preloader -->
	<div id="preloader">
		<div class="loader"></div>
	</div>
	<!-- /Preloader -->
	<!-- Header Area Start -->
	<?php include 'components/header.php' ?>
	<!-- Header Area End -->
	<div id="backdrop" style="
		position: fixed;
		display: none;
		background-color: rgba(0, 0, 0, 0.5);
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		z-index: 300"></div>
	<form action="components/delete/deleteUser.php" method="POST">
		<div id="userDelete" style="
		position: fixed;
		background-color: #eee;
		display: none;
		top: 30%;
		left: 30%;
		width: 40%;
		height: 25%;
		z-index: 500;
		text-align: center">
			<h3>Book -></h3>
			<h4 style="font-weight: 300" id="user">
				</h5>
				<div style="display:flex;
					flex-direction: row;
					justify-content: space-evenly ">
					<button id="bttnConfirmCancel">Cancel</button>
					<button id="bttnConfirmBook" type="submit" name="deleteUser">book</button>
				</div>
		</div>
	</form>
	<!-- Breadcrumb Area Start -->
	<div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(img/bg-img/16.jpg);">
		<div class="container h-100">
			<div class="row h-100 align-items-center">
				<div class="col-12">
					<div class="breadcrumb-content text-center">
						<h2 class="page-title">Flights</h2>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb justify-content-center">
								<li class="breadcrumb-item"><a href="index.php">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Flights</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcrumb Area End -->
	<section class="roberto-about-area section-padding-100-0">
		<!-- Flight Search Form Area -->
		<div class="hotel-search-form-area">
			<div class="container-fluid">
				<div class="hotel-search-form">
					<?php include "components/flightSearch.php" ?>
				</div>
			</div>
		</div>
	</section>
	<!-- Rooms Area Start -->
	<div class="roberto-rooms-area section-padding-100-0">
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-10">
					<!-- Single Room Area -->
					<div class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
						<!-- Room Thumbnail -->
						<div class="room-thumbnail">
							<img src="img/bg-img/43.jpg" alt="">
						</div>
						<!-- Room Content -->
						<?php
	
	echo'					<div class="room-content">
                            <h2>Title</h2>
                            <h4>400&euro;</h4>
                            <div class="room-feature">
                                <h6>From: <span>Prishtina</span></h6>
                                <h6>To: <span>Spain</span></h6>
                                <h6>Date: <span><?php echo date("Y-m-d"); ?></span></h6>
						<h6>Time: <span><?php echo date("H-m"); ?></span></h6>
						<h6>Avalible: <span>100</span></h6>
						<span style="display:block; width: 20px; "><input min=0 type="number" id="quantityValue"/></span>
					</div>
					'?>
					<button type="button" id="btnInsert" onclick=deleteHandler('Prishtine','Wiene',255) class="btn btn-success form-control" style="width:85%; background-color:dodgerblue; margin-left:10px; padding-right:12px" on>Book now</button>
						<p style="color:green; padding-left:20px;" id="insertMessage">
<!--
						<?php
//							if (isset($_SESSION['InsertSucess'] )) {
//							echo $_SESSION['InsertSucess'];  
								//isset($_SESSION['InsertSucess']);
//							}  
//							if (isset($_SESSION['insertQuantityError'] )) {
//							echo $_SESSION['insertQuantityError'] ;  
//							}  
//							if (isset($_SESSION['insertCardError'] )) {
							
//							echo $_SESSION['insertCardError'];   
							
//							}  
							
							?>
-->

						</p>
				</div>
			</div>

			<!-- Single Room Area -->
			<div class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
				<!-- Room Thumbnail -->
				<div class="room-thumbnail">
					<img src="img/bg-img/44.jpg" alt="">
				</div>
				<!-- Room Content -->
				<div class="room-content">
					<h2>Destination</h2>
					<h4>400$ <span>/ Day</span></h4>
					<div class="room-feature">
						<h6>From: <span>Prishtina</span></h6>
						<h6>Avalible: <span>100</span></h6>
						<h6>Date: <span><?php echo date("Y-m-d"); ?></span></h6>
						<h6>Time: <span><?php echo date("H-m"); ?></span></h6>
					</div>
					<a href="#" class="btn view-detail-btn">View Details <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
				</div>
			</div>
			<!-- Single Room Area -->
			<div class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
				<!-- Room Thumbnail -->
				<div class="room-thumbnail">
					<img src="img/bg-img/45.jpg" alt="">
				</div>
				<!-- Room Content -->
				<div class="room-content">
					<h2>Destination</h2>
					<h4>400$ <span>/ Day</span></h4>
					<div class="room-feature">
						<h6>From: <span>Prishtina</span></h6>
						<h6>Avalible: <span>100</span></h6>
						<h6>Date: <span><?php echo date("Y-m-d"); ?></span></h6>
						<h6>Time: <span><?php echo date("H-m"); ?></span></h6>
					</div>
					<a href="#" class="btn view-detail-btn">View Details <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
				</div>
			</div>
			<!-- Single Room Area -->
			<div class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
				<!-- Room Thumbnail -->
				<div class="room-thumbnail">
					<img src="img/bg-img/46.jpg" alt="">
				</div>
				<!-- Room Content -->
				<div class="room-content">
					<h2>Destination</h2>
					<h4>400$ <span>/ Day</span></h4>
					<div class="room-feature">
						<h6>From: <span>Prishtina</span></h6>
						<h6>Avalible: <span>100</span></h6>
						<h6>Date: <span><?php echo date("Y-m-d"); ?></span></h6>
						<h6>Time: <span><?php echo date("H-m"); ?></span></h6>
					</div>
					<a href="#" class="btn view-detail-btn">View Details <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
				</div>
			</div>
			<!-- Single Room Area -->
			<div class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
				<!-- Room Thumbnail -->
				<div class="room-thumbnail">
					<img src="img/bg-img/47.jpg" alt="">
				</div>
				<!-- Room Content -->
				<div class="room-content">
					<h2>Destination</h2>
					<h4>400$ <span>/ Day</span></h4>
					<div class="room-feature">
						<h6>From: <span>Prishtina</span></h6>
						<h6>Avalible: <span>100</span></h6>
						<h6>Date: <span><?php echo date("Y-m-d"); ?></span></h6>
						<h6>Time: <span><?php echo date("H-m"); ?></span></h6>
					</div>
					<a href="#" class="btn view-detail-btn">View Details <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
				</div>
			</div>
			<!-- Single Room Area -->
			<div class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
				<!-- Room Thumbnail -->
				<div class="room-thumbnail">
					<img src="img/bg-img/48.jpg" alt="">
				</div>
				<!-- Room Content -->
				<div class="room-content">
					<h2>Destination</h2>
					<h4>400$ <span>/ Day</span></h4>
					<div class="room-feature">
						<h6>From: <span>Prishtina</span></h6>
						<h6>Avalible: <span>100</span></h6>
						<h6>Date: <span><?php echo date("Y-m-d"); ?></span></h6>
						<h6>Time: <span><?php echo date("H-m"); ?></span></h6>
					</div>
					<a href="#" class="btn view-detail-btn">View Details <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
				</div>
			</div>


			<!-- Pagination -->
			<nav class="roberto-pagination wow fadeInUp mb-100" data-wow-delay="1000ms">
				<ul class="pagination">
					<li class="page-item"><a class="page-link" href="#">1</a></li>
					<li class="page-item"><a class="page-link" href="#">2</a></li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<li class="page-item"><a class="page-link" href="#">Next <i class="fa fa-angle-right"></i></a></li>
				</ul>
			</nav>
		</div>
	</div>
	</div>
	</div>
	<!-- Rooms Area End -->


	<?php include 'components/footer.php' ?>

</body>

</html>
 <?php $userConectedId = $dataArr->id; ?>

<script>
    	let userInfo = document.getElementById("userDelete");
	let backdrop = document.getElementById("backdrop");
	let  From, To , Price= '';
	
	
	function deleteHandler(From, To,Price) {
		userInfo.style.display = "block";
		backdrop.style.display = "block";
		Price = Price;
		From = From;
		To = To;
		//console.log("ID: " + id + " Name: " + From + " Email: " + To);
		document.getElementById('user').innerHTML = " From: " + From + "   <br>   " + " To: " + To +
			"<br>"+"Price:" + Price;

		//alert(quantity);
	
	}

	backdrop.onclick = () => {
		userInfo.style.display = "none";
		backdrop.style.display = "none";
	}


	document.getElementById("bttnConfirmCancel").onclick = (e) => {
		e.preventDefault();
		userInfo.style.display = "none";
		backdrop.style.display = "none";
	}
	document.getElementById("bttnConfirmBook").onclick = (e) => {
		e.preventDefault();
    	var userConectedId="<?php echo $userConectedId;?>";
		var quantity = document.getElementById("quantityValue").value;
		    var flightId=88;

				$.ajax({
					url: "../dashboard/components/insert/insertIntoBookingTable.php",
					method: "POST",
					data: {
						flightId: flightId,
				        userConectedId: userConectedId,
     	                quantity:quantity
					},
					dataType: "text",
					success: function(data) {
						$('#insertMessage').html(data);
									userInfo.style.display = "none";
									backdrop.style.display = "none";
						
						
							}
						
						 
					
						
					});
				
		
	


	}

</script>
