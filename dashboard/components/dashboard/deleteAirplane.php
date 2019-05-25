<?php
$servername = 'localhost';
$username = "root";
$password = "";
$database = 'airagency';
//include "../databaseConfig.php";

try{
   
    $conn = new PDO("mysql:host=localhost;dbname=airagency", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_POST['id'];
    
    
    $updatePlane = "delete from airplane where id = 105";
    $updateStm = $conn->prepare($updatePlane);
    $pdoExec = $updateStm->execute(array(":id"=>$id));
    
        echo "Connection successfully";
    
}
catch(PDOException $ex) {
    echo "Datebase Connection failed: " . $ex->getMessage();
}

$conn = null;
        

?>   