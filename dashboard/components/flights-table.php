<div class="card">


	<?php include "../databaseConfig.php"?>
	<?php
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
	$start_from = ($page-1) * 8;

	$sql = "select fromCity,toCity,planeId,price,isSale,checkIn,createdAt,updatedAt from flight limit $start_from,8";
	$rs_result = $conn->query($sql);
	$count = $rs_result->rowCount();
		?>

	<div class="header">
		<h4 class="title">Number of flights:<?php echo "$count" ?></h4>
	</div>
	<div class="content table-responsive table-full-width">
		<?php	
	   echo '<table class="table table-hover table-striped">
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
		 <tbody>';


	foreach($rs_result as $row){
			echo' <tr>
				<td style="padding:2px ; padding-left:10px"><img src="assets/img/faces/face-0.jpg" width=35;height=35; style="border-radius:50% ; padding:0px;"> </td>
				<td>'.$row["fromCity"].'</td>
				<td>'.$row["toCity"].'</td>
				<td style="padding-left:25px;">'.$row["planeId"].'</td>
				<td>'.$row["price"].'</td>
				<td>'.$row["isSale"].'</td>
				<td>'.$row["checkIn"].'</td>
				<td>'.$row["createdAt"].'</td>
				<td>'.$row["updatedAt"].'</td>
			</tr>';
	}
			
		?>
		</tbody>
		</table>

		<?php
		$sql = "SELECT COUNT(id) AS total FROM flight";
		$result = $conn->query($sql);
		$row = $result->fetch();
		
		$a=$row['total']/8;
		
		$total_pages = ceil($a); // calculate total pages with results
        echo     "<div style='text-align: center'>";
		for ($i=1; $i<=$total_pages; $i++)   // print links for all pages
			{ 
			echo "<a href='/github/AirAgency/dashboard/flights-table.php?page=".$i."' ";
			echo "style='margin-left:10px;'>"."      ".$i."</a> ";
		    }; 
		     
		echo "</div>" 
?>

	</div>
</div>
