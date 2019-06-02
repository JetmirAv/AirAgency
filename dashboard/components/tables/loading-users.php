<?php

include_once '../../../databaseConfig.php';
include_once '../../../models/users.php';

$output = '';
$userId = '';
$offset = (int)$_POST['offset'];
$rs_result = User::findAll($conn, 10, $offset);
foreach ($rs_result as $row) {
	$userId = $row['id'] + 1;
	$output .= '
              <tr id=' . $row['id'] . '>
					<td onclick="getUserHandler(\'' . $row['id'] . ' \')" style="padding:2px ; padding-left:10px"><img src=' . $row["img"] . ' width=35; height=35; style="border-radius:50% ; padding:0px;"> </td>
					<td onclick="getUserHandler(\'' . $row['id'] . ' \')">' . $row["fullname"] . '</td>
					<td onclick="getUserHandler(\'' . $row['id'] . ' \')" style="padding-left:25px;">' . $row["gendre"] . '</td>
					<td onclick="getUserHandler(\'' . $row['id'] . ' \')">' . $row["birthday"] . '</td>
					<td onclick="getUserHandler(\'' . $row['id'] . ' \')" style="width:8% ; overflow:hidden;  position: relative;">' . $row["email"] . '</td>
					<td onclick="getUserHandler(\'' . $row['id'] . ' \')" style="width=200px;">' . $row["state"] . '</td>
					<td onclick="getUserHandler(\'' . $row['id'] . ' \')">' . $row["city"] . '</td>
					<td onclick="getUserHandler(\'' . $row['id'] . ' \')">' . $row["phoneNumber"] . '</td>
					<td><button type="button" id="bttnDelete" onclick="deleteHandler(\' ' . $row["id"] . '\', \' ' . $row["fullname"] . '\', \' ' . $row["email"] . '\')" class="btn btn-success form-control" style="width:85%; background-color:dodgerblue; margin-left:10px;  padding-right:12px" on >Delete</button></td>

				</tr>';
}


$output .= '
		<tr id="removeRow">
			<td colspan=10><button type="button" name="btnMore" data-vid="' . $userId . '" id="btnMore" class="btn btn-success form-control" style="background-color:dodgerblue;">more</button></td>
		</tr>';

echo $output;
