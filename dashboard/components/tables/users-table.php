	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<?php include "../databaseConfig.php" ?>
	<?php
	$sql = "select id,img , concat(firstname ,'  ', lastname) as fullname,gendre,email,birthday,state,city,phoneNumber from users order by id asc  limit 10";
	$rsResult = $conn->query($sql);
	$userId = '';

	$countRows = "select count(*) as count from users where roleId=2";
	$numberOfRows = $conn->query($countRows);
	$count = $numberOfRows->fetch();

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
	<form action="components/delete/deleteUser.php" method="POST">
		<div id="userInfo" style="
		position: absolute;
		background-color: #eee;
		display: none;
		top: 30%;
		left: 30%;
		width: 40%;
		height: 25%;
		z-index: 500;
		text-align: center">
			<h3>Delete User</h3>
			<h4 style="font-weight: 300" id="user">
				</h5>
				<div style="display:flex;
					flex-direction: row;
					justify-content: space-evenly ">
					<button id="bttnCancel">Cancel</button>
					<button id="bttnDelete" type="submit" name="deleteUser">Delete</button>
				</div>
		</div>
	</form>
	<div class="header">
		<h4 style="display: inline-block; width: 40%" class="title">Number of users:<?php echo $count['count']?></h4>

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
		<table class='table table-hover table-striped' style="table-layout:fixed;"  width='100%'>
			<thead>
				<th width=5%>Image</th>
				<th width=13%>Name</th>
				<th width=8%>Gendre</th>
				<th width=8%>Birthday</th>
				<th width=20%>Email</th>
				<th width=12%>State</th>
				<th width=13.5%>City</th>
				<th width=11%>Phone Number</th>
				<th width=10%></th>
			</thead>
			<tbody id="loadDataTable">
				<?php

				foreach ($rsResult as $row) {
					echo ' <tr>
					<td style="padding:2px ; padding-left:10px"><img src="assets/img/faces/face-0.jpg" width=35;height=35; style="border-radius:50% ; padding:0px;"> </td>
					<td>' . $row["fullname"] . '</td>
					<td style="padding-left:25px;">' . $row["gendre"] . '</td>
					<td>' . $row["birthday"] . '</td>
					<td style="width:8% ; overflow:hidden;  position: relative;">' . $row["email"] . '</td>
					<td>' . $row["state"] . '</td>
					<td>' . $row["city"] . '</td>
					<td>' . $row["phoneNumber"] . '</td>
					<td><button type="button" id="bttnDelete" onclick="deleteHandler(\' ' . $row["id"] . '\', \' ' . $row["fullname"] . '\', \' ' . $row["email"] . '\')" class="btn btn-success form-control" style="width:85%; background-color:dodgerblue; margin-left:10px;  padding-right:12px" on >Delete</button></td>
						  
				</tr>';
				}
				$userId = $row["id"] + 1;
				?>
			</tbody>

		</table>
		<button type="button" name="btnMore" data-vid="<?php echo $userId; ?>" id="btnMore" class="btn btn-success form-control" style="background-color:dodgerblue;">more</button>

	</div>
	</div>

	<script>
		$(document).ready(function() {
			$(document).on('click', '#btnMore', function() {
				var lastUserId = $(this).data("vid");
				$('#btnMore').html("Loading...");
				$.ajax({
					url: "components/tables/loading-users.php",
					method: "POST",
					data: {
						lastUserId: lastUserId
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

		let userInfo = document.getElementById("userInfo");
		let backdrop = document.getElementById("backdrop");
		let userId, userName, userEmail = '';

		function deleteHandler(id, name, email) {
			userInfo.style.display = "block";
			backdrop.style.display = "block";
			userId = id;
			userName = name;
			userEmail = email;
			console.log("ID: " + id + " Name: " + name + " Email: " + email);
			document.getElementById('user').innerHTML = "ID: " + id + "<br/>" +
				" Full Name: " + name + "<br/>" +
				" Email: " + email;
				
		}

		backdrop.onclick = () => {
			userInfo.style.display = "none";
			backdrop.style.display = "none";
		}


		document.getElementById("bttnCancel").onclick = (e) => {
			e.preventDefault();
			userInfo.style.display = "none";
			backdrop.style.display = "none";
		}

		document.getElementById("bttnDelete").onclick = (e) => {
			e.preventDefault();
			$.ajax({
			url: "components/delete/deleteUser.php",
			type: "POST",
			data:{"id":userId}
			}).done(function(data) {
				alert(data);
			});
		}

	</script>