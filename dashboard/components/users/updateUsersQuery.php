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
    $gendre = $_POST['gendre'];
    $img = $_POST['img'];
    $birthday=$_POST['birthday'];
    $number = $_POST['number'];
//    $updatedAt = $_POST['updatedAt'];
    
    
    $updatePlane = "update users set firstname = :firstname, lastname = :lastname, email = :email, password = :password, birthday = :birthday, gendre = :gendre, address=:address city=:city , state=:state , postal=:postal , phoneNumber=:phoneNumber, img = :img, updatedAt = NOW() where id = 10;";
    $updateStm = $conn->prepare($updatePlane);
    $pdoExec = $updateStm->execute(array(":firstname"=>$firstname,":lastname"=>$lastname,":email"=>$email,":password"=>$password,":birthday"=>$birthday,":gendre"=>$gendre,":address"=>$address,":city"=>$city,":state"=>$state,":postal"=>$postal,":phoneNumber"=>$phoneNumber,":img"=>$img));
    
    $updateCard = "update card set number=:number , updatedAt = NOW() where id=10;";
    $updateCardStm = $conn->prepare($updateCard);
    $pdoExecCard = $updateCardStm->execute(array(":number"=>$number)); 
    
        echo "Connection successfully";
    
}
catch(PDOException $ex) {
    echo "Datebase Connection failed: " . $ex->getMessage();
}

$conn = null;
        

?>         