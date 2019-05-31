<?php 
include "../databaseConfig.php";

// Query Flights
if (isset($_GET['id'])){
   $id = $_GET['id'];


 
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
WHERE f.id=".$id.";";
$flightStatement = $conn->prepare($sqlFlight);
$flightStatement->execute();
$flightDetail = $flightStatement->fetch(); 
?>
               
<?php 
//include "../databaseConfig.php";
$allCities = "select id,name from city order by name ; ";
$cityStm = $conn->prepare($allCities);
$cityStm->execute();
$results = $cityStm->fetchAll();



?>

   <?php 
//include "../databaseConfig.php";
$allPlanes = "select id,name from airplane order by name ; ";
$planeStm = $conn->prepare($allPlanes);
$planeStm->execute();
$planeResults = $planeStm->fetchAll();

?>           
              

    
                <div class="col-md-8">
					 <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Flights</h4>
                            </div>
                            <div class="content">
<!--                                <form action="components/dashboard/insertFlight.php" method="post">-->
                                   <form action="../dashboard/components/flights/updateFlightQuery.php" method="POST" >
                                    <div class="row">
<!--
                                        <div class="col-md-5">
                                            <div class="form-group" style="width: 250px;">
                                                <label>From City</label>
                                                <input type="Text" name="fromCity"  class="form-control"  placeholder="From..." value="<?php //echo $flightDetail['fromCity'];  ?> ">
                                            </div>
                                        </div>
-->

                                           <div class="col-md-5">
                                            <div class="form-group" style="width: 250px;">
                                               
                                               <?php //echo $flightDetail['toCity']?>
                                                <label>From City</label>      
                                                  <select name="fromCity">

                                                    <?php foreach($results as $output) 
                                                        {
                                                           if($output['id']==$flightDetail['fromCity'])
                                                           {
                                                               ?>

                                                                <option value = "<?php echo $flightDetail['fromCityId'] ?>" selected >
                                                                        <?php  echo $flightDetail['From City']; ?>
                                                                    </option>
                                                           <?php 
                                                           }

                                                            ?>

                                                            <option value = "<?php echo $output['id']?> selected">
                                                            <?php  echo $output['name']; ?></option>

                                                           <?php 
                                                        }
                                                       
                                                      ?>
                                                   
                                                </select>
                                            </div>
                                        </div>
                                        
                                               <div class="col-md-5">
                                            <div class="form-group" style="width: 250px;">
                                               
                                                <?php //echo $flightDetail['toCity'];?>
                                                <label>To City</label>      
                                                  <select name="toCity">
                                                    <?php foreach($results as $output) 
                                                        {
                                                           if($output['id']==$flightDetail['toCity'])
                                                           {
                                                               ?>
                                                               <option value = "<?php echo $flightDetail['toCityId']?> " selected >
                                                                        <?php  echo $flightDetail['To City']; ?>
                                                                </option>
                                                           <?php 
                                                           }

                                                            ?>
                                                            <option value = "<?php echo $output['id']?> selected ">
                                                            <?php  echo $output['name']; ?></option>
                                                           <?php 
                                                        }
                                                       
                                                      ?>
                                                   
                                                </select>
                                            </div>
                                        </div>
                                        
                                        
                                      
<!--
                                        <div class="col-md-3" style="width: 300px;">
                                            <div class="form-group">
                                                <label>To City</label>
                                                <input type="text" name="toCity" class="form-control" placeholder="To..." value="<?php echo $flightDetail['To City'];  ?>">
                                            </div>
                                        </div>
-->
                                  

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
<!--
                                                <label>Airplane</label>
                                                <input name="planeId" type="text" placeholder="Airplane" class="form-control" value="<?php //echo $flightDetail['Airplane']; ?>">
-->
                                                
                                                
                                                 <div class="col-md-5">
                                            <div class="form-group" style="width: 250px;">
                                               
                                               <?php //echo $flightDetail['fromCity']?>
                                                <label>Airplane</label>      
                                                  <select name="planeId">
                                                    <?php foreach($planeResults as $planeOutput) 
                                                        {
                                                           if($planeOutput['id']==$flightDetail['planeId'])
                                                           {
                                                               ?>
                                                                <option value = "<?php echo $flightDetail['airplaneId']?> " selected >
                                                                        <?php  echo $flightDetail['AirplaneName']; ?>
                                                                </option>
                                                           <?php 
                                                           }

                                                            ?>
                                                            <option value = "<?php echo $planeOutput['id']?> selected ">
                                                            <?php  echo $planeOutput['name']; ?></option>
                                                           <?php 
                                                        }
                                                       
                                                      ?>
                                                   
                                                </select>
                                            </div>
                                        </div>
                                                
                                                
                                                
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
                                             <div class="col-md-3" style="width: 80px;">
                                        <label style="padding-right:5px"> Available </label>
                                        <br>
                                        <input type="text" name="avalible" class="form-control" value="<?php echo $flightDetail['Available']; ?>">
                                        </div>
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
                                          <div class="col-md-5">
                                            <div class="form-group" style="width: 250px;">
                                                <label>Image</label>
                                                 <input type="file" value="img" name="img">
                                                  
                                            </div>
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
                                      

                                    <button name="updateFlight" type="submit" class="btn btn-info btn-fill pull-right">Update Flights</button>
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

<?php }
else {
	echo "Click on one flight first";
}
					?>
