<?php
require_once("../databaseConfig.php");

$output = "";
$offset = (int)trim($_REQUEST['offset']);
$lastBookedQuery = "select
			f.id as 'flightId',
			c1.id as 'fromCityId',
            c2.id as 'toCityId',
            c1.name as 'From',
            c2.name as 'To',
            f.avalible as 'Available',
            f.price as 'Price',
            f.price * isSale/100 as 'Sale',
            f.isSale as 'Sale',
            cast(f.checkIn as date) as 'Date',
            cast(f.checkIn as time) as 'Time',
            f.img as 'image',
            a.id as 'airplaneId',
            a.name as 'airplaneName'
            from flight as f 
            inner join city as c1 on f.fromCity = c1.id
            inner join city as c2 on f.toCity = c2.id
            inner join airplane as a on f.planeId = a.id 
            where f.checkIn >= curdate() and f.checkIn >= current_time() order by f.checkIn desc limit 10 offset " . $offset . ";";
$rowCount = $conn->query($lastBookedQuery); 
$count = $rowCount->rowCount();


if($count > 0){
    
    foreach ($rowCount as  $row):
        $output .=  '<div id="flightId" class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
				<!-- Room Thumbnail -->
				<div class="room-thumbnail">
					<img src="img/bg-img/44.jpg" alt="" style="margin-left:50px;">
				</div>
				<!-- Room Content -->
						<div class="room-content">
                            <h2>'.$row['airplaneName'].'</h2>
                            <h4>'.$row['Price'].'&euro;<span> /'.$row['Sale'].' with Sale</span></h4>
                            <div class="room-feature">
                                <h6>From: <span>'.$row['From'].'</span></h6>
                                <h6>To: <span>'.$row['To'].'</span></h6>
                                <h6>Date: <span>'.$row['Date'].'</span></h6>
						<h6>Time: <span>'.$row['Time'].'</span></h6>
											<h6>Avalible: <span id="ticketsAvalible">' . $row['Available'] . '</span></h6>
						<span style="display:block; width: 20px; ">
						<input min=0 max=' . $row['Available'] . ' onchange="test(this, \' ' . $row["flightId"] . '\')" type="number" class="'  . $row['flightId'] . '" />
						</span>
						
					</div>
					<div style="display:flex">
                    
					<button class="btn btn-success form-control" style="width:20%; margin-left:100px" onclick="insertHandler(\' ' . $row["From"] . '\', \' ' . $row["To"] . '\', \' ' . $row["Price"] . '\', \' ' . $row["flightId"] . '\')" >Book now</button></div>
				</div>
			</div>
                            ';
        
    endforeach;
    echo $output;    
} 

