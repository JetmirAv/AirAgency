<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<?php 
include "../databaseConfig.php";

// Query Flights
 
$sqlFlight="SELECT c1.id as 'fromCityId',
a.id as 'airplaneId',
a.name as 'AirplaneName',
f.planeId as 'planeId',
f.toCity as 'toCity',
f.fromCity as 'fromCity',
c2.id as 'toCityId',
c1.name as 'From City',
c2.name as 'To City',
f.avalible as 'Available',
a.name as 'Airplane',
f.checkIn as  'CheckIn',
f.price as 'Price',
f.isSale as 'isSale',
f.createdAt as 'created At',
f.updatedAt as 'update At',
f.img as 'Image'
FROM flight f INNER JOIN city c1 
ON f.fromCity = c1.id
INNER JOIN city c2 
ON f.toCity=c2.id
INNER JOIN Airplane a 
ON f.planeId=a.id
WHERE f.id=92;";
$flightStatement = $conn->prepare($sqlFlight);
$flightStatement->execute();
$flightDetail = $flightStatement->fetch(); 
?>

<?php
include "../databaseConfig.php";

$allCities = "select id,name from city order by name ; ";
$cityStm = $conn->prepare($allCities);
$cityStm->execute();
$results = $cityStm->fetchAll();

?>

<?php 
$allPlanes = "select id,name from airplane order by name ; ";
$planeStm = $conn->prepare($allPlanes);
$planeStm->execute();
$planeResults = $planeStm->fetchAll(); ?>


<div class="col-md-8" style="margin-left:18%;">
    <div class="card">
        <div class="header">
            <h4 class="title">Insert Flight</h4>
        </div>
        <div class="content" style=" margin-top:10%;">
            <form action="../dashboard/components/flights/insertFlightQuery.php" method="post" enctype="multipart/form-data">
                        <?php 
                        if(isset($_SESSION['errors'])){
                           foreach($_SESSION['errors'] as $updateError){
                           echo "<p style='color:red'>$updateError</p>";
                        }
                        }
                        if(isset($_SESSION['success'])){
                        echo "<p style='color:green'>" .$_SESSION['success']. "</p>";

                        }		
                        ?>


                      <div class="row" style="margin-left:40%;">
                           
                           <div class="form-group">
                            <label>Image</label>l
                            <input type="file" name="img" class="form-control" placeholder="Image" value="img" style="width: 150px;">
                            </div>
                            </div>
                            
                <div class="row" style="margin-left:12%;">    
                    <div class="col-md-5">
                        <div class="form-group" style="width: 250px;">
                            <label>From City</label>


                    <select name="fromCity" class="btn btn-default dropdown-toggle">

                            <?php foreach($results as $output) { ?>

                                    <option value = "<?php echo $output['id']?> ">
                                    <?php  echo $output['name']; ?></option>

                                   <?php } ?>

                    </select>
                </div>
                </div>
                <div class="col-md-3" style="width: 300px;">
                <div class="form-group">
                <label>To City</label>
                           <select name="toCity" class="btn btn-default dropdown-toggle">
                                          <?php foreach($results as $output) { ?>
                                                <option value = "<?php echo $output['id']?> ">
                                                <?php  echo $output['name']; ?></option>

                                               <?php } ?>

                                    </select>
                </div>
                </div>


                </div>

                <div class="row" style="margin-left:26%;">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Airplane</label>
                       <select  name="planeId" class="btn btn-default dropdown-toggle">
{
                     <?php foreach($planeResults as $planeOutput) { ?>

                            <option value = "<?php echo $planeOutput['id']?> ">
                            <?php  echo $planeOutput['name']; ?></option>

                          <?php } ?>

                           }
                       </select>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-left:8%;">
                       <div class="col-md-4">
                        <div class="form-group">
                            <label>CheckIn</label>l
                            <input name="checkIn" type="datetime-local" class="form-control" placeholder="">
                        </div>
                    </div>

                    <div class="col-md-4" style="width: 90px;">
                        <label> isSale </label>
                        <br>
                        <input name="isSale" type="text" class="form-control" placeholder="Sale">
                    </div>
                         <div class="col-md-4">
                        <div class="form-group">
                            <label>Price</label>
                            <input name="price" type="text" class="form-control" placeholder="Price">
                        </div>
                    </div>

                </div>
                <button name="insertFlight" type="submit" class="btn btn-info btn-fill pull-right">Insert Flight</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>










