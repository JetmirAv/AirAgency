<?php 

include "../databaseConfig.php";


// Query Airplane 

$sqlPlane="select * from airplane where id=1;";


$planeStatement = $conn->prepare($sqlPlane);
$planeStatement -> execute();
$planeDetail = $planeStatement->fetchAll();



?> 
   
<?php
// Insert data for Airplane from form to database
//include "../databaseConfig.php";

//$insertAirplane="insert into airplane (name, yearOfProd, seats, fuelCapacity, maxspeed, additionalDesc) values (:name, :yearOfProd, :seats, :fuelCapacity, :maxspeed, :additionalDesc) ; ";
//
//$name = $_POST["name"];
//$yearOfProd = $_POST["yearOfProd"];
//$seats = $_POST["seats"];
//$fuelCapacity = $_POST["fuelCapacity"];
//$maxspeed = $_POST["maxspeed"];
//$additionalDesc = $_POST["additionaleDesc"];
////$img = $_POST['img'];
//
//
//
//$insertStm = $conn->prepare($insertAirplane);
//
//$pdoExec = $insertStm->execute(array(":name"=>$name,":yearOfProd"=>$yearOfProd,":seats"=>$seats,":fuelCapacity"=>$fuelCapacity,":maxspeed"=>$maxspeed,":additionalDesc"=>$additionalDesc));
//
//
//
////$insertStm->bindParam(':name',$name);
////$insertStm->bindParam(':yearOfProd',$yearOfProd);
////$insertStm->bindParam(':seats',$seats);
////$insertStm->bindParam(':fuelCapacity',$fuelCapacity);
////$insertStm->bindParam(':maxspeed',$maxspeed);
////$insertStm->bindParam(':additionaleDesc',$additionaleDesc);
////$insertStm->bindParam(':img',$img);
//
//$insertStm->execute();
//
//$conn = null;








//
//$msg ='';
//$result = false;
//
//if(isset($_POST['submit']))
//{    
//    require_once("../databaseConfig.php");
//    
//    $result = create_airplane();   
//    
//}
//else{echo "error";}
//
//
//function insert_airplane($name, $yearOfProd, $seats, $fuelCapacity, $maxspeed, $additionalDesc)
//{
//    global $conn, $msg;
//    
////    $insertAirplane="insert into airplane (name, yearOfProd, seats, fuelCapacity, maxspeed, additionalDesc) values(".$conn->quote($name).", ".$conn->quote($yearOfProd).", ".$conn->quote(seats).", ".$conn->quote($seats).", ".$conn->quote(fuelCapacity).", ".$conn->quote(maxspeed).", ".$conn->quote(additionalDesc)." );";
//    
//    
//    $name = $_POST['name'];
//    $yearOfProd = $_POST['yearOfProd'];
//    $seats = $_POST['seats'];
//    $fuelCapacity = $_POST['fuelCapacity'];
//    $maxspeed = $_POST['maxspeed'];
//    $additionalDesc = $_POST['additionalDesc'];
//    
//    $insertStm = $conn->prepare("insert into airplane (name, yearOfProd, seats, fuelCapacity, maxspeed, additionalDesc) values (:name, :yearOfProd, :seats, :fuelCapacity, :maxspeed, :additionalDesc)");
//    
////    $insertAirplane="insert into airplane (name, yearOfProd, seats, fuelCapacity, maxspeed, additionalDesc) values (:name, :yearOfProd, :seats, :fuelCapacity, :maxspeed, :additionalDesc) ; ";
//    
//    $insertStm->bindParam(':name',$name);
//    $insertStm->bindParam(':yearOfProd',$yearOfProd);
//    $insertStm->bindParam(':seats',$seats);
//    $insertStm->bindParam(':fuelCapacity',$fuelCapacity);
//    $insertStm->bindParam(':maxspeed',$maxspeed);
//    $insertStm->bindParam(':additionalDesc',$additionalDesc);
//    
//    $insertStm->execute();
//    
//    if($conn->exec($insertAirplane)===false)
//    {
//        $msg = 'Error inserting the airplane';
//        return false;}
//    else
//    {
//        $msg = "The new airplane $name is created";
//        return true;
//    }
//    
//}
//
//
//
//
//
//
//

//include "dbConfig.php";
//
//try{
//    $conn = new PDO("mysql:host=". HOST . ";dbname=" . DBNAME, USERNAME, PASSWORD);
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//    $name = $_POST['name'];
//    $yearOfProd = $_POST['yearOfProd'];
//    $seats = $_POST['seats'];
//    $fuelCapacity = $_POST['fuelCapacity'];
//    $maxspeed = $_POST['maxspeed'];
//    $additionalDesc = $_POST['additionalDesc'];
//    $img = $_POST['img'];
//    
//    $stm = $conn->prepare("insert into airplane (name, yearOfProd, seats, fuelCapacity, maxspeed, additionalDesc,img) values (:name, :yearOfProd, :seats, :fuelCapacity, :maxspeed, :additionalDesc,:img) ;");
//    
//    $stm->bindParam(':name',$name);
//    $stm->bindParam(':yearOfProd',$yearOfProd);
//    $stm->bindParam(':seats',$seats);
//    $stm->bindParam(':fuelCapacity',$fuelCapacity);
//    $stm->bindParam(':maxspeed',$maxspeed);
//    $stm->bindParam(':additionalDesc',$additionalDesc);    
//    $stm->bindParam(':img',$img);
//    
//    $stm->execute();
//    
//    echo "Connection successfully";
//    
//}
//catch(PDOException $ex) {
//    echo "Datebase Connection failed: " . $ex->getMessage();
//}
//
//$conn = null;
//
//



