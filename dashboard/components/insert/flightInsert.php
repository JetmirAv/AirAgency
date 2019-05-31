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
            <form action="../dashboard/components/flights/insertFlightQuery.php" method="post">
               
                      <div class="row" style="margin-left:40%;">
                            <div class="form-group" style="display: inline-block; margin-left: auto; margin-right:auto">
                        <!-- <label  id="inputlabel" for="form-img">Profile picture</label> -->
                        <input style="position: fixed; top:-100%; left: -100%" id="profileUpload" onchange="readURL(this)" type="file" name="img">
                        <img style="height:150px; width:150px;" id="profileImg" alt="profile" class="avatar"  src="../../AirAgency/uploads/flight-img/<?php echo $flightDetail['img'];?>" onclick="clicked(this)" />
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
                           
                                         <?php foreach($planeResults as $planeOutput) { ?>
                                                
                                                <option value = "<?php echo $planeOutput['id']?> ">
                                                <?php  echo $planeOutput['name']; ?></option>

                                              <?php } ?>
                           
                           
                       </select>
                        </div>
                    </div>
                
                    
                </div>
                <div class="row" style="margin-left:8%;">
                       <div class="col-md-4">
                        <div class="form-group">
                            <label>CheckIn</label>l
                            <input name="checkIn" type="datetime" class="form-control" placeholder="__/__/____">
                        </div>
                    </div>
                     <div class="col-md-4" style="width: 80px;">
                        <label style="padding-right:5px"> Available </label>
                        <br>
                        <input type="text" name="avalible" class="form-control">
                    </div>
               
                    <div class="col-md-4" style="width: 90px;">
                        <label> isSale </label>
                        <br>
                        <input name="isSale" type="number" class="form-control">
                    </div>
                         <div class="col-md-4">
                        <div class="form-group">
                            <label>Price</label>
                            <input name="price" type="number" class="form-control" placeholder="Price">
                        </div>
                    </div>

                </div>
                

                <button name="insertFlight" type="submit" class="btn btn-info btn-fill pull-right">Insert Flight</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>
<!--
<div class="col-md-4">
    <div class="card card-user">
        <div class="image">
            <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..." />
        </div>
        <div class="content">
            <div class="author">
                <a href="#">
                    <img class="avatar border-gray" src="assets/img/faces/face-3.jpg" alt="..." />

                    <h4 class="title">
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
</div>-->





<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#profileImg')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(150);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    function clicked() {
        $("#profileUpload").click()
    }
</script>    





