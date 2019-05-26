<div class="card">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<?php include "../databaseConfig.php" ?>
	<?php
	$sql = "select id, fromCity,toCity,planeId,price,isSale,checkIn,createdAt,updatedAt from flight ORDER BY id asc limit 10 ";
	$rs_result = $conn->query($sql);
	$flight_id = '';
	?>

	<div class="header">
		<h4 class="title">Number of flights:<?php echo $flight_id ?></h4>
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
			<tbody id="load_data_table">
				<?php
				foreach ($rs_result as $row) {
					echo '<tr>
							<td style="padding:2px ; padding-left:10px"><img src="assets/img/faces/face-0.jpg" width=35;height=35; style="border-radius:50% ; padding:0px;"> </td>
							<td>'.$row["fromCity"] .'</td>
							<td>' . $row["toCity"] . '</td>
							<td style="padding-left:25px;">' . $row["planeId"] . '</td>
							<td>' . $row["price"] . '</td>
							<td>' . $row["isSale"] . '</td>
							<td>' . $row["checkIn"] . '</td>
							<td>' . $row["createdAt"] . '</td>
							<td>' . $row["updatedAt"] . '</td>
						  </tr>';
				}
					$flight_id = $row["id"];
				?>
			</tbody>

		</table>
		<table id="first_row">
			<tr id="remove_row">
				<button type="button" name="btn_more" data-vid="<?php echo $flight_id; ?>" id="btn_more" class="btn btn-success form-control">more</button>
			</tr>
		</table>
	</div>
</div>


<script>
	$(document).ready(function() {
		$(document).on('click', '#btn_more', function() {
			var last_flight_id = $(this).data("vid");
			$('#btn_more').html("Loading...");
			$.ajax({
				url: "components/loading-flights.php",
				method: "POST",
				data: {
					last_flight_id: last_flight_id
				},
				dataType: "html",
				success: function(data) {
					if (data != '') {
						$('#btn_more').remove();
						$('#remove_row').remove();
						$('#load_data_table').append(data);

					} else {
						$('#btn_more').html("No Data");
					}
				}
			});
		});
	});

</script>
