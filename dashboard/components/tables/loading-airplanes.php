<?php

include_once "../../../dbConfig.php";

$dsn = "mysql:host=" . HOST . ";dbname=" . DBNAME;
try {
	$conn = new PDO($dsn, USERNAME, PASSWORD);
} catch (PDOException $e) {
	echo $e->getMessage();
}

$output = '';
$airplaneId = '';
sleep(1);
$data = (int)$_POST['lastFlightId'];

$sql = "select id, concat('../uploads/airplane-img/',img) as image,name, seats, yearOfProd,fuelCapacity,maxspeed,createdAt,updatedAt from airplane where id >" . $data . " order by id asc limit 10";

$rsResult = $conn->query($sql);
$count = $rsResult->rowCount();
if ($count > 0) {
	foreach ($rsResult as $row) {
		$airplaneId = $row['id'];
		$output .= '
                <tr id=' . $row['id'] . '>
				<td style="padding:2px ; padding-left:10px"><img src="' . $row["image"] . '" width=35; height=35; style="border-radius:50% ; padding:0px;"> </td></td>
				<td>' . $row["name"] . '</td>
				<td style="padding-left:25px;">' . $row["seats"] . '</td>
				<td style="padding-left:40px">' . $row["yearOfProd"] . '</td>
				<td>' . $row["fuelCapacity"] . '</td>
				<td>' . $row["maxspeed"] . '</td>
				<td>' . $row["createdAt"] . '</td>
				<td>' . $row["updatedAt"] . '</td>
                <td><button type="button" id="bttnDelete" onclick="deleteHandler(\' ' . $row["id"] . '\', \' ' . $row["name"] .  '\')" class="btn btn-success form-control" style="width:85%; background-color:dodgerblue; margin-left:10px;  padding-right:12px" on >Delete</button></td>
			</tr>';
	}
	$output .= '
		<tr id="removeRow">
			<td colspan=9><button type="button" name="btnMore" data-vid="' . $airplaneId . '" id="btnMore" class="btn btn-success form-control" style="background-color:dodgerblue;">more</button></td>
		</tr>';

	echo $output;
}
