<?php

include_once "../../../dbConfig.php";

$dsn = "mysql:host=" . HOST . ";dbname=" . DBNAME;
try {
	$conn = new PDO($dsn, USERNAME, PASSWORD);
} catch (PDOException $e) {
	echo $e->getMessage();
}

$output = '';
$flightId = '';
sleep(1);
$data = (int)$_POST['lastFlightId'];

$sql = "select id,concat('../uploads/flight-img/',img)as image, fromCity,toCity,planeId,price,isSale,checkIn,createdAt,updatedAt from flight order by id asc limit " . $data . " ,10";
$rsResult = $conn->query($sql);
$count = $rsResult->rowCount();
if ($count > 0) {
	foreach ($rsResult as $row) {
		$flightId = $row['id'];
		$output .= '
                <tr id='.$row['id'].'>
				<td style="padding:2px ; padding-left:10px"><img src='.$row["image"] .' width=35 ; height=35; style="border-radius:50% ; padding:0px;"> </td>
				<td>' . $row["fromCity"] . '</td>   
					<td>' . $row["toCity"] . '</td>
					<td style="padding-left:25px;">' . $row["planeId"] . '</td>
	                <td>' . $row["price"] . '</td>
	            	<td>' . $row["isSale"] . '</td>
	            	<td>' . $row["checkIn"] . '</td>
	            	<td>' . $row["createdAt"] . '</td>
            		<td>' . $row["updatedAt"] . '</td>
					<td><button type="button" id="bttnDelete" onclick="deleteHandler(\' ' . $row["id"] . '\')" class="btn btn-success form-control" style="width:85%; background-color:dodgerblue; margin-left:10px;  padding-right:12px" on >Delete</button></td>
				</tr> ';
	}
	$output .= '
		<tr id="removeRow">
			<td colspan=10><button type="button" name="btnMore" data-vid="' . $flightId . '" id="btnMore" class="btn btn-success form-control" style="background-color:dodgerblue;">more</button></td>
		</tr>';

	echo $output;
}
?>
