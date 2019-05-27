<?php 
include "../databaseConfig.php";

// Query Flights
 
$sqlFlight="SELECT c1.id as 'fromCityId', 
c2.id as 'toCityId',
c1.name as 'From City' ,
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
WHERE f.id=5;";



$flightStatement = $conn->prepare($sqlFlight);
$flightStatement->execute();
$flightDetail = $flightStatement->fetchAll()[0]; 
?>
               
<?php 
$allCities = "select id,name from city order by name ; ";
$cityStm = $conn->prepare($allCities);
$cityStm->execute();
$results = $cityStm->fetchAll();

?>
               
                <div class="col-md-8">
					 <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Flights</h4>
                            </div>
                            <div class="content">
<!--                                <form action="components/dashboard/insertFlight.php" method="post">-->
                                   <form action="components/dashboard/updateFlightQuery.php" method="post">
                                    <div class="row">
<!--
                                        <div class="col-md-5">
                                            <div class="form-group" style="width: 250px;">
                                                <label>From City</label>
                                                <input type="Text" name="fromCity"  class="form-control"  placeholder="From..." value="<?php echo $flightDetail['From City'];  ?> ">
                                            </div>
                                        </div>
-->
                                        
                                           <div class="col-md-5">
                                            <div class="form-group" style="width: 250px;">
                                                <label>From City</label>
                                                  <select name=" <?php $output['name'] ?>">
                                                    <?php foreach($results as $output) {?>
                                                   
                                                    <option value = <?php $flightDetail["fromCityId"]?> ><?php echo $flightDetail["From City"]; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-5">
                                            <div class="form-group" style="width: 250px;">
                                                <label>Image</label>
                                                 <input type="file" value="img" name="img">
                                                  
                                            </div>
                                        </div>
                                        
                                      
                                        <div class="col-md-3" style="width: 300px;">
                                            <div class="form-group">
                                                <label>To City</label>
                                                <input type="text" name="toCity" class="form-control" placeholder="To..." value="<?php echo $flightDetail['To City'];  ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3" style="width: 80px;">
                                        <label style="padding-right:5px"> Available </label>
                                        <br>
                                        <input type="text" name="avalible" class="form-control" value="<?php echo $flightDetail['Available']; ?>">
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Airplane</label>
                                                <input name="planeId" type="text" placeholder="Airplane" class="form-control" value="<?php echo $flightDetail['Airplane']; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>CheckIn</label>l
                                                <input name="checkIn" type="datetime" class="form-control" placeholder="__/__/____" value="<?php echo $flightDetail['CheckIn']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Price</label>
                                                <input name="price" type="Text" class="form-control" placeholder="Price" value="<?php echo $flightDetail['Price']; ?>">
                                            </div>
                                        </div>
                                       <div class="col-md-3" style="width: 90px;">
                                       <label> isSale </label>
                                        <br>
                                        <input name="isSale" type="number" class="form-control" value="<?php echo $flightDetail['isSale']; ?>">
                                        </div>
                                       
                                     </div>
                                     <div class="row">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Created at</label>
                                                <input name="createdAt" type="datetime" class="form-control" placeholder="__/__/____" value="<?php echo $flightDetail['created At'];?>">
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Updated at</label>
                                                <input name="updatedAt" type="datetime" class="form-control" placeholder="__/__/____" value="<?php echo $flightDetail['update At'];?>">
                                            </div>
                                        </div>

                                     </div>

                                    <button name="submit" type="submit" class="btn btn-info btn-fill pull-right">Update Flights</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
				<div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                     <a href="#">
                                    <img class="avatar border-gray" src="assets/img/faces/face-3.jpg" alt="..."/>

                                      <h4 class="title"><?php echo $flightDetail['From City'] . " To " .  $flightDetail['To City']; ?><br />
                                         <small>michael24</small>
                                      </h4>
                                    </a>
                                </div>
                                <p class="description text-center"> "Lamborghini Mercy <br>
                                                    Your chick she so thirsty <br>
                                                    I'm in that two seat Lambo"
                                </p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button href="#" class="btn btn-simple"><i class="fa fa-facebook-square"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-twitter"></i></button>
                                <button href="#" class="btn btn-simple"><i class="fa fa-google-plus-square"></i></button>

                            </div>
                        </div>
                    </div>


					
