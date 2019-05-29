<?php


include "../../../databaseConfig.php";
    

try{
//    $conn = new PDO("mysql:host=localhost;dbname=airagency", $username, $password);
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $errors = Array();
    if(isset($_POST['insertAirplane']))
{
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
    
 //   echo "Connection successfully";
        
        
        
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