<?php

include_once "../../../databaseConfig.php";
include_once "../../../models/flights.php";



$output = '';
$flightId = '';
sleep(1);
$offset = (int)$_POST['offset'];

$rsResult = Flight::findAll($conn, $offset);

foreach ($rsResult as $row) {
	$flightId = $row['id'];
	$output .= '
                <tr >
				<td onclick="getFlightHandler(\'' . $row['id'] .  '\')" style="padding:2px ; padding-left:10px"><img src=' . $row["image"] . ' width=35 ; height=35; style="border-radius:50% ; padding:0px;"> </td>
				<td onclick="getFlightHandler(\'' . $row['id'] .  '\')">' . $row["fromCity"] . '</td>   
					<td onclick="getFlightHandler(\'' . $row['id'] .  '\')">' . $row["toCity"] . '</td>
					<td onclick="getFlightHandler(\'' . $row['id'] .  '\')" style="padding-left:25px;">' . $row["planeId"] . '</td>
	                <td onclick="getFlightHandler(\'' . $row['id'] .  '\')">' . $row["price"] . '</td>
	            	<td onclick="getFlightHandler(\'' . $row['id'] .  '\')">' . $row["isSale"] . '</td>
	            	<td onclick="getFlightHandler(\'' . $row['id'] .  '\')">' . $row["checkIn"] . '</td>
	            	<td onclick="getFlightHandler(\'' . $row['id'] .  '\')">' . $row["createdAt"] . '</td>
            		<td onclick="getFlightHandler(\'' . $row['id'] .  '\')">' . $row["updatedAt"] . '</td>
					<td><button type="button" id="bttnDelete" onclick="deleteHandler(\' ' . $row["id"] . '\')" class="btn btn-success form-control" style="width:85%; background-color:dodgerblue; margin-left:10px;  padding-right:12px" >Delete</button></td>
				</tr> ';
}
$output .= '
		<tr id="removeRow">
			<td colspan=10><button type="button" name="btnMore" data-vid="' . $flightId . '" id="btnMore" class="btn btn-success form-control" style="background-color:dodgerblue;">more</button></td>
		</tr>';

echo $output;
