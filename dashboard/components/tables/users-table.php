	<?php include "../databaseConfig.php" ?>
	<?php include "../models/users.php" ?>
	<?php
	
	$rsResult = User::findAll($conn, 10, 0);
	$userId = '';
	$count = User::count($conn);

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
			<h3>Delete User</h3>
			<h4 style="font-weight: 300" id="user">
				</h4>
				<div style="display:flex;
					flex-direction: row;
					justify-content: space-evenly ">
					<button id="bttnConfirmCancel">Cancel</button>
					<button id="bttnConfirmDelete" type="submit" name="deleteUser">Delete</button>
				</div>
		</div>
	</form>
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
		<h4 style="display: inline-block; width: 40%" class="title">Number of users:<?php echo $count['count'] ?></h4>

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
		<table class='table table-hover table-striped' style="table-layout:fixed;" width='100%'>
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
					echo ' <tr id=' . $row['id'] . '>
					<td onclick="getUserHandler(\'' . $row['id'] . ' \')" style="padding:2px ; padding-left:10px"><img src=' . $row["img"] . ' width=35; height=35; style="border-radius:50% ; padding:0px;"> </td>
					<td onclick="getUserHandler(\'' . $row['id'] . ' \')">' . $row["fullname"] . '</td>
					<td onclick="getUserHandler(\'' . $row['id'] . ' \')" style="padding-left:25px;">' . $row["gendre"] . '</td>
					<td onclick="getUserHandler(\'' . $row['id'] . ' \')">' . $row["birthday"] . '</td>
					<td onclick="getUserHandler(\'' . $row['id'] . ' \')" style="width:8% ; overflow:hidden;  position: relative;">' . $row["email"] . '</td>
					<td onclick="getUserHandler(\'' . $row['id'] . ' \')">' . $row["state"] . '</td>
					<td onclick="getUserHandler(\'' . $row['id'] . ' \')">' . $row["city"] . '</td>
					<td onclick="getUserHandler(\'' . $row['id'] . ' \')">' . $row["phoneNumber"] . '</td>
					<td ><button type="button" id="bttnDelete" onclick="deleteHandler(\' ' . $row["id"] . '\', \' ' . $row["fullname"] . '\', \' ' . $row["email"] . '\')" class="btn btn-success form-control" style="width:85%; background-color:dodgerblue; margin-left:10px;  padding-right:12px" on >Delete</button></td>

						  
				</tr>';
					$userId = $row["id"];
				}
				?>
			</tbody>

		</table>
		<button type="button" name="btnMore" data-vid="<?php echo $userId + 1; ?>" id="btnMore" class="btn btn-success form-control" style="background-color:dodgerblue;">more</button>

	</div>
	</div>

	<script>
		
		$(document).ready(function() {
			let offset = 10;
			$(document).on('click', '#btnMore', function() {
				var lastUserId = $(this).data("vid");
				$('#btnMore').html("Loading...");
				$.ajax({
					url: "components/tables/loading-users.php",
					method: "POST",
					data: {
						offset
					},
					dataType: "html",
					success: (data) => {
						if (data != '') {
							offset += 10;
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

			function getUserHandler(id){
		window.location.href = '../dashboard/userInfo.php?id='+id;
	}

		let userInfo = document.getElementById("userDelete");
		let backdrop = document.getElementById("backdrop");
		let userId, userName, userEmail = '';

		function deleteHandler(id, name, email) {
			userInfo.style.display = "block";
			backdrop.style.display = "block";
			userId = id;
			userName = name;
			userEmail = email;
			document.getElementById('user').innerHTML = "ID: " + id + "<br/>" +
				" Full Name: " + name + "<br/>" +
				" Email: " + email;

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
			e.preventDefault();
			$.ajax({
				url: "components/delete/deleteUser.php",
				type: "POST",
				data: {
					"id": userId
				}
			}).done(function(data) {
				location.reload();
			});
		}
	</script>