<?php

include_once "../../../databaseConfig.php";
include_once "../../../models/booked.php";

if (isset($_POST['offset'])) {
	$output = '';
	$offset = (int)$_POST['offset'];

	$rsResult = Booked::findAll($conn, 10, $offset);
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
						<td><button type="button" onclick="deleteHandler(\' ' . $row["id"] . '\')" class="btn btn-success form-control" style="background-color:dodgerblue; padding-left:3px; padding-right:3px" >Delete</button></td>                    
					</tr>';
		}
		$output .= '
			<tr id="removeRow">
				<td colspan=9><button type="button" name="btnMore" data-vid="' . $airplaneId . '" id="btnMore" class="btn btn-success form-control" style="background-color:dodgerblue;">more</button></td>
			</tr>';

		echo $output;
	
}
