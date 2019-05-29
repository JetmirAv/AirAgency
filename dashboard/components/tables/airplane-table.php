<div class="card">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
		<h4 class="title">Number of airplanes:<?php echo $rowCount['total'] ?></h4>
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
				<td><button type="button"   class="btn btn-success form-control" style="background-color:dodgerblue; padding-left:3px; padding-right:3px" >Delete</button></td>
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
	$('tbody').on('click', 'tr', function(e) {
		var txt = $(this).attr('id');
		window.location.href = '../dashboard/airplaneInfo.php';
		//alert (txt);
	});
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
</script>