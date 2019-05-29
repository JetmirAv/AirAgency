<div class="card">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<?php include "../databaseConfig.php" ?>
	<?php
	$sql = "select id,concat('../uploads/flight-img/',img)as image, fromCity,toCity,planeId,price,isSale,checkIn,createdAt,updatedAt from flight limit 10 ";
	$countRows = "select count(*) as count from flight";
	$numberOfRows = $conn->query($countRows);
	$count = $numberOfRows->fetch();
	$rsResult = $conn->query($sql);
	$flightId = '';
	?>

	<div class="header">
	
		
		<h4 style="color:orange">
			<?php
			if (isset($_SESSION['result'])) {
				foreach ($_SESSION['result'] as $res) {
					echo $res . " ";
				};
			}

			if (isset($_SESSION['deleteSucess'])) {
				echo $_SESSION['deleteSucess'];
			}
			if (isset($_SESSION['deleteError'])) {
				echo $_SESSION['deleteError'];
			}
			?>
		</h4>
    	<h4 style="display: inline-block; width: 40%" class="title">Number of flights:<?php echo $count['count'] ?></h4>
		<a href="userInsert.php" style=" font: bold 11px Arial;
												text-decoration: none;
												background-color: #EEEEEE;
												color: #333333;
												padding: 2px 6px 2px 6px;
												border-top: 1px solid #CCCCCC;
												border-right: 1px solid #333333;
												border-bottom: 1px solid #333333;
												border-left: 1px solid #CCCCCC;
												height:30px">Create Flight</a>
	
		
		
		
	</div>
	<div class="content table-responsive table-full-width">

		<table class="table table-hover table-striped" id="sourceTable">

			<thead>
				<th>Image</th>
				<th>From city </th>
				<th>To city </th>
				<th>Plane id </th>
				<th>Price</th>
				<th>Is sale</th>
				<th>Check in</th>
				<th>Created at</th>
				<th>Updated at</th>
			</thead>
			<tbody id="loadDataTable">
				<?php
				foreach ($rsResult as $row) {
					echo '<tr id=' . $row['id'] . '>
							<td style="padding:2px ; padding-left:10px"><img src=' . $row["image"] . ' width=35 ; height=35; style="border-radius:50% ; padding:0px;"> </td>
							<td>' . $row["fromCity"] . '</td>
							<td>' . $row["toCity"] . '</td>
							<td style="padding-left:25px;">' . $row["planeId"] . '</td>
							<td>' . $row["price"] . '</td>
							<td>' . $row["isSale"] . '</td>
							<td>' . $row["checkIn"] . '</td>
							<td>' . $row["createdAt"] . '</td>
							<td>' . $row["updatedAt"] . '</td>
							<td><button type="button"   class="btn btn-success form-control" style="background-color:dodgerblue; padding-left:3px; padding-right:3px" >Delete</button></td>
						  </tr>';
				}
				$flightId = $row["id"];
				?>
			</tbody>

		</table>
		<table id="firstRow">
			<tr id="removeRow">
				<button type="button" name="btnMore" data-vid="<?php echo $flightId; ?>" id="btnMore" class="btn btn-success form-control" style="background-color:dodgerblue;">more</button>
			</tr>
		</table>

	</div>
</div>


<script>
	$(document).ready(function() {
		var pickedup;


//		$('tbody').on('click', 'tr', function(e) {
//			var txt = $(this).attr('id');
//			window.location.href = '../dashboard/flightsInfo.php';
//			//alert (txt);
//		});

		$(document).on('click', '#btnMore', function() {
			var lastFlightId = $(this).data("vid");
			$('#btnMore').html("Loading...");
			$.ajax({
				url: "components/tables/loading-flights.php",
				method: "POST",
				data: {
					lastFlightId: lastFlightId
				},
				dataType: "html",
				success: function(data) {
					if (data != '') {
						$('#btnMore').remove();
						$('#removeRow').remove();
						$('#loadDataTable').append(data);

					} else {
						$('#btnMore').html("No Data");
					}
				}
			});
		});
	});
    
    
    
    
    let flightInfo = document.getElementById("flightInfo");
		let backdrop = document.getElementById("backdrop");
		let flightId, origin, destination = '';

		function deleteHandler(id, name, email) {
			flightInfo.style.display = "block";
			backdrop.style.display = "block";
			flightId = id;
			origin = fromCity;
			destination = toCity;
			console.log("ID: " + id + " FromCity: " + fromCity + " toCity: " + toCity);
			document.getElementById('flight').innerHTML = "ID: " + id + "<br/>" +
				" OriginId: " + fromCity + "<br/>" +
				" DestinationId: " + email;
				
		}

		backdrop.onclick = () => {
			flightInfo.style.display = "none";
			backdrop.style.display = "none";
		}


		document.getElementById("bttnCancel").onclick = (e) => {
			e.preventDefault();
			flightInfo.style.display = "none";
			backdrop.style.display = "none";
		}

		document.getElementById("bttnDelete").onclick = (e) => {
			e.preventDefault();
			$.ajax({
			url: "components/flights/deleteFlightQuery.php",
			type: "POST",
			data:{"id":flightId}
			}).done(function(data) {
				location.reload();
			});
		}
    
    
    
    
    
    
</script>