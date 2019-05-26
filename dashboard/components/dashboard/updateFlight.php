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
    //$planeId = $_POST['planeId'];
    $avalible = $_POST['avalible'];
    $price = $_POST['price'];
    $isSale = $_POST['isSale'];
    $checkIn = $_POST['checkIn'];
//    $img = $_POST['img'];
//    $updatedAt = $_POST['updatedAt'];
    
    
    $updateFlight = " Update flight set  fromCity = :fromCity, toCity = :toCity, avalible = :avalible, price = :price, isSale = :isSale, checkIn = :checkIn, updatedAt=NOW() where id = 100";
    $updateStm = $conn->prepare($updateFlight);
    $pdoExec = $updateStm->execute(array(":fromCity"=>$fromCity,":toCity"=>$toCity, ":avalible"=>$avalible,":price"=>$price,":isSale"=>$isSale, ":checkIn"=>$checkIn));
    
        echo "Connection successfully";
    
}
catch(PDOException $ex) {
    echo "Datebase Connection failed: " . $ex->getMessage();
}

$conn = null;
        

?>         