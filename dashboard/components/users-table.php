<?php include "../databaseConfig.php"?>
<?php
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
	$start_from = ($page-1) * 8;

	$sql = "select img , concat(firstname ,'  ', lastname) as fullname,gendre,email,birthday,state,city,phoneNumber from users limit $start_from,8";
	$rs_result = $conn->query($sql);
	$count = $rs_result->rowCount();
		?>

<div class="header">
	<h4 class="title">Number of users:<?php echo "$count" ?></h4>
</div>
<div class="content table-responsive table-full-width">
	<table class='table table-hover table-striped' style="table-layout: fixed;">
		<thead>
			<th width=3%>Image</th>
			<th width=5%>Name</th>
			<th width=3%>Gendre</th>
			<th width=9%>Email</th>
			<th width=5%>Birthday</th>
			<th width=5%>State</th>
			<th width=5%>City</th>
			<th width=5%>Phone Number</th>
		</thead>
		<tbody>
			<?php	

	foreach($rs_result as $row){
			echo' <tr>
					<td style="padding:2px ; padding-left:10px"><img src="assets/img/faces/face-0.jpg" width=35;height=35; style="border-radius:50% ; padding:0px;"> </td>
					<td>'.$row["fullname"].'</td>
					<td style="padding-left:25px;">'.$row["gendre"].'</td>
					<td style="width:14% ; overflow:hidden;  position: relative;">'.$row["email"].'</td>
					<td>'.$row["birthday"].'</td>
					<td>'.$row["state"].'</td>
					<td>'.$row["city"].'</td>
					<th>'.$row["phoneNumber"].'</th>
				</tr>';
	}
			
		?>
		</tbody>
	</table>

	<?php
		$sql = "SELECT COUNT(id) AS total FROM users";
		$result = $conn->query($sql);
		$row = $result->fetch();
		
		$a=$row['total']/8;
		
		$total_pages = ceil($a); // calculate total pages with results
        echo     "<div style='text-align: center'>";
		for ($i=1; $i<=$total_pages; $i++)   // print links for all pages
			{ 
			echo "<a href='/github/AirAgency/dashboard/users-table.php?page=".$i."' ";
			echo "style='margin-left:10px;'>"."      ".$i."</a> ";
		    }; 
		     
		echo "</div>" 
?>

</div>
</div>
