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
    
    
    <div id="backdrop" style="
		position: fixed;
		display: none;
		background-color: rgba(0, 0, 0, 0.5);
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		z-index: 300"></div>
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
			<h3>Delete Airplane</h3>
			<h4 style="font-weight: 300" id="user">
				</h4>
				<div style="display:flex;
					flex-direction: row;
					justify-content: space-evenly ">
					<button id="bttnConfirmCancel">Cancel</button>
					<button id="bttnConfirmDelete" type="submit" name="deleteUser">Delete</button>
				</div>
		</div>
	
    
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
		<h4 style="display: inline-block; width: 40%"class="title">Number of airplanes:<?php echo $rowCount['total'] ?></h4>

		<a href="userInsert.php" style=" font: bold 11px Arial;
												text-decoration: none;
												background-color: #EEEEEE;
												color: #333333;
												padding: 2px 6px 2px 6px;
												border-top: 1px solid #CCCCCC;
												border-right: 1px solid #333333;
												border-bottom: 1px solid #333333;
												border-left: 1px solid #CCCCCC;
												height:30px">Create User</a>
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
					echo ' <tr id=' . $row['id'] . '>
				<td style="padding:2px ; padding-left:10px"><img src="' . $row["image"] . '" width=35; height=35; style="border-radius:50% ; padding:0px;"> </td></td>
				<td>' . $row["name"] . '</td>
				<td style="padding-left:25px;">' . $row["seats"] . '</td>
				<td style="padding-left:40px">' . $row["yearOfProd"] . '</td>
				<td>' . $row["fuelCapacity"] . '</td>
				<td>' . $row["maxspeed"] . '</td>
				<td>' . $row["createdAt"] . '</td>
				<td>' . $row["updatedAt"] . '</td>
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
//	$('tbody').on('click', 'tr', function(e) {
//		var txt = $(this).attr('id');
//		window.location.href = '../dashboard/airplaneInfo.php';
//		//alert (txt);
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
    
    
    
    
    let userInfo = document.getElementById("userDelete");
		let backdrop = document.getElementById("backdrop");
		let userId, airplaneName = '';

		function deleteHandler(id, name, email) {
			userInfo.style.display = "block";
			backdrop.style.display = "block";
			userId = id;
			airplaneName = name;
			console.log("ID: " + id + " Name: " + name + " Email: " + email);
			document.getElementById('user').innerHTML = "ID: " + id + "<br/>" +
				" Name: " + name;

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

		document.getElementById("bttnConfirmDelete").onclick = (e) => {
			
			$.ajax({
				url: "components/airplane/deleteAirplaneQuery.php",
				type: "POST",
				data: {
					"id": userId
				}
			}).done(function(data) {
				location.reload();
			});
		}
</script>