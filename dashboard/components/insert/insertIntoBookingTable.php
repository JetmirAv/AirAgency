<?php
include '../../../databaseConfig.php';

$nrTickets=(int)$_POST['quantity'];
$userId=(int)$_POST['userConectedId'];

session_start();
$_SESSION['InsertSucess'] = null;
$_SESSION['insertQuantityError'] = null;
$_SESSION['insertCardError'] = null;


$countCards = "select  count(*) as count  from card where userId = ".$userId." ";
$getStmForCards = $conn->prepare($countCards);
$getStmForCards -> execute();
$count = $getStmForCards->fetch();
$numberOfTickets=$count['count'];
 

if($numberOfTickets>0){
       if($nrTickets>0){
       $flightId =(int) $_POST['flightId'];
       
       
       $getData = "select  price  from flight where id = ".$flightId." ";
       $getStm = $conn->prepare($getData);
       $getStm -> execute();
       $data = $getStm->fetch();
       
       
       $flightPrice=$data['price'];
       
       $insertBooked = "insert into booked (flightId,userId,price,quantity) values (:flightId,:userId,:price,:quantity);";
       $insertStatement = $conn->prepare($insertBooked);
       $pdoExecute = $insertStatement -> execute(array(":flightId"=>$flightId,":userId"=>$userId,":price"=>$flightPrice,":quantity"=>$nrTickets));
       	//$_SESSION['InsertSucess']= 
		   echo "You have bought ".$nrTickets." tickets";
       
	   }
       else{
       //	$_SESSION['insertQuantityError']= "Chose number of Tickets";
       echo "Chose number of Tickets";
	   }
 }
else{
//$_SESSION['insertCardError']= 
	echo "You don't have a card. Want to <a href='profile.php'>add</a> one";
}

?>
