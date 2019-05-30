<?php
include_once "../databaseConfig.php";

$getSalePctQuery = "select isSale from flight where checkIn > now() group by isSale order by isSale desc limit 3";
$getSalePct = $conn->prepare($getSalePctQuery);
$getSalePct->execute();
$SaleFlights = $getSalePct->fetchAll();
$indexNum = 1;
foreach($SaleFlights as $DataSaleFlight):
?>

 <!-- Single Welcome Slide -->
 <div class="single-welcome-slide bg-img bg-overlay" style="background-image: url(assets/img/backgrounds/index<?php echo $indexNum . ".jpg" ?> )"
     data-img-url="assets/img/backgrounds/index<?php echo $indexNum . ".jpg" ?>">
     <!-- Welcome Content -->
     <div class="welcome-content h-100">
         <div class="container h-100">
             <div class="row h-100 align-items-center">
                 <!-- Welcome Text -->
                 <div class="col-12">
                     <div class="welcome-text text-center">
                         <h6 data-animation="fadeInLeft" data-delay="100ms">Flights &amp; Travel</h6>
                         <h2 data-animation="fadeInLeft" data-delay="300ms">Welcome To AirAgency</h2>
                         <h3 style="color: #C6FFFF"  data-animation="fadeInLeft" data-delay="300ms"><?php echo "Find flights with " . $DataSaleFlight[0] . "%  Sale"; $indexNum++ ?></h3>
                         <a href="#" onclick="getInSaleFlights('<?php echo $DataSaleFlight[0]; ?>')" class="btn roberto-btn btn-2" data-animation="fadeInLeft" data-delay="500ms">Book
                             Now</a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
<?php
endforeach; ?>

<script>
    function getInSaleFlights(sale){
        window.location.href = "flights.php?pct=" + sale;
    }
</script>