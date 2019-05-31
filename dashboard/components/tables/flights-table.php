<div class="card">

	<?php include "../databaseConfig.php" ?>
	<?php
	$sql = "select id ,concat('../uploads/flight-img/',img)as image, fromCity,toCity,planeId,price,isSale,checkIn,createdAt,updatedAt from flight limit 10 ";
	$countRows = "select count(*) as count from flight";
	$numberOfRows = $conn->query($countRows);
	$count = $numberOfRows->fetch();
	$rsResult = $conn->query($sql);
	$flightId = '';
	?>

	<div class="header">
	
	<div id="backdrop" style="
		position: fixed;
		display: none;
		background-color: rgba(0, 0, 0, 0.5);
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		z-index: 300"></div>
		<div id="flightInfo" style="
		position: fixed;
		background-color: #eee;
		display: none;
		top: 30%;
		left: 30%;
		width: 40%;
		height: 25%;
		z-index: 500;
		text-align: center">
			<h3>Delete Flight</h3>
			<h4 style="font-weight: 300" id="flight">
				</h4>
				<div style="display:flex;
					flex-direction: row;
					justify-content: space-evenly ">
					<button id="bttnConfirmCancel">Cancel</button>
					<button id="bttnConfirmDelete" type="submit" name="deleteUser">Delete</button>
				</div>
		</div>
	
		
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
		<a href="flightsInsert.php" style=" font: bold 11px Arial;
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
					echo '<tr >
							<td onclick="getFlightHandler(10)" style="padding:2px ; padding-left:10px"><img src=' . $row["image"] . ' width=35 ; height=35; style="border-radius:50% ; padding:0px;"> </td>
							
							<td onclick="getFlightHandler(\'' . $row['id'] .  '\')">' . $row["fromCity"] . '</td>
							<td onclick="getFlightHandler(\'' . $row['id'] . ' \')">' . $row["toCity"] . '</td>
							<td onclick="getFlightHandler(\'' . $row['id'] . ' \')" style="padding-left:25px;">' . $row["planeId"] . '</td>
							<td onclick="getFlightHandler(\'' . $row['id'] . ' \')">' . $row["price"] . '</td>
							<td onclick="getFlightHandler(\'' . $row['id'] . ' \')">' . $row["isSale"] . '</td>
							<td onclick="getFlightHandler(\'' . $row['id'] . ' \')">' . $row["checkIn"] . '</td>
							<td onclick="getFlightHandler(\'' . $row['id'] . ' \')">' . $row["createdAt"] . '</td>
							<td onclick="getFlightHandler(\'' . $row['id'] . ' \')">' . $row["updatedAt"] . '</td>
							<td><button type="button" id="bttnDelete" onclick="deleteHandler(\' ' . $row["id"] . '\')" class="btn btn-success form-control" style="width:85%; background-color:dodgerblue; margin-left:10px;  padding-right:12px" on >Delete</button></td>

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
    
    
	function getFlightHandler(id){
		window.location.href = '../dashboard/flightsInfo.php?id='+id;
	}
        
    
      let flightInfo = document.getElementById("flightInfo");
		let backdrop = document.getElementById("backdrop");
		let flightId = '';

		function deleteHandler(id) {
         //console.log("Bravo")
			flightInfo.style.display = "block";
			backdrop.style.display = "block";
			flightId = id;
			console.log("ID: " + id);
			document.getElementById('flight').innerHTML = "Are you sure you want to delete flight with ID: " + id;
				
		}

		backdrop.onclick = () => {
			flightInfo.style.display = "none";
			backdrop.style.display = "none";
		}


		document.getElementById("bttnConfirmCancel").onclick = (e) => {
			e.preventDefault();
			flightInfo.style.display = "none";
			backdrop.style.display = "none";
		}

		document.getElementById("bttnConfirmDelete").onclick = (e) => {
			$.ajax({
			url: "components/flights/deleteFlightQuery.php",
			type: "POST",
			data:{"id":flightId}
			}).done(function(data) {
				location.reload();
			});
		}
    
    
    
    
    
    
</script>