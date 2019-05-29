<?php
include '../../../databaseConfig.php';

$nrTickets=(int)$_POST['quantity'];

if($nrTickets>0){
$flightId =(int) $_POST['flightId'];
$userId=(int)$_POST['userConectedId'];


$getData = "select  price  from flight where id = ".$flightId." ";
$getStm = $conn->prepare($getData);
$getStm -> execute();
$data = $getStm->fetch();


$flightPrice=$data['price'];
echo  $flightPrice;

$insertBooked = "insert into booked (flightId,userId,price,quantity) values (:flightId,:userId,:price,:quantity);";
$insertStatement = $conn->prepare($insertBooked);
$pdoExecute = $insertStatement -> execute(array(":flightId"=>$flightId,":userId"=>$userId,":price"=>$flightPrice,":quantity"=>$nrTickets));
}
else{
	echo "Choose number of tickets";
}

?>
