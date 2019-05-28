<?php

include "../../databaseConfig.php";

try{
   
    $errors = Array();

    if(isset($_POST['updateAirplane']))
        
    {
        $name = $_POST['name'];
        $yearOfProd = $_POST['yearOfProd'];
        $seats = $_POST['seats'];
        $fuelCapacity = $_POST['fuelCapacity'];
        $maxspeed = $_POST['maxspeed'];
        $additionalDesc = $_POST['additionalDesc'];
        $img = $_POST['img'];
    //    $updatedAt = $_POST['updatedAt'];
        
        
        
        $updatePlane = "update airplane set name = :name, yearOfProd = :yearOfProd, seats = :seats, fuelCapacity = :fuelCapacity, maxspeed = :maxspeed, additionalDesc = :additionalDesc, img = :img, updatedAt = NOW() where id = 104;";
        
        
        

        $updateStm = $conn->prepare($updatePlane);
        $pdoExec = $updateStm->execute(array(":name"=>$name,":yearOfProd"=>$yearOfProd,":seats"=>$seats,":fuelCapacity"=>$fuelCapacity,":maxspeed"=>$maxspeed,":additionalDesc"=>$additionalDesc,":img"=>$img));
        
        echo "Connection successfully";
        
        if(error)
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

?>

        
                
                        
                                
                                        
                                                
                                                        
                                                                
                                                                        
                                                                                
                                                                                        
                                                                                                
                                                                                                        
                                                                                                                
                                                                                                                        
                                                                                                                                
                                                                                                                                        
                                                                                                                                                
                                                                                                                                                        
                                                                                                                                                                
                                                                                                                                                                        
                                                                                                                                                                                
                                                                                                                                                                                        
                                                                                                                                                                                                
                                                                                                                                                                                                                 