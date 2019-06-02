<?php
session_start();
include '../../../databaseConfig.php';
include '../../../global/getDataJWT.php';
include '../../../global/validations.php';


$getToken=getDataJWT($_SESSION['token']);
$userId=$getToken->id;
$userRole = $getToken->role;



if($userRole != 1){

	
	$nrTickets=(int)$_POST['quantity'];
	$flightId =(int) $_POST['flightId'];
	
	
	
	$countCards = "select  count(*) as count  from card where userId = ".$userId." ";
	$getStmForCards = $conn->prepare($countCards);
	$getStmForCards -> execute();
	$count = $getStmForCards->fetch();
	$numberOfCards=$count['count'];
	 
	
	$countAvalibleSeats = "select avalible ,checkIn  from flight where id = ".$flightId." ";
	$getStmForAvalibleSeats = $conn->prepare($countAvalibleSeats);
	$getStmForAvalibleSeats -> execute();
	$seats = $getStmForAvalibleSeats->fetch();
	$numberOfSeatsAvaliable=$seats['avalible'];
	$bookDateFromDatabase=$seats['checkIn'];
	
	
	if( check_date($bookDateFromDatabase)){
		//Check if number of tickets is larger than 0
		if($nrTickets>0){
	
			//Check if number of sets avalible is larger or equal than number of tickets 
			if($nrTickets<=$numberOfSeatsAvaliable){
	
				 //Check if user has card to pay
				if($numberOfCards>0){
					$getData = "select (f.price-(isSale/100*f.price)) as 'price'  from flight f where id = ".$flightId." ";
					$getStm = $conn->prepare($getData);
					$getStm -> execute();
					$data = $getStm->fetch();
	
	
					$flightPrice=$data['price'];
	
					$insertBooked = "insert into booked (flightId,userId,price,quantity) values (:flightId,:userId,:price,:quantity);";
					$insertStatement = $conn->prepare($insertBooked);
					$pdoExecute = $insertStatement -> execute(array(":flightId"=>$flightId,":userId"=>$userId,":price"=>$flightPrice,":quantity"=>$nrTickets));
					
					$update ="update  flight set  avalible=avalible - ".$nrTickets." where id=".$flightId."";
					$updateAvalible = $conn->prepare($update);
					$updateAvalible->execute();
					
					echo "You have bought ".$nrTickets." tickets    <br>Price: ".$nrTickets*$flightPrice."";
				}
				else{
					echo "You don't have a card. Want to <a href='profile.php'>add</a> one";
					}
			}
			else{
				echo "We have only ".$numberOfSeatsAvaliable." seats avalible";
			}
		}
		else{
				echo "Chose number of tickets";
				}
	}
	else{
		echo "Can't buy a ticket of flight done";
	}
}else {
	echo "Admin account can't book flights";
}
