<?php
//$servername = 'localhost';
//$username = "root";
//$password = "";
//$database = 'airagency';
include "../../../databaseConfig.php";

try{
   
//    $conn = new PDO("mysql:host=localhost;dbname=airagency", $username, $password);
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$errors = Array();
if(isset($_POST['insertFlight']))
{    
    
    $fromCity =$_POST['fromCity'];
    $toCity = trim($_POST['toCity']);
    $planeId =trim($_POST['planeId']);
    $avalible =trim($_POST['avalible']);
    $price = $_POST['price'];
    $isSale =trim($_POST['isSale']);
    $checkIn =trim($_POST['checkIn']);
    $img = $_POST['img'];
    //$updatedAt = $_POST['updatedAt'];
 
    
    
    $insertFlight = " insert into flight (fromCity, toCity, planeId, avalible, price, isSale, checkIn,img) values ($fromCity,  $toCity, $planeId, '$avalible', '$price', '$isSale', '$checkIn', '$img');";
    $insertStm = $conn->prepare($insertFlight);
    $pdoExec = $insertStm->execute(array("$fromCity"=>'$fromCity', ":toCity"=>'$toCity', ":planeId"=>'$planeId',  ":avalible"=>$avalible, ":price"=>$price, ":isSale"=>$isSale, ":checkIn"=>$checkIn, ":img"=>$img));
    
//        print_r($insertFlight);
//        echo "Inserted successfully";
    
            if($errors)
        {
            $msg = 'gabim';
            array_push($errors, $msg);
            $_POST['error'] = $errors;
        }
        else
        {
            header("location: ". $_SERVER["HTTP_REFERER"]);
            $_POST['sukses'] = "Sukses";
        }
    
    
}
}
catch(PDOException $ex) {
    echo "Datebase Connection failed: " . $ex->getMessage();
}

$conn = null;
        

?>         