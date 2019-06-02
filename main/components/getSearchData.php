<?php
include "../../databaseConfig.php";
$search ='';
	
//if(isset($_POST["query"])){
$search=$_POST["search"];
	
$searchQuery = "select c1.name as 'From',
            c2.name as 'To',
             a.name as 'airplaneName'
            from flight as f 
            inner join city as c1 on f.fromCity = c1.id
            inner join city as c2 on f.toCity = c2.id
            inner join airplane as a on f.planeId = a.id 
            where f.checkIn >= curdate() and f.checkIn >= current_time() and ( ( c1.name like ".$search."% ) or ( sc2.name like ".$search."%) or (a.name like ".$search."%))";
$rowCount = $conn->prepare($searchQuery); 
$rowCount->execute();
$count=$rowCount->fetch();	
print_r($count);
//
//foreach ($count as  $row):
//        $output .=  '<div id="flightId" class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
//				<!-- Room Thumbnail -->
//				<div class="room-thumbnail">
//					<img src="img/bg-img/44.jpg" alt="" style="margin-left:50px;">
//				</div>
//				<!-- Room Content -->
//						<div class="room-content">
//                                <h6>From: <span>'.$row['From'].'</span></h6>
//                                <h6>To: <span>'.$row['To'].'</span></h6>
//                                <h6>To: <span>'.$row['airplaneName'].'</span></h6>
//						</span>
//						
//					</div>
//					<div style="display:flex">
//                    
//					</div>
//				</div>
//			</div>';
//        
//    endforeach;
//    echo $output;    
//}
?>
