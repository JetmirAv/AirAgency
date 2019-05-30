<!DOCTYPE html>
<html lang="en">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<?php include 'components/head.php' ?>
  
<body>


    <?php
    include "../databaseConfig.php";
    $sql = "select c1.id as 'fromCityId',
            c2.id as 'toCityId',
            c1.name as 'From',
            c2.name as 'To',
            f.avalible as 'Available',
            f.price as 'Price',
            f.price * isSale/100 as 'Sale',
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

    //$countAllRows = "select count(*) as count from flight ";
    $rsResult = $conn->query($sql);
    //$rowCount = $conn->query($countAllRows);
    //$Count = $rowCount->fetch();
    ?>	


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
				</h4>
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
			<div id="flightId">
			<?php
    
          foreach($rsResult as $row){
echo	'		<div  class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
				<!-- Room Thumbnail -->
				<div class="room-thumbnail">
					<img src="img/bg-img/44.jpg" alt="" style="margin-left:50px;">
				</div>
				<!-- Room Content -->
						<div class="room-content">
                            <h2>'.$row['airplaneName'].'</h2>
                            <h4>'.$row['Price'].'&euro;<span> /'.$row['Sale'].' with Sale</span></h4>
                            <div class="room-feature">
                                <h6>From: <span>'.$row['From'].'</span></h6>
                                <h6>To: <span>'.$row['To'].'</span></h6>
                                <h6>Date: <span>'.$row['Date'].'</span></h6>
						<h6>Time: <span>'.$row['Time'].'</span></h6>
						<h6>Avalible: <span id="ticketsAvalible">'.$row['Available'].'</span></h6>
						<span style="display:block; width: 20px; "><input min=0 max="100" type="number" id="quantityValue"/></span>
					</div>
					<a href="#" class="btn view-detail-btn">View Details <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
				</div>
			</div>
                            ';}?>
                            </div>
         <button type="button" id="bttnMore" class="btn btn-success form-control" style="width:160px; margin-left:48%; margin-bottom:20px; background-color:lightblue">Show More</button>

	<!-- Rooms Area End -->


	<?php include 'components/footer.php' ?>

</body>

</html>
 <?php $userConectedId = $dataArr->id; ?>
 
 
 
 
 <script>

    $(document).ready(function() {
        let offset = 10;
        $('#bttnMore').click(() => {
            $('#bttnMore').html("Loading...");
            $.ajax({
                url: 'moreFlights.php',
                type: 'POST',
                data: {
                    offset: offset
                },
                success: function(data) {
                    if(data != ""){
                        offset += 10;
                        $('#flightId').append(data);
                        $('#bttnMore').html("Show More");
                    } else {
                        $('#bttnMore').html("No  data");
                    }
                }
            });
        });
    });


</script>
 
 
 
 
 
 
 
 
 
 
 
 
 

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

