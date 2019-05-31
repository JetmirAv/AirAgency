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

$sql = "select id,flightId,userId,price,quantity,createdAt,updatedAt from booked  limit ".$data.", 10";
    
$rsResult = $conn->query($sql);
$count = $rsResult->rowCount();
if ($count > 0) {
	foreach ($rsResult as $row) {
		$airplaneId = $row['id'];
		$output .= '
                <tr id=' . $row['id'] . '>
                    <td onclick="getBookedHandler(' . $row['id'] . ')" style="padding-left:25px;">' . $row['id'] . '</td>
                    <td onclick="getBookedHandler(' . $row['id'] . ')" style="padding-left:25px;">' . $row['flightId'] . '</td>
                    <td onclick="getBookedHandler(' . $row['id'] . ')">' . $row['userId'] . '</td>
                    <td onclick="getBookedHandler(' . $row['id'] . ')">' . $row['price'] . '</td>
                    <td onclick="getBookedHandler(' . $row['id'] . ')">' . $row['quantity'] . '</td>
                    <td onclick="getBookedHandler(' . $row['id'] . ')">' . $row['createdAt'] . '</td>
                    <td onclick="getBookedHandler(' . $row['id'] . ')">' . $row['updatedAt'] . '</td>
                    <td><button type="button"   class="btn btn-success form-control" style="background-color:dodgerblue; padding-left:3px; padding-right:3px" >Delete</button></td>                    
                </tr>';
	}
	$output .= '
		<tr id="removeRow">
			<td colspan=9><button type="button" name="btnMore" data-vid="' . $airplaneId . '" id="btnMore" class="btn btn-success form-control" style="background-color:dodgerblue;">more</button></td>
		</tr>';

	echo $output;
}
