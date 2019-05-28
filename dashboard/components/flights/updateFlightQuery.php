     



<?php
$servername = 'localhost';
$username = "root";
$password = "";
$database = 'airagency';
//include "../../../databaseConfig.php";

try{
   
    $conn = new PDO("mysql:host=localhost; dbname=airagency", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if(isset($_POST['updateFlight']))
{
    
    
    $fromCity =(int)trim($_POST['fromCity']);
    $toCity = (int)trim($_POST['toCity']);
    $planeId = (int)trim($_POST['planeId']);
    $avalible = (int)trim($_POST['avalible']);
    $price = floatval($_POST['price']);
    $isSale = (int)trim($_POST['isSale']);
    $checkIn = date(trim($_POST['checkIn']));
    $img = $_POST['img'];
//    $updatedAt = $_POST['updatedAt'];
    echo $fromCity;
    
    $updateFlight = " Update flight set  fromCity = '$fromCity', toCity = '$toCity',planeId = '$planeId', avalible = '$avalible', price = '$price', isSale = '$isSale', checkIn = '$checkIn' , img = '$img', updatedAt=NOW() where id = '101'    and (fromCity in(select id from city where name='$fromCity') and toCity in (select id from city where name= '$toCity')); ";
    $updateStm = $conn->prepare($updateFlight);
    print_r($updateFlight);
    $pdoExec = $updateStm->execute(array(":fromCity"=>$fromCity,":toCity"=>$toCity, "planeId"=>$planeId,  ":avalible"=>$avalible,":price"=>$price,":isSale"=>$isSale, ":checkIn"=>$checkIn, ":img"=>$img));
    
    
    
    
    
    
    
//    $updateFlight = " Update flight set  fromCity = '$fromCity, toCity = :toCity,planeId = :planeId, avalible = :avalible, price = :price, isSale = :isSale, checkIn = :checkIn, img = :img, updatedAt=NOW() where id = 101 and (fromCity in(select id from city where name=:fromCity) or toCity in (select id from city where name= :toCity)); ";
    
    
        echo "Connection successfully";
    
}
    
}
catch(PDOException $ex) {
    echo "Datebase Connection failed: " . $ex->getMessage();
}

$conn = null;
        

?>   
 