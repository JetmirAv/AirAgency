<?php
$servername = 'localhost';
$username = "root";
$password = "";
$database = 'airagency';
//include "../databaseConfig.php";

try{
   
    $conn = new PDO("mysql:host=localhost;dbname=airagency", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postal = $_POST['postal'];
    $phoneNumber = $_POST['phoneNumber'];
    $gender = $_POST['gender'];
    $img = $_POST['img'];
//    $updatedAt = $_POST['updatedAt'];
    
    
    $updatePlane = "update users set firstname = :firstname, lastname = :lastname, email = :email, password = :password, birthday = :birthday, gender = :gender, img = :img, updatedAt = NOW() where id = 104;";
    $updateStm = $conn->prepare($updatePlane);
    $pdoExec = $updateStm->execute(array(":name"=>$name,":yearOfProd"=>$yearOfProd,":seats"=>$seats,":fuelCapacity"=>$fuelCapacity,":maxspeed"=>$maxspeed,":additionalDesc"=>$additionalDesc,":img"=>$img));
    
        echo "Connection successfully";
    
}
catch(PDOException $ex) {
    echo "Datebase Connection failed: " . $ex->getMessage();
}

$conn = null;
        

?>         