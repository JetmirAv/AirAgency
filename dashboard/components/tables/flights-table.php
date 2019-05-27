<div class="card">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<?php include "../databaseConfig.php" ?>
	<?php
	$sql = "select id,concat('../uploads/flight-img/',img)as image, fromCity,toCity,planeId,price,isSale,checkIn,createdAt,updatedAt from flight limit 10 ";
	$countRows="select count(*) as count from flight";
	$numberOfRows=$conn->query($countRows);
	$count = $numberOfRows->fetch();
	$rsResult = $conn->query($sql);
	$flightId = '';
	?>

	<div class="header">
		<h4 class="title">Number of flights:<?php echo $count['count'] ?></h4>
	</div>
	<div class="content table-responsive table-full-width">

		<table class="table table-hover table-striped">

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
					echo '<tr>
							<td style="padding:2px ; padding-left:10px"><img src='.$row["image"] .' width=35 ; height=35; style="border-radius:50% ; padding:0px;"> </td>
							<td>'.$row["fromCity"] .'</td>
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

</script>
