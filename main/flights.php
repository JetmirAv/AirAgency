<!DOCTYPE html>
<html lang="en">
	<?php include 'components/head.php'?>
<body>


    <?php
include "../databaseConfig.php";

if (isset($_GET['id'])) {
    $sql = "select c1.id as 'fromCityId',
	c2.id as 'toCityId',
	c1.name as 'From',
	c2.name as 'To',
	f.avalible as 'Available',
	f.price as 'Price',
	f.price-(isSale/100*f.price) as 'Sale Price',
	f.isSale as 'Sale',
	cast(f.checkIn as date) as 'Date',
	cast(f.checkIn as time) as 'Time',
	f.img as 'image',
	a.id as 'airplaneId',
	a.name as 'airplaneName'
	from flight as f
	inner join city as c1 on f.fromCity = c1.id
	inner join city as c2 on f.toCity = c2.id
	inner join airplane as a on f.planeId = a.id
	where f.checkIn >= curdate() and f.checkIn >= current_time() and f.id=" . $_GET['id'];

} else if (isset($_GET['pct'])) {
    $sql = "select c1.id as 'fromCityId',
            c2.id as 'toCityId',
            c1.name as 'From',
            c2.name as 'To',
            f.avalible as 'Available',
            f.price as 'Price',
            f.price-(isSale/100*f.price) as 'Sale Price',
            f.isSale as 'Sale',
            cast(f.checkIn as date) as 'Date',
            cast(f.checkIn as time) as 'Time',
            f.img as 'image',
            a.id as 'airplaneId',
            a.name as 'airplaneName'
            from flight as f
            inner join city as c1 on f.fromCity = c1.id
            inner join city as c2 on f.toCity = c2.id
            inner join airplane as a on f.planeId = a.id
            where f.checkIn >= curdate() and f.checkIn >= current_time() and f.isSale = " . $_GET['pct'] . " order by f.checkIn desc limit 10 ;";

} else if (isset($_GET['city'])) {
	echo $_GET['city'];

    $sql = "select c1.id as 'fromCityId',
            c2.id as 'toCityId',
            c1.name as 'From',
            c2.name as 'To',
            f.avalible as 'Available',
            f.price as 'Price',
            f.price-(isSale/100*f.price) as 'Sale Price',
            f.isSale as 'Sale',
            cast(f.checkIn as date) as 'Date',
            cast(f.checkIn as time) as 'Time',
            f.img as 'image',
            a.id as 'airplaneId',
            a.name as 'airplaneName'
            from flight as f
            inner join city as c1 on f.fromCity = c1.id
            inner join city as c2 on f.toCity = c2.id
            inner join airplane as a on f.planeId = a.id
            where f.checkIn >= curdate() and f.checkIn >= current_time() and c2.name = '" . $_GET['city'] . "' order by f.checkIn desc limit 10 ;";

} else {
    $sql = "select 
	            f.id as 'flightId',
	            c1.id as 'fromCityId',
				c2.id as 'toCityId',
				c1.name as 'From',
				c2.name as 'To',
				f.avalible as 'Available',
				f.price as 'Price',
				f.price-(isSale/100*f.price) as 'Sale Price',
				f.isSale as 'Sale',
				cast(f.checkIn as date) as 'Date',
				cast(f.checkIn as time) as 'Time',
				f.img as 'image',
				a.id as 'airplaneId',
				a.name as 'airplaneName'
				from flight as f
				inner join city as c1 on f.fromCity = c1.id
				inner join city as c2 on f.toCity = c2.id
				inner join airplane as a on f.planeId = a.id
				where f.checkIn >= curdate() and f.checkIn >= current_time() order by f.checkIn desc limit 10 ;";
}

//$countAllRows = "select count(*) as count from flight ";
$rsResult = $conn->query($sql);
//$rowCount = $conn->query($countAllRows);
$getFlightId = $rsResult->fetch();
?>


	<!-- Preloader -->
	<div id="preloader">
		<div class="loader"></div>
	</div>
	<!-- /Preloader -->
	<!-- Header Area Start -->
	<?php include 'components/header.php'?>
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
	<form action="#" method="POST">
		<div id="userDelete" style="
		position: fixed;
		background-color: #eee;
		display: none;
		top: 30%;
		left: 30%;
		width: 40%;
		height: 40%;
		z-index: 500;
		text-align: center">
			<h3>Book -></h3>
			<h4 style="font-weight: 300" id="user">
				</h4>
				<div style="display:flex;
					flex-direction: row;
					justify-content: space-evenly ">
					
					<button id="bttnConfirmCancel">Cancel</button>
					<button id="bttnConfirmBook" type="submit" name="deleteUser">Book</button>
				</div>
			

		</div>
	<form action="#" method="POST">
		<div id="userInfo" style="
		position: fixed;
		background-color: #eee;
		display: none;
		top: 30%;
		left: 30%;
		width: 40%;
		height: 30%;
		z-index: 500;
		text-align: center">
			<h3>Result</h3>
			<h4 style="font-weight: 300" id="userBook">
				</h4>
				<div style="display:flex;
					flex-direction: row;
					justify-content: space-evenly ">
					<button id="btnConfirmCancel">Cancel</button>
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
	<section style="position:absolute; display:block; z-index:800; width:100%; " class= "roberto-about-area section-padding-100-0">
		<!-- Flight Search Form Area -->
		<div class="hotel-search-form-area">
			<div class="container-fluid">
				<div class="hotel-search-form">
					<?php include "components/flightSearch.php"?>
				</div>
			</div>
		</div>
	</section>

	<!-- Rooms Area Start -->
			<div style="margin-top:7%;" id="flightId">
			<?php

