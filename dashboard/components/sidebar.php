<?php



?>
<div class="sidebar" data-color="blue" data-image="assets/img/sidebar-5.jpg">

	<!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


	<div class="sidebar-wrapper">
		<div class="sidebar-wrapper">
			<div class="logo">
				<a href="index.php" class="simple-text">
					AirAgency
				</a>
			</div>
			<ul class="nav">
				<li id="dashboard">
					<a href="index.php">
						<i class="pe-7s-graph"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<li id="userInfo" >
					<a href="userInfo.php">
						<i class="pe-7s-user"></i>
						<p>User Profile</p>
					</a>
				</li>
				<li id="users-table">
					<a href="users-table.php">
						<i class="pe-7s-note2"></i>
						<p>Users List</p>
					</a>
				</li>
				<li id="airplane-table">
					<a href="airplane-table.php">
						<i class="pe-7s-note2"></i>
						<p>Airplanes List</p>
					</a>
				</li>
				<li id="flights">
					<a href="flights.php">
						<i class="pe-7s-note2"></i>
						<p>Flights List</p>
					</a>
				</li>
				<li id="booked">
					<a href="booked-table.php">
						<i class="pe-7s-note2"></i>
						<p>Booked</p>
					</a>
				</li>


				<li id="maps">
					<a href="maps.php">
						<i class="pe-7s-map-marker"></i>
						<p>Maps</p>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>

<script>
	console.log(window.location.pathname.split('/')[3])
	let path = window.location.pathname.split('/')[3];
	switch (path) {
		case '':
			document.getElementById("dashboard").setAttribute('class', 'active')
			break;
		case 'index.php':
			document.getElementById("dashboard").setAttribute('class', 'active')
			break;
		case 'userInfo.php':
			document.getElementById("userInfo").setAttribute('class', 'active')
			break;
		case 'users-table.php':
			document.getElementById("users-table").setAttribute('class', 'active')
			break;
		case 'airplane-table.php':
			document.getElementById("airplane-table").setAttribute('class', 'active')
			break;
		case 'flight.php':
			document.getElementById("flights").setAttribute('class', 'active')
			break;
		case 'booked-table.php':
			document.getElementById("booked").setAttribute('class', 'active')
			break;
		case 'maps.php':
			document.getElementById("maps").setAttribute('class', 'active')
			break;


	}
</script>