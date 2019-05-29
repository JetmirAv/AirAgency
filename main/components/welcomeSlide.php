<?php
include_once "../databaseConfig.php";

$getSalePctQuery = "select isSale from flight group by isSale order by isSale desc limit 3";
$getSalePct = $conn->prepare($getSalePctQuery);
$getSalePct->execute();
$SaleFlights = $getSalePct->fetchAll();
$indexNum = 1;
foreach($SaleFlights as $DataSaleFlight):
    // print_r($DataSaleFlight);
// $getInSaleFlightsQuery = "select f.id, c1.name, c2.name, f.price,
// f.isSale, (f.price*f.isSale/100) as 'Sale Price'  from flight f
// inner join city c1 on f.fromCity = c1.id
// inner join city c2 on f.toCity = c2.id
// order by (f.price*f.isSale/100) Desc limit 10";
// $getInSaleFlights = $conn->prepare($getInSaleFlightsQuery);
// $getInSaleFlights->execute();
// $row = $getInSaleFlights->fetchAll();

//     foreach($row as $data){
//         print_r($data);
//         echo "Start                <br/>";
//     }

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
<?php endforeach; ?>

<script>
    function getInSaleFlights(sale){
        window.location.href = "flights.php?pct=" + sale;
    }
</script>