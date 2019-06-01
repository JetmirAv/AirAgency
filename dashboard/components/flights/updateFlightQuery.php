<?php
//$servername = 'localhost';
//$username = "root";
//$password = "";
//$database = 'airagency';
//include "../../../databaseConfig.php";
//
//try{
//   
////    $conn = new PDO("mysql:host=localhost; dbname=airagency", $username, $password);
////    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    
//$errors = Array();
//    
//if(isset($_POST['updateFlight']))
//{
//    
//    
//    $fromCity =(int)$_POST['fromCity'];
//    $toCity = (int)trim($_POST['toCity']);
//    $planeId = (int)trim($_POST['planeId']);
//    $avalible = (int)trim($_POST['avalible']);
//    $price = floatval($_POST['price']);
//    $isSale = (int)trim($_POST['isSale']);
//    $checkIn = date(trim($_POST['checkIn']));
//    $img = $_POST['img'];
////    $updatedAt = $_POST['updatedAt'];
// //   echo $toCity;
//    
//    $updateFlight = " Update flight set  fromCity ='$fromCity' , toCity = '$toCity', planeId = '$planeId', avalible = '$avalible', price = '$price', isSale = '$isSale', checkIn = '$checkIn' , img = '$img', updatedAt=NOW() where id = ".$flightId."    and ('$fromCity' in(select id from city ) and '$toCity' in (select id from city)); ";
//    $updateStm = $conn->prepare($updateFlight);
//    //print_r($updateFlight);
//    $pdoExec = $updateStm->execute(array(":fromCity"=>$fromCity, ":toCity"=>$toCity, ":planeId"=>$planeId, ":avalible"=>$avalible, ":price"=>$price, ":isSale"=>$isSale, ":checkIn"=>$checkIn, ":img"=>$img));
//    
//    
//    
////    $updateFlight = " Update flight set  fromCity = '$fromCity, toCity = :toCity,planeId = :planeId, avalible = :avalible, price = :price, isSale = :isSale, checkIn = :checkIn, img = :img, updatedAt=NOW() where id = 101 and (fromCity in(select id from city where name=:fromCity) or toCity in (select id from city where name= :toCity)); ";
//    
//    
//        //echo "Updated successfully";
//    
//  $checkInString='$checkIn';
//  $checkInInt = (int)$checkInString;    
//    
//  echo $checkIn;
//    if($checkInInt>0){
//        if (!check_year($checkIn)) {
//            $errmsg = "Invalid CheckIn";
//        array_push($errors, $errmsg);
//     }
//        } else {
//            $errmsg = "Negative number of date are not allowed";
//            array_push($errors,$errmsg);
//        }
//    
//    
//    
//        
//        if($errors)
//        {
//            $msg = 'gabim';
//            array_push($errors, $msg);
//            $_POST['error'] = $errors;
//        }
//        else
//        {
//            header("location: ". $_SERVER["HTTP_REFERER"]);
//            $_POST['sukses'] = "Sukses";
//        }
//    
//}
//    
//}
//catch(PDOException $ex) {
//    echo "Datebase Connection failed: " . $ex->getMessage();
//}
//
//$conn = null;
//        

?>  

             
              
   <?php

include "../../../databaseConfig.php";
//include '../validations.php'; 
//session_start();

if(isset($_POST['updateFlight'])){
			$error_message = array();  
			$flightId=$_POST['updateFlight'];

       
            $fromCity =(int)$_POST['fromCity'];
            $toCity = (int)trim($_POST['toCity']);
            $planeId = (int)trim($_POST['planeId']);
            $avalible = (int)trim($_POST['avalible']);
            $price = floatval($_POST['price']);
            $isSale = (int)trim($_POST['isSale']);
            $checkIn = date(trim($_POST['checkIn']));
            $img = $_POST['img'];
    


			if(count($error_message)<=0){  

                
        $updateFlight = " Update flight set  fromCity ='$fromCity' , toCity = '$toCity', planeId = '$planeId', avalible = '$avalible', price = '$price', isSale = '$isSale', checkIn = '$checkIn' , img = '$img', updatedAt=NOW() where id = ".$flightId."    and ('$fromCity' in(select id from city ) and '$toCity' in (select id from city)); ";
          $updateStm = $conn->prepare($updateFlight);
     print_r($updateStm);
                   $pdoExec = $updateStm->execute(array(":fromCity"=>$fromCity, ":toCity"=>$toCity, ":planeId"=>$planeId, ":avalible"=>$avalible, ":price"=>$price, ":isSale"=>$isSale, ":checkIn"=>$checkIn, ":img"=>$img));

				}
				else {
					$errormsg = "Fill all gaps please ! ";
					array_push($error_message,$errmsgr);
				 header('location: ' . $_SERVER["HTTP_REFERER"]);
				die();
				}

			} 

            else {
				$_SESSION['errors'] = $error_message;
			    header('location: ' . $_SERVER["HTTP_REFERER"]);
				die();
			}
		
		?>                     
                
                 
                  
                   
                    
                     
                      
                       
                        
                         
                          
                           
                            
                             
                              
                               
                                
                                 
                                  
                                   
                                    
                                     
                                      
                                       
                                        
                                         
                                          
                                           
                                            
                                             
                                              
                                               
                                                
                                                  
 