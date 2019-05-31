<?php
include "../../../databaseConfig.php";

session_start();

$errors = array();
if (isset($_GET['id'])){
   $id = $_GET['id'];


    if(isset($_POST['updateAirplane']))
        
    {
        
         $_SESSION['sukses'] = "";    
         $_SESSION['gabimet'] = $errors;
         $allowed_image_extension = array(
         "png",
         "jpg",
         "jpeg"
    );

        
        $name = strip_tags($_POST['name']);
        $name = str_replace(' ','',$name);    
        $name = ucfirst(strtolower($name));
        $name = trim(ucfirst(strtolower($name)));

        $yearOfProd = $_POST['yearOfProd'];
        $seats = $_POST['seats'];
        $fuelCapacity = $_POST['fuelCapacity'];
        $maxspeed = $_POST['maxspeed'];
        $additionalDesc = $_POST['additionalDesc'];
        $img = $_POST['img'];

        echo $img;
    $file_extension = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
    echo "<br/>";
    echo $email;
    echo "<br/>";
    print_r($_FILES['img']);
    echo "<br/>";
    echo !file_exists($_FILES["img"]["tmp_name"]) ? 'true' : 'false';
    echo "<br/>";
    // Validate file input to check if is not empty
    if (!file_exists($_FILES["img"]["tmp_name"])) {
        $errmsg = "Choose image file to upload.";
        array_push($errors, $errmsg);
    }    // Validate file input to check if is with valid extension
    else if (!in_array($file_extension, $allowed_image_extension)) {
        $errmsg = "Upload valiid images. Only PNG and JPEG are allowed.";
        array_push($errors, $errmsg);
    }    // Validate image file size
    else if (($_FILES["img"]["size"] > 2000000)) {
        $errmsg = "Image size exceeds 2MB";
        array_push($errors, $errmsg);
    }    // Validate image file dimensi..on


        
        
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
  
        
        
        
        $updatePlane = "update airplane set name = :name, yearOfProd = :yearOfProd, seats = :seats, fuelCapacity = :fuelCapacity, maxspeed = :maxspeed, additionalDesc = :additionalDesc, img = :img, updatedAt = NOW() where id = ".$id.";";
        
        
        //print_r($updatePlane);

        $updateStm = $conn->prepare($updatePlane);
        $pdoExec = $updateStm->execute(array(":name"=>$name,":yearOfProd"=>$yearOfProd,":seats"=>$seats,":fuelCapacity"=>$fuelCapacity,":maxspeed"=>$maxspeed,":additionalDesc"=>$additionalDesc,":img"=>$profilepicName));
        
        $_SESSION['sukses'] = "Airplane Updated sucessfuly";
        header('location: ' . $_SERVER["HTTP_REFERER"]);
        die();
    } else {
        $_SESSION['gabimet'] = $errors;
        header('location: ' . $_SERVER["HTTP_REFERER"]);
        die();
    
        
    }
}
}


?>