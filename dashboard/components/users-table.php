	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<?php include "../databaseConfig.php" ?>
	<?php
	$sql = "select id,img , concat(firstname ,'  ', lastname) as fullname,gendre,email,birthday,state,city,phoneNumber from users order by id asc  limit 10";
    $rs_result = $conn->query($sql);
	$user_id = '';
	?>
	<div class="header">
		<h4 style="display: inline-block; width: 40%" class="title">Number of users:</h4>

		<a href="user.php" style=" font: bold 11px Arial;
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
		<table class='table table-hover table-striped' style="table-layout: ;">
			<thead>
				<th width=3%>Image</th>
				<th width=5%>Name</th>
				<th width=3%>Gendre</th>
				<th width=5%>Birthday</th>
				<th width=7%>State</th>
				<th width=7%>City</th>
				<th width=5%>Phone Number</th>
				<th width='8%'>Email</th>
			</thead>
			<tbody id="load_data_table">
				<?php	

	foreach($rs_result as $row){
			echo' <tr>
					<td style="padding:2px ; padding-left:10px"><img src="assets/img/faces/face-0.jpg" width=35;height=35; style="border-radius:50% ; padding:0px;"> </td>
					<td>'.$row["id"].'</td>
					<td style="padding-left:25px;">'.$row["gendre"].'</td>
					<td>'.$row["birthday"].'</td>
					<td style="width:14% ; overflow:hidden;  position: relative;">'.$row["email"].'</td>
					<td>'.$row["state"].'</td>
					<td>'.$row["city"].'</td>
					<td>'.$row["phoneNumber"].'</td>
				</tr>';}
				
					$user_id = 11;
				?>
			</tbody>

		</table>
		<table id="first_row">
			<tr id="remove_row">
				<button type="button" name="btn_more" data-vid="<?php echo $user_id; ?>" id="btn_more" class="btn btn-success form-control">more</button>
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
					url: "components/loading-users.php",
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
