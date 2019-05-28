<?php

include_once "../../../dbConfig.php";

$dsn = "mysql:host=" . HOST . ";dbname=" . DBNAME;
try {
	$conn = new PDO($dsn, USERNAME, PASSWORD);
} catch (PDOException $e) {
	echo $e->getMessage();
}

$output = '';
$userId = '';
sleep(1);
$data = (int)$_POST['lastUserId'];
$first_shown=10;
$sql = "select id,img , concat(firstname ,'  ', lastname) as fullname,gendre,email,birthday,state,city,phoneNumber from users where id >'.$data.' order by id asc  limit 10";
    $rs_result = $conn->query($sql);
    $count = $rs_result->rowCount();
if ($count > 0) {
	foreach ($rs_result as $row) {
		$userId = $row['id']+1;
		$output .= '
              <tr>
					<td  style="padding:2px ; padding-left:10px"><img src="assets/img/faces/face-0.jpg" width=35;height=35; style="border-radius:50% ; padding:0px;"> </td>
					<td >'.$row["fullname"].'</td>
					<td  style="padding-left:25px;">'.$row["gendre"].'</td>
					<td >'.$row["birthday"].'</td>
					<td style="width:8% ; overflow:hidden;  position: relative;">'.$row["email"].'</td>
					<td style="width=200px;">'.$row["state"].'</td>
					<td>'.$row["city"].'</td>
					<td>'.$row["phoneNumber"].'</td>
					<td><button type="button" id="bttnDelete" onclick="deleteHandler(\' '. $row["id"] .'\')"  data-arg1="1234" class="btn btn-success form-control" style="width:85%; background-color:dodgerblue; margin-left:10px;  padding-right:12px" " on >Delete</button></td>
				
				</tr>';}
				
	
	$output .= '
		<tr id="removeRow">
			<td colspan=10><button type="button" name="btnMore" data-vid="' . $userId . '" id="btnMore" class="btn btn-success form-control" style="background-color:dodgerblue;">more</button></td>
		</tr>';

	echo $output;
}
?>
