<div class="card">



	<?php include "../databaseConfig.php" ?>
	<?php

	$sql = "select id,concat('../uploads/airplane-img/',img) as image,name, seats, yearOfProd,fuelCapacity,maxspeed,createdAt,updatedAt from airplane order by id asc limit 10";
	$countAllRows = "select count(*) as count from airplane ";
	$rsResult = $conn->query($sql);
	$flight_id = '';
	$sqlCount = "SELECT COUNT(id) AS total FROM airplane";
	$result = $conn->query($sqlCount);
	$rowCount = $result->fetch();
	$airplaneId = '';
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
		<div id="airplaneInfo" style="
		position: fixed;
		background-color: #eee;
		display: none;
		top: 30%;
		left: 30%;
		width: 40%;
		height: 25%;
		z-index: 500;
		text-align: center">
			<h3>Delete Airplane</h3>
			<h4 style="font-weight: 300" id="airplane">
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
		<h4 style="display: inline-block; width: 40%"class="title">Number of airplanes:<?php echo $rowCount['total'] ?></h4>

<!--
		<a href="airplaneInser.php" style=" font: bold 11px Arial;
												text-decoration: none;
												background-color: #EEEEEE;
												color: #333333;
												padding: 2px 6px 2px 6px;
												border-top: 1px solid #CCCCCC;
												border-right: 1px solid #333333;
												border-bottom: 1px solid #333333;
												border-left: 1px solid #CCCCCC;
												height:30px">Create  Airplane</a>
-->

        <a href="airplaneInser.php" style=" background-color: #eee;
                                            top: 30%;
                                            left: 30%;
                                            width: 40%;
                                            height: 25%;
                                            text-align: center" >Create Airplane</a>
	</div>

	<div class="content table-responsive table-full-width">
		<table class="table table-hover table-striped">
			<thead>
				<th>Image</th>
				<th>Name</th>
				<th>Seats </th>
				<th>Year of produced </th>
				<th>Fuel Capacity </th>
				<th>Max Speed</th>
				<th>Created at </th>
				<th>Updated at </th>
			</thead>
			<tbody id="loadDataTable">

				<?php
				foreach ($rsResult as $row) {
					echo ' <tr >
				<td onclick="getAirplaneHandler(\'' . $row['id'] . ' \')" style="padding:2px ; padding-left:10px" ><img src="' . $row["image"] . '" width=35; height=35; style="border-radius:50% ; padding:0px;"> </td>
				<td onclick="getAirplaneHandler(\'' . $row['id'] . ' \')">' . $row["name"] . '</td>
				<td onclick="getAirplaneHandler(\'' . $row['id'] . ' \')" style="padding-left:25px;">' . $row["seats"] . '</td>
				<td onclick="getAirplaneHandler(\'' . $row['id'] . ' \')" style="padding-left:40px">' . $row["yearOfProd"] . '</td>
				<td onclick="getAirplaneHandler(\'' . $row['id'] . ' \')">' . $row["fuelCapacity"] . '</td>
				<td onclick="getAirplaneHandler(\'' . $row['id'] . ' \')">' . $row["maxspeed"] . '</td>
				<td onclick="getAirplaneHandler(\'' . $row['id'] . ' \')">' . $row["createdAt"] . '</td>
				<td onclick="getAirplaneHandler(\'' . $row['id'] . ' \')">' . $row["updatedAt"] . '</td>
				<td><button type="button" id="bttnDelete" onclick="deleteHandler(\' ' . $row["id"] . '\', \' ' . $row["name"] .  '\')" class="btn btn-success form-control" style="width:85%; background-color:dodgerblue; margin-left:10px;  padding-right:12px" on >Delete</button></td>

			</tr>';
				}
				$airplaneId = 10;
				?>
			</tbody>

		</table>
		<table id="firstRow">
			<tr id="removeRow">
				<button type="button" name="btnMore" data-vid="<?php echo $airplaneId; ?>" id="btnMore" class="btn btn-success form-control" style="background-color:dodgerblue;">more</button>
			</tr>
		</table>
	</div>
</div>


<script>
//	$('tr').on('click', 'span', function(e) {
//		var txt = $(this).attr('id');
//		window.location.href = '../dashboard/airplaneInfo.php?id='+txt;
//		//alert (txt);
//        // header( "Location: temp.php? user = $user" );
//	});
	$(document).ready(function() {
		$(document).on('click', '#btnMore', function() {
			var lastFlightId = $(this).data("vid");
			$('#btnMore').html("Loading...");
			$.ajax({
				url: "components/tables/loading-airplanes.php",
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
    
	
	
	function getAirplaneHandler(id){
		window.location.href = '../dashboard/airplaneInfo.php?id='+id;
	}
    
    
        let airplaneInfo = document.getElementById("airplaneInfo");
		let backdrop = document.getElementById("backdrop");
		let airplaneId, airplaneName = '';

		function deleteHandler(id, name, email) {
			airplaneInfo.style.display = "block";
			backdrop.style.display = "block";
			airplaneId = id;
			airplaneName = name;
			console.log("ID: " + id + " Name: " + name);
			document.getElementById('airplane').innerHTML = "ID: " + id + "<br/>" +
				" Name: " + name;

		}

		backdrop.onclick = () => {
			airplaneInfo.style.display = "none";
			backdrop.style.display = "none";
		}


		document.getElementById("bttnConfirmCancel").onclick = (e) => {
			e.preventDefault();
			airplaneInfo.style.display = "none";
			backdrop.style.display = "none";
		}

		document.getElementById("bttnConfirmDelete").onclick = (e) => {
			
			$.ajax({
				url: "components/airplane/deleteAirplaneQuery.php",
				type: "POST",
				data: {
					"id": airplaneId
				}
			}).done(function(data) {
				location.reload();
			});
		}
</script>