<div class="card">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<?php include "../databaseConfig.php" ?>
	<?php
	
$sql = "select id,concat('assets/img/airplanes/',img) as image,name, seats, yearOfProd,fuelCapacity,maxspeed,createdAt,updatedAt from airplane order by id asc limit 10";
$count_all_rows = "select count(*) as count from airplane "	;
$rs_result = $conn->query($sql);
	$flight_id = '';		
$sql_count = "SELECT COUNT(id) AS total FROM airplane";
		$result = $conn->query($sql_count);
		$row_count = $result->fetch();
	$airplane_id = '';
	?>

	<div class="header">
		<h4 class="title">Number of airplanes:<?php echo $row_count['total'] ?></h4>
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
			<tbody id="load_data_table">

				<?php
	foreach($rs_result as $row){
			echo' <tr>
				<td style="padding:2px ; padding-left:10px"><img src="'.$row["image"].'" width=35; height=35; style="border-radius:50% ; padding:0px;"> </td></td>
				<td>'.$row["name"].'</td>
				<td style="padding-left:25px;">'.$row["seats"].'</td>
				<td style="padding-left:40px">'.$row["yearOfProd"].'</td>
				<td>'.$row["fuelCapacity"].'</td>
				<td>'.$row["maxspeed"].'</td>
				<td>'.$row["createdAt"].'</td>
				<th>'.$row["updatedAt"].'</th>
			</tr>';
				}
					$airplane_id = 10;
				?>
			</tbody>

		</table>
		<table id="first_row">
			<tr id="remove_row">
				<button type="button" name="btn_more" data-vid="<?php echo $airplane_id; ?>" id="btn_more" class="btn btn-success form-control">more</button>
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
				url: "components/loading-airplanes.php",
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
