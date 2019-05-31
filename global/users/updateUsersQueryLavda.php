<?php

include "../../databaseConfig.php";
include '../validations.php'; 
session_start();



$error_message = array();

    if(isset($_POST['userUpdate'])){
        
    $_SESSION['sucess'] = "";    
    $_SESSION['errors'] = $error_message;
     $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );

        
        
    $firstname = strip_tags($_POST['firstname']);
    $firstname = str_replace(' ','',$firstname);    
    $firstname = ucfirst(strtolower($firstname));
    $firstname = trim(ucfirst(strtolower($firstname)));

    $lastname = strip_tags($_POST['lastname']);
    $lastname = str_replace(' ','',$lastname);
    $lastname = ucfirst(strtolower($lastname));
    $lastname = trim(ucfirst(strtolower($lastname)));    

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
    
    $expireDate=$_POST['expireDate'];
    $expireDatesArray = explode('/',$expireDate);    
    
     if (!valid_email($email)) {
        $errmsg = "Invalid email";
        array_push($error_message, $errmsg);
    }
        if($password==='') {
            
        } else {
        
            if (!valid_password($password)) {
            $errmsg = "Password mus contain at least 8 characters one upper case one lower case and on number.";
            array_push($error_message, $errmsg);
            
            } else {
                $password = password_hash($password, PASSWORD_DEFAULT);
            }
        }
        
    if (!valide_date($birthday)) {
        $errmsg = "Date is invalid";
        array_push($error_message, $errmsg);
    }
    if (!valid_phone($phoneNumber)) {
        $errmsg = "Invalid phone number";
        array_push($error_message, $errmsg);
    }    
    
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
        array_push($error_message, $errmsg);
    }    // Validate file input to check if is with valid extension
    else if (!in_array($file_extension, $allowed_image_extension)) {
        $errmsg = "Upload valiid images. Only PNG and JPEG are allowed.";
        array_push($error_message, $errmsg);
    }    // Validate image file size
    else if (($_FILES["img"]["size"] > 2000000)) {
        $errmsg = "Image size exceeds 2MB";
        array_push($error_message, $errmsg);
    }    // Validate image file dimensi..on


        
        
    if(count($error_message)<=0){  
        
            $profilepic = $_FILES['img']['name'];
            $expProfilepic = explode('.', $profilepic);
            $profilepicExptype = $expProfilepic[1];
            $date = date('m/d/Yh:i:sa', time());
            $rand = rand(10000, 99999);
            $encname = $date . $rand;
            $profilepicName = md5($encname) . '.' . $profilepicExptype;
            $profilepicPath = "../../uploads/user-img/" . $profilepicName;

            if (move_uploaded_file($_FILES["img"]["tmp_name"], $profilepicPath)) { } else {
                $errmsg = "Problem in uploading image files.";
                array_push($error_message, $errmsg);
            }
        
        if(count($error_message)<= 0){
            echo "<br>";
        echo $password==="" ? "asf" : 'password = :password';    
        echo "<br>";

        
        
    $updatePlane = "update users set firstname = :firstname, lastname = :lastname, email = :email, ";
        
    $updatePlane = $updatePlane . '' . ($password==="" ? "" : 'password =  :password,' ). " birthday = :birthday, gendre = :gendre, address=:address ,
    city=:city , state=:state , postal=:postal , phoneNumber=:phoneNumber, img = :img, updatedAt = NOW() where id = 7;";
    
        echo $updatePlane;
                echo "<br>";

             
    $updateStm = $conn->prepare($updatePlane);
    $params = 
        array(":firstname"=>$firstname,":lastname"=>$lastname,":email"=>$email,":birthday"=>$birthday,":gendre"=>$gendre,":address"=>$address,":city"=>$city,":state"=>$state,":postal"=>$postal,":phoneNumber"=>$phoneNumber,":img"=>$profilepicName);   

        print_r($params);    
                        echo "<br>";

        $password==="" ? null : $params[':password'] = $password;
        print_r($params);    
                        echo "<br>";

    $pdoExec = $updateStm->execute($params);
//    
    $updateCard = "update card c inner join users u on c.userId=u.id set c.number=:number,
    c.expMonth='$expireDatesArray[0]',c.expYear='$expireDatesArray[1]' where u.id=7;";
    $updateCardStm = $conn->prepare($updateCard);
    $pdoExecCard = $updateCardStm->execute(array(":number"=>$number)); 
    $_SESSION['sucess'] = "User Updated sucessfuly";
        header('location: ' . $_SERVER["HTTP_REFERER"]);
        die();
        } else {
            $_SESSION['errors'] = $error_message;
        header('location: ' . $_SERVER["HTTP_REFERER"]);
        die();
        }
        
    } else {
        $_SESSION['errors'] = $error_message;
        header('location: ' . $_SERVER["HTTP_REFERER"]);
        die();
    }
}

    
?>         