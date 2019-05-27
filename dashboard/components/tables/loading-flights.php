<?php

include_once "../../../dbConfig.php";

$dsn = "mysql:host=" . HOST . ";dbname=" . DBNAME;
try {
	$conn = new PDO($dsn, USERNAME, PASSWORD);
} catch (PDOException $e) {
	echo $e->getMessage();
}

$output = '';
$flight_id = '';
sleep(1);
$data = (int)$_POST['last_flight_id'];

$sql = "select id, fromCity,toCity,planeId,price,isSale,checkIn,createdAt,updatedAt from flight where id >" . $data . " order by id asc limit 10";
$rs_result = $conn->query($sql);
$count = $rs_result->rowCount();
if ($count > 0) {
	foreach ($rs_result as $row) {
		$flight_id = $row['id'];
		$output .= '
                <tr>
					<td style="padding:2px ; padding-left:10px"><img src="assets/img/faces/face-0.jpg" width=35;height=35; style="border-radius:50% ; padding:0px;"> </td>
					<td>' . $row["fromCity"] . '</td>   
					<td>' . $row["toCity"] . '</td>
					<td style="padding-left:25px;">' . $row["planeId"] . '</td>
	                <td>' . $row["price"] . '</td>
	            	<td>' . $row["isSale"] . '</td>
	            	<td>' . $row["checkIn"] . '</td>
	            	<td>' . $row["createdAt"] . '</td>
            		<td>' . $row["updatedAt"] . '</td>
					<td><button type="button"   class="btn btn-success form-control" style="background-color:dodgerblue; padding-left:3px; padding-right:3px" >Delete</button></td>
				</tr> ';
	}
	$output .= '
		<tr id="remove_row">
			<td colspan=10><button type="button" name="btn_more" data-vid="' . $flight_id . '" id="btn_more" class="btn btn-success form-control" style="background-color:dodgerblue;">more</button></td>
		</tr>';

	echo $output;
}
?>
