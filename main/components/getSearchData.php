<?php
include "../../databaseConfig.php";
	
//if(isset($_POST["query"])){
$search=$_POST["query"];
	
$searchQuery = "select distinct c1.name as 'From',
            f.id as flightId,
			f.price as price,
			f.avalible as Seats,
			c2.name as 'To',
             a.name as 'airplaneName'
            from flight as f 
            inner join city as c1 on f.fromCity = c1.id
            inner join city as c2 on f.toCity = c2.id
            inner join airplane as a on f.planeId = a.id 
            where f.checkIn >= curdate() and f.checkIn >= current_time() and ((c1.name like '".$search."%') or (c2.name like '".$search."%') or (a.name like '".$search."%'))";
$rowCount = $conn->prepare($searchQuery); 
$rowCount->execute();
$count=$rowCount->fetchAll();	

//print_r($count);
//print_r($count);

//print_r($count);

$output='';



foreach ($count as $row):
$output .= '<div id="flightId" class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms" style="position:absolyt;">

	<div class="room-content"   id="'.$row['flightId'].'">
		 From: <span style="padding-right:50px;">'.$row['From'].'</span>
		 <span style="padding-right:50px;">To:'.$row['To'].'</span>
		
		 Airplane Name: <span style="padding-right:50px;">'.$row['airplaneName'].'</span>
		
		Price: <span style="padding-right:50px;">'.$row['price'].'</span>
		 SeatsAvalible: <span style="padding-right:50px;">'.$row['Seats'].'</span>
		  <span style="padding-right:50px;"><button onclick="send_me_to_book(\'' . $row['flightId'] . ' \')">Book</button></span>
		</span>
	</div>
</div>';

endforeach;
echo $output;        
?>
