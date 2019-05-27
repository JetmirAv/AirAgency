<?php
$servername = 'localhost';
$username = "root";
$password = "";
$database = 'airagency';
//include "../databaseConfig.php";

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
//    $updatedAt = $_POST['updatedAt'];
    
    
    $updatePlane = "update airplane set name = :name, yearOfProd = :yearOfProd, seats = :seats, fuelCapacity = :fuelCapacity, maxspeed = :maxspeed, additionalDesc = :additionalDesc, img = :img, updatedAt = NOW() where id = 104;";
    $updateStm = $conn->prepare($updatePlane);
    $pdoExec = $updateStm->execute(array(":name"=>$name,":yearOfProd"=>$yearOfProd,":seats"=>$seats,":fuelCapacity"=>$fuelCapacity,":maxspeed"=>$maxspeed,":additionalDesc"=>$additionalDesc,":img"=>$img));
    
        echo "Connection successfully";
    
}
catch(PDOException $ex) {
    echo "Datebase Connection failed: " . $ex->getMessage();
}

$conn = null;
        

?>         