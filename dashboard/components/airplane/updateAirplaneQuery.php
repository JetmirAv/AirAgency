<?php
include "../../../databaseConfig.php";
include "../../../global/validations.php";

session_start();

$errors = array();



    if(isset($_POST['updateAirplane']))
        
    {
        
        $planeId=$_POST['updateAirplane'];
        
         $_SESSION['sukses'] = "";    
         $_SESSION['gabimet'] = $errors;
         $allowed_image_extension = array(
         "png",
         "jpg",
         "jpeg"
    );

        
        $doesExistFile = $_FILES["img"]["error"];
        
        echo "ahah";
        echo "<br>";
        $name = strip_tags($_POST['name']);
        $name = str_replace(' ','',$name);    
        $name = ucfirst(strtolower($name));
        $name = trim(ucfirst(strtolower($name)));

        $yearOfProd = (int)$_POST['yearOfProd'];
        $seats = (int)$_POST['seats'];
        $fuelCapacity = (int)$_POST['fuelCapacity'];
        $maxspeed = (int)$_POST['maxspeed'];
        $additionalDesc = $_POST['additionalDesc'];
      //  $img = $_POST['img'];

        // echo $img;
        

        if($doesExistFile === 0){
        $file_extension = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
        // Validate file input to check if is not empty
        if (!file_exists($_FILES["img"]["tmp_name"])) {
            $errmsg = "Choose image file to upload.";
            array_push($errors, $errmsg);
        }    // Validate file input to check if is with valid extension
        if (!in_array($file_extension, $allowed_image_extension)) {
            $errmsg = "Upload valiid images. Only PNG and JPEG are allowed.";
            array_push($errors, $errmsg);
        }    // Validate image file size
        else if (($_FILES["img"]["size"] > 8000000)) {
            $errmsg = "Image size exceeds 8MB";
            array_push($errors, $errmsg);
        }    // Validate image file dimensi..on


    }
        
        if($yearOfProd>0){
            
        if (!check_year($yearOfProd)) {
            $errmsg = "Invalid year";
            array_push($errors, $errmsg);
     }
        } else {
            $errmsg = "Negative number of year is not allowed";
            array_push($errors,$errmsg);
        }
        
        if($seats<0){
             $errmsg = "Negative number of seats is not allowed";
            array_push($errors,$errmsg);
        } else if($seats==''){
            $errmsg = "Null value of seats is not allowed";
            array_push($errors,$errmsg);

        }
        
        if($fuelCapacity<0){
            $errmsg = "Negative number of fuelCapacity is not allowed";
            array_push($errors,$errmsg);
        }  else if ($fuelCapacity==''){
            $errmsg = "Null value of fuelCapacity is not allowed";
            array_push($errors,$errmsg);
        }
        
        if($maxspeed<0){
             $errmsg = "Negative number of maxspeed is not allowed";
            array_push($errors,$errmsg);
        } else if($maxspeed==''){
            $errmsg = "Null value of maxspeed is not allowed";
            array_push($errors,$errmsg);
        }
     
            if(count($errors)<=0){  
            $profilepic = $_FILES['img']['name'];
            $expProfilepic = explode('.', $profilepic);
            $profilepicExptype = $expProfilepic[1];
            $date = date('m/d/Yh:i:sa', time());
            $rand = rand(10000, 99999);
            $encname = $date . $rand;
            $profilepicName = md5($encname) . '.' . $profilepicExptype;
            $profilepicPath = "../../../uploads/airplane-img/" . $profilepicName;

            if (move_uploaded_file($_FILES["img"]["tmp_name"], $profilepicPath)) { } else {
                $errmsg = "Problem in uploading image files.";
                array_push($errors, $errmsg);
            }
  
        
        
        
        $updatePlane = "update airplane set name = :name, yearOfProd = :yearOfProd, seats = :seats, fuelCapacity = :fuelCapacity, maxspeed = :maxspeed, additionalDesc = :additionalDesc," . ($doesExistFile === 0 ? 'img=:img' : 'img=:img') . " , updatedAt = NOW() where id =".$planeId.";";
        
        
        print_r($updatePlane);
                echo "<br>";

        $updateStm = $conn->prepare($updatePlane);
        
        $img = "select img  from airplane where id = ".$userId." ";
                $imgPrepare = $conn->prepare($img);
				$imgPrepare -> execute();
				$image = $imgPrepare->fetch();
				$imageFetch=$image['img'];
        $doesExistFile === 0  ? $params[":img"] = $profilepicName : $profilepicName=$imageFetch;
                
                
                 
                
        $pdoExec = $updateStm->execute(array(":name"=>$name,":yearOfProd"=>$yearOfProd,":seats"=>$seats,":fuelCapacity"=>$fuelCapacity,":maxspeed"=>$maxspeed,":additionalDesc"=>$additionalDesc,":img"=>$profilepicName));
        
        $_SESSION['sukses'] = "Airplane Updated sucessfuly";
        header('location: ' . $_SERVER["HTTP_REFERER"]);
        die();
     }  else {
        $_SESSION['gabimet'] = $errors;
        header('location: ' . $_SERVER["HTTP_REFERER"]);
        die();
    
        
    }
}



?>