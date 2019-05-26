<?php
$servername = 'localhost';
$username = "root";
$password = "";
$database = 'airagency';
//include "../databaseConfig.php";

try{
   
    $conn = new PDO("mysql:host=localhost;dbname=airagency", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $fromCity = $_POST['fromCity'];
    $toCity = $_POST['toCity'];
    $planeId = $_POST['planeId'];
    $avalible = $_POST['avalible'];
    $price = $_POST['price'];
    $isSale = $_POST['isSale'];
    $checkIn = $_POST['checkIn'];
    $img = $_POST['img'];
    //$updatedAt = $_POST['updatedAt'];
    
    
    $insertFlight = " insert into flight (fromCity, toCity, planeId, avalible, price, isSale, checkIn,img) values (:fromCity, :toCity, :planeId, :avalible, :price, :isSale, :checkIn,:img);";
    $insertStm = $conn->prepare($insertFlight);
    $pdoExec = $insertStm->execute(array(":fromCity"=>$fromCity,":toCity"=>$toCity, ":planeId"=>$planeId,  ":avalible"=>$avalible,":price"=>$price,":isSale"=>$isSale, ":checkIn"=>$checkIn, ":img"=>$img));
    
        echo "Connection successfully";
    
}
catch(PDOException $ex) {
    echo "Datebase Connection failed: " . $ex->getMessage();
}

$conn = null;
        

?>         