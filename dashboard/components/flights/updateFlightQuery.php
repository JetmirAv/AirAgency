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
//            $img = $_POST['img'];
	
	
			$_SESSION['sucess'] = "";
			$_SESSION['errors'] = $error_message;
			$allowed_image_extension = array(
			"png",
			"jpg",
			"jpeg"
			);

	$doesExistFile = $_FILES["img"]["error"];

print_r($doesExistFile);
	
    
if($doesExistFile === 0){
$file_extension = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
// Validate file input to check if is not empty
if (!file_exists($_FILES["img"]["tmp_name"])) {
	$errmsg = "Choose image file to upload.";
	array_push($error_message, $errmsg);
}    // Validate file input to check if is with valid extension
if (!in_array($file_extension, $allowed_image_extension)) {
	$errmsg = "Upload valiid images. Only PNG and JPEG are allowed.";
	array_push($error_message, $errmsg);
}    // Validate image file size
else if (($_FILES["img"]["size"] > 8000000)) {
	$errmsg = "Image size exceeds 8MB";
	array_push($error_message, $errmsg);
}    // Validate image file dimensi..on



}
// if($avalible<=0){ // $errmsg="Number of seats avalible can't be negative." ; // array_push($error_message, $errmsg); //} //if($price <=0){ // $errmsg="Number of price can't be negative." ; // array_push($error_message, $errmsg); //} //if($isSale <=0){ // $errmsg="Number of sale can't be negative." ; // array_push($error_message, $errmsg); //}

	if(count($error_message)<=0){  

if($doesExistFile === 0){

	$flightPic = $_FILES['img']['name'];
	$expflightPic = explode('.', $flightPic);
	$flightPicExptype = $expflightPic[1];
	$date = date('m/d/Yh:i:sa', time());
	$rand = rand(10000, 99999);
	$encname = $date . $rand;
	$flightPicName = md5($encname) . '.' . $flightPicExptype;
	$flightPicPath = "../../../uploads/flight-img/" . $flightPicName;

	if (move_uploaded_file($_FILES["img"]["tmp_name"], $flightPicPath)) { } else {
		$errmsg = "Problem in uploading image files.";
		array_push($error_message, $errmsg);
	}

}


	if(count($error_message)<=0){  

		$image = "select img  from flight where id = ? ";
		$imgPrepare = $conn->prepare($image);
		$imgPrepare -> execute([$flightId]);
		$image = $imgPrepare->fetch();
		$imageFetch=$image['img'];



		$doesExistFile === 0 ? $params[":img"] = $flightPicName : $flightPicName=$imageFetch;

		$updateFlight = " Update flight set fromCity ='$fromCity' , toCity = '$toCity', planeId = '$planeId', avalible = '$avalible', price = '$price', isSale = '$isSale', checkIn = '$checkIn' , img = '$flightPicName', updatedAt=NOW() where id = ".$flightId." and ('$fromCity' in(select id from city ) and '$toCity' in (select id from city)); ";
		$updateStm = $conn->prepare($updateFlight);
		print_r($updateStm);





		$pdoExec = $updateStm->execute(array(":fromCity"=>$fromCity, ":toCity"=>$toCity, ":planeId"=>$planeId, ":avalible"=>$avalible, ":price"=>$price, ":isSale"=>$isSale, ":checkIn"=>$checkIn));
		header('location: ' . $_SERVER["HTTP_REFERER"]);
     	$errmsg = "Update sucessfully.";
		array_push($error_message, $errmsg);

	}
		else {
		$_SESSION['errors'] = $error_message;
		header('location: ' . $_SERVER["HTTP_REFERER"]);
		die();
		}

		}
		
		else {
		$_SESSION['errors'] = $error_message;
		header('location: ' . $_SERVER["HTTP_REFERER"]);	
		die();
	}
}
		
		?>
