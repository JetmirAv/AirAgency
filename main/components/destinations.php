
<div class="rooms-slides owl-carousel">
<?php

$getMostSaleFilghtQuery = "select f.id, a.name as 'Plane', c1.name as 'From' , c2.name as 'To', f.price,
f.isSale, (f.price*f.isSale/100) as 'Sale Price', f.avalible, f.checkIn  from flight f
inner join city c1 on f.fromCity = c1.id
inner join city c2 on f.toCity = c2.id
inner join airplane a on f.planeId = a.id
where f.isSale > 0 and f.checkIn > now() 
order by f.isSale Desc limit 4";
$getMostSaleFilght = $conn->prepare($getMostSaleFilghtQuery);
$getMostSaleFilght->execute();
foreach ($getMostSaleFilght->fetchAll() as $MostSaleFlight):
    // echo "<p>";
    // print_r($MostSaleFlight);
    // echo "</p>";
    $time = [];
    $date = explode(" ", $MostSaleFlight[8])[0];
    $hour = explode(":", explode(" ", $MostSaleFlight[8])[1])[0];
    $minute = explode(":", explode(" ", $MostSaleFlight[8])[1])[1];
    array_push($time, $hour, $minute);
    $time = implode(":", $time);
    ?>
    	    <!-- Single Room Slide -->
	    <div class="single-room-slide d-flex align-items-center">
	        <!-- Thumbnail -->
	        <div class="room-thumbnail h-100 bg-img" style="background-image: url(img/bg-img/16.jpg);"></div>

	        <!-- Content -->
	        <div class="room-content">
	            <h2 data-animation="fadeInUp" data-delay="300ms"><?php echo $MostSaleFlight[3] ?></h2>
                <h4 data-animation="fadeInUp" data-delay="500ms"><?php echo "<strike style='color:red'>" .$MostSaleFlight[4] . "$</strike>"?> </h3>
	            <h3 data-animation="fadeInUp" data-delay="500ms"><?php echo  $MostSaleFlight[6] . "$" ?> <span>/ Person</span></h3>
	            
                <ul class="room-feature" data-animation="fadeInUp" data-delay="700ms">
	                <li><span><i class="fa fa-check"></i> From</span> <span>: <?php echo $MostSaleFlight[2] ?></span></li>
	                <li><span><i class="fa fa-check"></i> To</span> <span>: <?php echo $MostSaleFlight[3] ?></span></li>
	                <li><span><i class="fa fa-check"></i> Avalible</span> <span>: <?php echo $MostSaleFlight[7] ?></span></li>
	                <li><span><i class="fa fa-check"></i> Date</span> <span>: <?php echo $date ?></span></li>
	                <li><span><i class="fa fa-check"></i> Time</span> <span>: <?php echo $time ?></span></li>
	            </ul>
	            <button onClick="bttnFlightInSale('<?php echo $MostSaleFlight[0] ?>')"  class="btn roberto-btn mt-30" data-animation="fadeInUp" data-delay="900ms">Book Now</button>
	        </div>
	    </div>
	<?php endforeach;?>
</div>

<script>

function bttnFlightInSale(id){
        window.location.href = "flights.php?id=" + id;
    }
</script>