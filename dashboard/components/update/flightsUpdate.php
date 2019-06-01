<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<?php 
include "../databaseConfig.php";

// Query Flights
//if (isset($_GET['id'])){
//   $id = $_GET['id'];
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
f.img as 'img'
FROM flight f INNER JOIN city c1 
ON f.fromCity = c1.id
INNER JOIN city c2 
ON f.toCity=c2.id
INNER JOIN Airplane a 
ON f.planeId=a.id
WHERE f.id=".$id."";
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
              

    
                <div class="col-md-8" style="margin-left:15%;">
					 <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Flights</h4>
                            </div>
                            <div class="content">
<!--                                <form action="components/dashboard/insertFlight.php" method="post">-->
                                   <form action="../dashboard/components/flights/updateFlightQuery.php" method="POST" >
                                   
                          <div class="row" style="margin-left:300px;">
                            <div class="form-group" style="display: inline-block; margin-left: auto; margin-right:auto">
                        <!-- <label  id="inputlabel" for="form-img">Profile picture</label> -->
                        <input style="position: fixed; top:-100%; left: -100%" id="profileUpload" onchange="readURL(this)" type="file" name="img">
                        <img style="height:150px; width:150px;" id="profileImg" alt="profile" class="avatar"  src="../../AirAgency/uploads/flight-img/<?php echo $flightDetail['img'];?>" onclick="clicked(this)" />
                        </div>
                           </div>
                                   
                                   
                                   
                                   
                                    <div class="row" style="margin-left:15%">

                                           <div class="col-md-5" >
                                            <div class="form-group" style="width: 250px;">
                                               
                                                <label>From City</label>      
                                                  <select name="fromCity"  class="btn btn-default dropdown-toggle">

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
                                               
                                                <label>To City</label>      
                                                  <select name="toCity" class="btn btn-default dropdown-toggle">
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
                                            
                                        
                                    </div>

                                    <div class="row" style="margin-left:35%">
                                      
                                                
                                                 <div class="col-md-5"  >
                                            <div class="form-group" style="width: 250px;" >
                                               
                                                <label>Airplane</label>      
                                                  <select name="planeId" class="btn btn-default dropdown-toggle">
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
                                    
                                    
                                    
                                    
                                    <div class="row" style="margin-left:10%">
                                             <div class="col-md-4">
                                            <div class="form-group">
                                                <label>CheckIn</label>l
                                                <input name="checkIn" type="datetime" class="form-control" placeholder="__/__/____" value="<?php echo $flightDetail['CheckIn']; ?>">
                                            </div>
                                        </div>
                                            
                                            
                                             <div class="col-md-4" style="width: 80px;">
                                        <label style="padding-right:5px"> Available </label>
                                        <br>
                                        <input type="text" name="avalible" class="form-control" value="<?php echo $flightDetail['Available']; ?>">
                                        </div>
                                        
                                         <div class="col-md-4" style="width: 90px;">
                                       <label> isSale </label>
                                        <br>
                                        <input name="isSale" type="number" class="form-control" value="<?php echo $flightDetail['isSale']; ?>">
                                        </div>
                                        
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Price</label>
                                                <input name="price" type="Text" class="form-control" placeholder="Price" value="<?php echo $flightDetail['Price']; ?>">
                                            </div>
                                        </div>
                                         
                                     </div>
                                     <div class="row" style="margin-left:20%;">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Created at</label>
                                                <input disabled name="createdAt" type="datetime" class="form-control" placeholder="__/__/____" value="<?php echo $flightDetail['created At'];?>">
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Updated at</label>
                                                <input disabled name="updatedAt" type="datetime" class="form-control" placeholder="__/__/____" value="<?php echo $flightDetail['update At'];?>">
                                            </div>
                                        </div>

                                     </div>
                                      
                                      	<div class="row" style="margin-right:290px;">
                                    <button name="updateFlight" id="clickButton" value="<?php echo $id ?>" type="submit" class="btn btn-info btn-fill pull-right">Update Flight</button>
                                    <div class="clearfix" ></div>
                                </div>
                                      

<!--
                                    <button name="updateFlight" type="submit" class="btn btn-info btn-fill pull-right">Update Flights</button>
                                    <div class="clearfix"></div>
-->
                                </form>
                            </div>
                        </div>
                    </div>
			  <?php      }
			        else{
			        echo "choose one row"; 
			        
			        }

?>

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

				