foreach ($rsResult as $row) {
    echo '		<div  class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
				<!-- Room Thumbnail -->
				<div class="room-thumbnail">
					<img src="img/bg-img/44.jpg" alt="" style="margin-left:50px;">
				</div>
				<!-- Room Content -->
						<div class="room-content">
                            <h2>' . $row['airplaneName'] . '</h2>
                            <h4>' . $row['Price'] . '&euro;<span> /' . $row['Sale Price'] . ' with Sale</span></h4>
                            <div class="room-feature">
                                <h6>From: <span>' . $row['From'] . '</span></h6>
                                <h6>To: <span>' . $row['To'] . '</span></h6>
                                <h6>Date: <span>' . $row['Date'] . '</span></h6>
						<h6>Time: <span>' . $row['Time'] . '</span></h6>
						<h6>Avalible: <span id="ticketsAvalible">' . $row['Available'] . '</span></h6>
						<span style="display:block; width: 20px; ">
						<input min=0 max=' . $row['Available'] . ' onchange="test(this, \' ' . $row["flightId"] . '\')" type="number" class="'  . $row['flightId'] . '" />
						</span>
						
					</div>
					<div style="display:flex">
                    
					<button class="btn btn-success form-control" style="width:20%; margin-left:100px" onclick="insertHandler(\' ' . $row["From"] . '\', \' ' . $row["To"] . '\', \' ' . $row["Price"] . '\', \' ' . $row["flightId"] . '\')" >Book now</button></div>
				</div>

			</div>
                           ';}?>
                            </div>
         <button type="button" id="bttnMore" class="btn btn-success form-control" style="width:160px; margin-left:48%; margin-bottom:20px; background-color:lightblue">Show More</button>

	<!-- Rooms Area End -->


	<?php include 'components/footer.php'?>

</body>

</html>




 <script>

    $(document).ready(function() {
        let offset = 10;
        $('#bttnMore').click(() => {
            $('#bttnMore').html("Loading...");
            $.ajax({
                url: 'moreFlights.php',
                type: 'POST',
                data: {
                    offset
                },
                success: function(data) {
                    if(data != ""){
                        offset += 10;
                        $('#flightId').append(data);
                        $('#bttnMore').html("Show More");
                    } else {
                        $('#bttnMore').html("No data");
                    }
                }
            });
        });
    });

    let userInfo = document.getElementById("userDelete");
	let backdrop = document.getElementById("backdrop"); 
	let after = document.getElementById("userInfo"); 
	let  From, To , Price , flightId, quantity= '';
     let text=[]    
	 
	 function insertHandler(From, To,Price, flightId ) {
		userInfo.style.display = "block";
		backdrop.style.display = "block";
		Price = Price;
		From = From;
		To = To;
		flightId:flightId;
		window.value=flightId;
	
		 document.getElementById('user').innerHTML = " From: " + From + "   <br>   " + " To: " + To +
			"<br>"+"Price:" + Price;
	
	}
	 
	 

	 
	 
	backdrop.onclick = () => {
		userInfo.style.display = "none";
		backdrop.style.display = "none";
	}
 
	function test(e, id){
		console.log(e.value + " " + id);
		text[id] = e.value;
		console.log(text);
	}

	document.getElementById("bttnConfirmBook").onclick = (e) => {
		e.preventDefault();
		
		if (window.value in text){
			var quantity= text[window.value];
		}
		else{
			quantity=0;
		}
		
				$.ajax({
					url: "../dashboard/components/insert/insertIntoBookingTable.php",
					method: "POST",
					data: {
						flightId: window.value,
     	                quantity:quantity
					},
					dataType: "text",
					success: function(data) {
						console.log(data);
						//$("#" + window.value ).html(data);
						userInfo.style.display = "none";
						//backdrop.style.display = "none";
						after.style.display="block"
				        document.getElementById('userBook').innerHTML =  data ;  	
				   //document.getElementById('bttnConfirmBook').style.display = "none";  	

               

    		}




					});





	}

	document.getElementById("bttnConfirmCancel").onclick = (e) => {
		e.preventDefault();
		userInfo.style.display = "none";
		backdrop.style.display = "none";
	}
	document.getElementById("btnConfirmCancel").onclick = (e) => {
		e.preventDefault();
		after.style.display = "none";
		backdrop.style.display = "none";
	}

</script>

