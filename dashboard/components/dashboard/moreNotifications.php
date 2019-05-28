<?php
require_once("../../../databaseConfig.php");

$output = "";
$offset = (int)trim($_REQUEST['offset']);
$lastBookedQuery = "SELECT b.id, CONCAT(u.firstname, ' ', u.lastname) as fullname, c1.name as 'from', c2.name as 'to',". 
    "a.name as 'plane' FROM booked b ". 
    "inner join users u on u.id=b.userId " . 
    "inner join flight f on b.flightId=f.id " . 
    "inner join city c1 on f.fromCity = c1.id " . 
    "inner join city c2 on f.toCity = c2.id " . 
    "inner join airplane a on f.planeId = a.id " . 
    "order by b.createdAt DESC limit 10 offset " . $offset . ";";
$lastBooked = $conn->query($lastBookedQuery);    
if($lastBooked->rowCount() > 0){
    
    while ($info = $lastBooked->fetch(PDO::FETCH_ASSOC)):
        $output .=  "<tr>" .
         "<td style='width: 100%'>" .
            $info['fullname'] . 
                " booked a flight from " . $info['from'] . 
                " to " . $info['to'] . 
                " with plane " . $info['plane'].    
        "</td>".
        "</tr>";
        
    endwhile;
    echo $output;    
} 

