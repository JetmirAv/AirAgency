<?php
// Insert data for Airplane from form to database
//require_once("../databaseConfig.php");
//if(isset($_POST['submit'])){
//$insertAirplane="insert into airplane (name, yearOfProd, seats, fuelCapacity, maxspeed, additionalDesc) values (:name, :yearOfProd, :seats, :fuelCapacity, :maxspeed, :additionalDesc) ; ";
//
//$name = $_POST["name"];
//$yearOfProd = $_POST["yearOfProd"];
//$seats = $_POST["seats"];
//$fuelCapacity = $_POST["fuelCapacity"];
//$maxspeed = $_POST["maxspeed"];
//$additionalDesc = $_POST["additionalDesc"];
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
//}
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
//    $insertAirplane="insert into airplane (name, yearOfProd, seats, fuelCapacity, maxspeed, additionalDesc) values(".$conn->quote($name).", ".$conn->quote($yearOfProd).", ".$conn->quote(seats).", ".$conn->quote($seats).", ".$conn->quote(fuelCapacity).", ".$conn->quote(maxspeed).", ".$conn->quote(additionalDesc)." );";
//    
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
    
    

$servername = 'localhost';
$username = "root";
$password = "";
$database = 'airagency';
try{
     $conn = new PDO("mysql:host=localhost;dbname=airagency", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $name = $_POST['name'];
    $yearOfProd = $_POST['yearOfProd'];
    $seats = $_POST['seats'];
    $fuelCapacity = $_POST['fuelCapacity'];
    $maxspeed = $_POST['maxspeed'];
    $additionalDesc = $_POST['additionalDesc'];
    $img = $_POST['img'];
    
//    $stm = $conn->prepare("insert into airplane (name, yearOfProd, seats, fuelCapacity, maxspeed, additionalDesc,img) values (:name, :yearOfProd, :seats, :fuelCapacity, :maxspeed, :additionalDesc,:img) ;");
    
    $insertPlane = "insert into airplane (name, yearOfProd, seats, fuelCapacity, maxspeed, additionalDesc,img) values (:name, :yearOfProd, :seats, :fuelCapacity, :maxspeed, :additionalDesc,:img) ;";
    $insertStm = $conn->prepare($insertPlane);
    $pdoExec = $insertStm->execute(array(":name"=>$name,":yearOfProd"=>$yearOfProd,":seats"=>$seats,":fuelCapacity"=>$fuelCapacity,":maxspeed"=>$maxspeed,":additionalDesc"=>$additionalDesc,":img"=>$img));
    
//    $stm->bindParam(':name',$name);
//    $stm->bindParam(':yearOfProd',$yearOfProd);
//    $stm->bindParam(':seats',$seats);
//    $stm->bindParam(':fuelCapacity',$fuelCapacity);
//    $stm->bindParam(':maxspeed',$maxspeed);
//    $stm->bindParam(':additionalDesc',$additionalDesc);    
//    $stm->bindParam(':img',$img);
    
//    $stm->execute();
    
    echo "Connection successfully";
    
}
catch(PDOException $ex) {
    echo "Datebase Connection failed: " . $ex->getMessage();
}

$conn = null;



    





































?> 