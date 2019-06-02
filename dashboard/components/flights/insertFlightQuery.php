<?php
include "../../../databaseConfig.php";
session_start();

$errors = array();
$_SESSION['success'] = "";
$_SESSION['errors'] = $errors;


if(isset($_POST['insertFlight'])){
    
    $fromCity =$_POST['fromCity'];
    $toCity = trim($_POST['toCity']);
    $planeId =(int)trim($_POST['planeId']);
    $price = (int)$_POST['price'];
    $isSale =(int)trim($_POST['isSale']);
    $checkIn =trim($_POST['checkIn']);

 
    $doesExistFile = $_FILES["img"]["error"];
    
    echo $doesExistFile;
    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );
    
    if($isSale<0){
        
         $errmsg = "isSale must be positive";
         array_push($errors, $errmsg);
    } else if ($isSale==''){
         $errmsg = "isSale can not be positive";
         array_push($errors, $errmsg);
    } 
    
    if($price<0){
         $errmsg = "Price must be positive";
         array_push($errors, $errmsg);
    } else if($price==''){
         $errmsg = "Price can not be null";
         array_push($errors, $errmsg);
    }
    
    
    $file_extension = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
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

     
    
    if (count($errors) <= 0){ 
        
            $profilepic = $_FILES['img']['name'];
            $expProfilepic = explode('.', $profilepic);
            $profilepicExptype = $expProfilepic[1];
            $date = date('m/d/Yh:i:sa', time());
            $rand = rand(10000, 99999);
            $encname = $date . $rand;
            $profilepicName = md5($encname) . '.' . $profilepicExptype;
            $profilepicPath = "../../../uploads/flight-img/" . $profilepicName;

            if(move_uploaded_file($_FILES["img"]["tmp_name"], $profilepicPath)) {
             } else {
                $errmsg = "Problem in uploading image files.";
                array_push($errors, $errmsg);    
            }
                
   
    
        
    $planeSeatsQuery = "Select seats from airplane where id=?";
    $planeSeats = $conn->prepare($planeSeatsQuery);
    $planeSeats->execute([$planeId]);
    $avalible=$planeSeats->fetch()[0];    
        
    $insertFlight = "insert into flight (fromCity, toCity, planeId, avalible, price, isSale, checkIn,img) values(:fromCity,:toCity,:planeId,:avalible,:price,:isSale,:checkIn,:img);";
        
    $insertStm = $conn->prepare($insertFlight);
    $pdoExec = $insertStm->execute(array(":fromCity"=>$fromCity,":toCity"=>$toCity,":planeId"=>$planeId,":avalible"=>$avalible,":price"=>$price,":isSale"=>$isSale,":checkIn"=>$checkIn , ":img"=>$profilepicName));
        
      $_SESSION['success'] = "Flight Inserted sucessfuly";
      header('location: ' . $_SERVER["HTTP_REFERER"]);    
    
    
} else {
        
				$_SESSION['errors'] = $errors;
			    header('location: ' . $_SERVER["HTTP_REFERER"]);
				die();
    }

}

?>         