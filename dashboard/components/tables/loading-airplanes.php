<?php

include_once "../../dbConfig.php";

$dsn = "mysql:host=" . HOST . ";dbname=" . DBNAME;
try {
	$conn = new PDO($dsn, USERNAME, PASSWORD);
} catch (PDOException $e) {
	echo $e->getMessage();
}

$output = '';
$airplane_id = '';
sleep(1);
$data = (int)$_POST['last_flight_id'];

$sql = "select id, concat('assets/img/airplanes/',img) as image,name, seats, yearOfProd,fuelCapacity,maxspeed,createdAt,updatedAt from airplane where id >".$data." order by id asc limit 10";

$rs_result = $conn->query($sql);
$count = $rs_result->rowCount();
if ($count > 0) {
	foreach ($rs_result as $row) {
		$airplane_id = $row['id'];
		$output .= '
                <tr>
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
	$output .= '
		<tr id="remove_row">
			<td colspan=9><button type="button" name="btn_more" data-vid="' . $airplane_id . '" id="btn_more" class="btn btn-success form-control">more</button></td>
		</tr>';

	echo $output;
}
?>
