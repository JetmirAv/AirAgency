<?php
require_once("../databaseConfig.php");

$output = "";
$offset = (int)trim($_REQUEST['offset']);
$userId = (int)trim($_REQUEST['userId']);
$lastBookedQuery = "select b.userId  , c1.name as 'From' , c2.name as 'To' , f.price as 'Price' ,
f.isSale as 'Sale' , (f.price - (f.price* f.isSale/100)) as 'SalePrice' ,
b.quantity as 'TicketsBought',
b.createdAt as 'boookedDate'  from flight f 
INNER JOIN city c1 on f.fromCity=c1.id 
INNER JOIN city c2 ON f.toCity=c2.id
INNER JOIN booked b ON b.flightId=f.id 
 where b.userId='.$userId.'
order by b.createdAt desc limit 10 offset ". $offset ." ; " ;
$rowCount = $conn->query($lastBookedQuery); 
$count = $rowCount->rowCount();



if($count > 0){
    
    foreach ($rowCount as  $row):
        $output .=  '<tr id="1">
				<td>'.$row['From'].'</td>
				<td>'.$row['To'].'</td>
				<td>'.$row['Price'].'</td>
				<td>'.$row['Sale'].'</td>
				<td style="padding-left:40px ;">'.$row['SalePrice'].'</td>
			    <td style="padding-left:60px ;">'.$row['TicketsBought'].'</td>
			    <td>'.$row['boookedDate'].'</td>
	            <td><button type="button" id="bttnDelete" onclick="deleteHandler(\' ' . $row["id"] . '\')" class="btn btn-success form-control" style="width:85%;  margin-left:10px; padding-right:12px" on >Cancel</button></td>   
                
               
                
			</tr>';


endforeach;
echo  $output ;    
    
}

?>