<?php 

$mostBookedDestinationsQuery = "
select c.id, c.name from flight f 
inner join city c
on f.toCity=c.id
where toCity in (
select * from ( select f.toCity from booked b 
inner join flight f on b.flightId = f.id
group by f.toCity
order by count(*) desc 
limit 10) temp )
group by c.id";
$index = 1;
$mostBookedDestinations = $conn->prepare($mostBookedDestinationsQuery);
$mostBookedDestinations->execute();

foreach($mostBookedDestinations->fetchAll() as $destinations):

    // print_r($destinations);


?>


<!-- Single Project Slide -->
<div class="single-project-slide active bg-img" style="background-image: url(img/bg-img/5.jpg);">
    <!-- Project Text -->
    <div class="project-content">
        <div class="text">
            <h6>Destination <?php echo $index ?> </h6>
            <h5><?php echo $destinations[1] ?></h5>
        </div>
    </div>
    <!-- Hover Effects -->
    <div class="hover-effects">
        <div class="text">
            <h6>Destination <?php echo $index ?></h6>
            <h5><?php echo $destinations[1] ?></h5>
        </div>
        <button onClick="bttnCityFlights('<?php echo $destinations[1] ?>')" class="btn project-btn">Book One Now <i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
    </div>
</div>
<?php $index++; endforeach; ?>


<script>

function bttnCityFlights(city) {
    window.location.href = "flights.php?city=" + city;
}

</script>