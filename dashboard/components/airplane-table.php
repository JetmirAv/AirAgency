<div class="card">


	<?php include "../databaseConfig.php"?>
	<?php
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
	$start_from = ($page-1) * 8;

	$sql = "select concat('assets/img/airplanes/',img) as image,name, seats, yearOfProd,fuelCapacity,maxspeed,createdAt,updatedAt from airplane limit $start_from,8";
	$rs_result = $conn->query($sql);	
	$count = $rs_result->rowCount();
		?>

	<div class="header">
		<h4 class="title">Number of airplanes:<?php print $count ?></h4>
	</div>
	<div class="content table-responsive table-full-width">
		<?php	
	   echo '<table class="table table-hover table-striped">
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
		 <tbody>';


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
			
		?>
		</tbody>
		</table>

		<?php
		$sql = "SELECT COUNT(id) AS total FROM airplane";
		$result = $conn->query($sql);
		$row = $result->fetch();
		
		$a=$row['total']/8;
		
		$total_pages = ceil($a); // calculate total pages with results
        echo     "<div style='text-align: center'>";
		for ($i=1; $i<=$total_pages; $i++)   // print links for all pages
			{ 
			echo "<a href='/github/AirAgency/dashboard/airplane-table.php?page=".$i."' ";
			echo "style='margin-left:10px;'>"."      ".$i."</a> ";
		    }; 
		     
		echo "</div>" 
?>

	</div>
</div>