?>     
   
                                             
<?php
//$servername = 'localhost';
//$username = "root";
//$password = "";
//$database = 'airagency';
////include "../databaseConfig.php";
//
//try{
//   
//    $conn = new PDO("mysql:host=localhost;dbname=airagency", $username, $password);
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//    $name = $_POST['name'];
//    $yearOfProd = $_POST['yearOfProd'];
//    $seats = $_POST['seats'];
//    $fuelCapacity = $_POST['fuelCapacity'];
//    $maxspeed = $_POST['maxspeed'];
//    $additionalDesc = $_POST['additionalDesc'];
//    $img = $_POST['img'];
//    
//    
//    $updatePlane = "update airplane set namr = :name, yearOfProd = :yearOfProd, seats = :seats, fuelCapacity = :fuelCapacity, maxspeed = :maxspeed, additionalDesc = :additionalDesc, img = :img where id = 105;";
//    $updateStm = $conn->prepare($updatePlane);
//    $pdoExec = $updateStm->execute(array(":name"=>$name,":yearOfProd"=>$yearOfProd,":seats"=>$seats,":fuelCapacity"=>$fuelCapacity,":maxspeed"=>$maxspeed,":additionalDesc"=>$additionalDesc,":img"=>$img));
//    
//        echo "Connection successfully";
//    
//}
//catch(PDOException $ex) {
//    echo "Datebase Connection failed: " . $ex->getMessage();
//}
//
//$conn = null;
        

?>                                                                                       
                                                                                                                                 
                                                                                                                                                                                                                     
    <?php foreach($planeDetail as $planeDt){ ?>                  
                <div class="col-md-8">
					<div class="card">
                            <div class="header">
                                <h4 class="title">Edit Airplane</h4>
                            </div>
                            <div class="content">
<!--                            <form action="components/dashboard/insertAirplane.php" method="POST">-->
                               <form action="components/dashboard/updateAirplane.php" method="POST">
<!--                                <form action="components/dashboard/deleteAirplane.php" method="POST">-->
                                    <div class="row" style="margin-left:25%">
                                        <div class="col-md-5">
                                            <div class="form-group" style="width: 250px;">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control"  placeholder="Name" value="<?php echo $planeDt['name'];?>"> 
                                            </div>
                                        </div>
                                    </div>
                                        <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group" style="width:120px;">
                                                <label>Year Of Produce</label>
                                                <input type="Text" name="yearOfProd" class="form-control" placeholder="Year" min="1800" style="width: 120px; padding-right:20" value="<?php echo $planeDt['yearOfProd'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                        <label style="padding-right:5px ; padding-left:-10px;"> Seats </label>
                                        <input type="Text" name="seats" class="form-control" placeholder="Seats" value="<?php echo $planeDt['seats'];?>"> 
                                        </div>
                                    
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Fuel Capacity</label>
                                                <input type="Text" name="fuelCapacity" placeholder="Fuel Capacity" class="form-control" value="<?php echo $planeDt['fuelCapacity'];?>" style="width: 150px;">
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="width:150px;">
                                            <div class="form-group">
                                                <label>Max Speed</label>l
                                                <input type="Text" name="maxspeed" class="form-control" placeholder="Max speed" value="<?php echo $planeDt['maxspeed'];?>" style="width: 150px;">
                                            </div>
                                             <div class="form-group">
                                                <label>Image</label>l
                                                <input type="file" name="img" class="form-control" placeholder="Image" value="img" style="width: 150px;">
                                            </div>
                                        </div>
                                    </div>
                                    
<!--
                                    <div class="row" style="margin-left:23.5%">
                                       
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Created at</label>
                                                <input type="datetime" class="form-control" placeholder=" __/__/____" value="<?php echo $planeDt['createdAt'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Updated at</label>
                                                <input type="datetime" class="form-control" placeholder="__/__/____" value="<?php echo $planeDt['updatedAt'];?>" >
                                            </div>
                                        </div>
                                     </div>
-->
                                     <div class="row" style="padding-left:18px; padding-right:18px; padding-bottom:10px">
                                     <label>AdditionalDesc</label>
                                     <textarea rows="5" name="additionalDesc" class="form-control" placeholder="Here can be your description"><?php echo $planeDt['additionalDesc']; ?></textarea>   
                                     </div>

                                    <button type="submit" value="submit" class="btn btn-info btn-fill pull-right">Update Flights</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
					</div>
					
					<div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img  src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..." />
                            </div>
                            <div class="content">
                                <div class="author">
                                     <a href="#">
                                    <img class="avatar border-gray" src="assets/img/faces/face-3.jpg" alt="..."/>

                                      <h4 class="title"><?php echo $planeDt['name'];?><?php } ?><br />
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