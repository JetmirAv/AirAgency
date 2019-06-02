<?php

include "../../databaseConfig.php";
include "../../models/users.php";
include '../validations.php';
session_start();

if (isset($_POST['userUpdate'])) {
	$userId = $_POST['userUpdate'];

	$selectUserWithId = User::findById($conn, $userId);

	$imgStoredInDB = $selectUserWithId['img'];

	echo "Databaz";
	echo "<br>";
	echo ($imgStoredInDB);
	echo "<br>";
	echo "Deika";
	echo "<br>";
	$error_message = array();



	$_SESSION['sucess'] = "";
	$_SESSION['errors'] = $error_message;
	$allowed_image_extension = array(
		"png",
		"jpg",
		"jpeg"
	);

	$doesExistFile = $_FILES["img"]["error"];
	$finalImg = '';
	$firstname = strip_tags($_POST['firstname']);
	$firstname = str_replace(' ', '', $firstname);
	$firstname = ucfirst(strtolower($firstname));
	$firstname = trim(ucfirst(strtolower($firstname)));
	$lastname = strip_tags($_POST['lastname']);
	$lastname = str_replace(' ', '', $lastname);
	$lastname = ucfirst(strtolower($lastname));
	$lastname = trim(ucfirst(strtolower($lastname)));
	$email = strtolower(trim($_POST['email']));
	$password = trim($_POST['password']);
	$address = trim($_POST['address']);
	$city = trim($_POST['city']);
	$state = trim($_POST['state']);
	$postal = trim($_POST['postal']);
	$phoneNumber = trim($_POST['phoneNumber']);
	$gendre = trim($_POST['gendre']);
	$birthday = trim($_POST['birthday']);
	$number = trim($_POST['number']);
	$code = trim($_POST['code']);
	$img = trim($_POST['img']);

	$expireDate = trim($_POST['expireDate']);
	$expireDatesArray = explode('/', $expireDate);

	echo $img;
	echo "<br>";



// 	if (!valid_email($email)) {
// 		$errmsg = "Invalid email";
// 		array_push($error_message, $errmsg);
// 	}
// 	if ($password === '') { } else {

// 		if (!valid_password($password)) {
// 			$errmsg = "Password mus contain at least 8 characters one upper case one lower case and on number.";
// 			array_push($error_message, $errmsg);
// 		} else {
// 			$password = password_hash($password, PASSWORD_DEFAULT);
// 		}
// 	}

// 	if (!valide_date($birthday)) {
// 		$errmsg = "Date is invalid";
// 		array_push($error_message, $errmsg);
// 	}
// 	if (!valid_phone($phoneNumber)) {
// 		$errmsg = "Invalid phone number";
// 		array_push($error_message, $errmsg);
// 	}
// 	if ($doesExistFile === 0) {
// 		$file_extension = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
// 		// Validate file input to check if is not empty
// 		if (!file_exists($_FILES["img"]["tmp_name"])) {
// 			$errmsg = "Choose image file to upload.";
// 			array_push($error_message, $errmsg);
// 		}    // Validate file input to check if is with valid extension
// 		if (!in_array($file_extension, $allowed_image_extension)) {
// 			$errmsg = "Upload valiid images. Only PNG and JPEG are allowed.";
// 			array_push($error_message, $errmsg);
// 		}    // Validate image file size
// 		else if (($_FILES["img"]["size"] > 8000000)) {
// 			$errmsg = "Image size exceeds 8MB";
// 			array_push($error_message, $errmsg);
// 		}    // Validate image file dimensi..on


// 	} else if($imgStoredInDB === $img){
// 		$finalImg = $img;
// 	} 
// 		else {
// 			array_push($error_message, "Img is not properly set");
// 		}

// 	if (count($error_message) <= 0) {

// 		if ($doesExistFile === 0) {

// 			$profilepic = $_FILES['img']['name'];
// 			$expProfilepic = explode('.', $profilepic);
// 			$profilepicExptype = $expProfilepic[1];
// 			$date = date('m/d/Yh:i:sa', time());
// 			$rand = rand(10000, 99999);
// 			$encname = $date . $rand;
// 			$profilepicName = md5($encname) . '.' . $profilepicExptype;
// 			$profilepicPath = "../../uploads/user-img/" . $profilepicName;

// 			if (move_uploaded_file($_FILES["img"]["tmp_name"], $profilepicPath)) { } else {
// 				$errmsg = "Problem in uploading image files.";
// 				array_push($error_message, $errmsg);
// 			}
// 			$finalImg = $profilepicName;
// 		} 

// 		if (count($error_message) <= 0) {
// 			$updatePlane = "update users set 
// 				firstname = :firstname, 
// 				lastname = :lastname, 
// 				email = :email, " . 
// 				($password === "" ? "" : 'password =  :password,') . 
// 				" birthday = :birthday, 
// 				gendre = :gendre, 
// 				address=:address ,
// 				city=:city , 
// 				state=:state , 
// 				postal=:postal , 
// 				phoneNumber=:phoneNumber, 
// 				img=:img 
// 				updatedAt = NOW() where id = " . $userId;
				
				
// 				//                 qQita e kom ndrru se sum bojke te do usera me ba ndryshime me qit foto  veq e shkruve qishtu bani
// 				//				. ($doesExistFile === 0 ? 'img=:img' : null)qishtu u kan 

// 			$updateStm = $conn->prepare($updatePlane);
// 			print_r($updateStm);


// 			$img = "select img  from users where id = " . $userId . " ";
// 			$imgPrepare = $conn->prepare($img);
// 			$imgPrepare->execute();
// 			$image = $imgPrepare->fetch();
// 			$imageFetch = $image['img'];
// 			//print_r($imageFetch);



// 			//				$doesExistFile === 0  ? $params[":img"] = $profilepicName : ;
// 			$doesExistFile === 0  ? $params[":img"] = $profilepicName : $profilepicName = $imageFetch;
// 			$params = array(":firstname" => $firstname, ":lastname" => $lastname, ":email" => $email, ":birthday" => $birthday, ":gendre" => $gendre, ":address" => $address, ":city" => $city, ":state" => $state, ":postal" => $postal, ":phoneNumber" => $phoneNumber, ":img" => $finalImg);


// 			$password === "" ? null : $params[':password'] = $password;


// 			$pdoExec = $updateStm->execute($params);
// 			$countCards = "select  count(*) as count  from card where userId = " . $userId . " ";
// 			$getStmForCards = $conn->prepare($countCards);
// 			$getStmForCards->execute();
// 			$count = $getStmForCards->fetch();
// 			$numberOfCards = $count['count'];


// 			if ($numberOfCards > 0 && ($number !== '' || $expireDate !== '' || $code !== '')) {
// 				$updateCard = "update card  set number=:number,
// 					expMonth=" . $expireDatesArray[0] . " , expYear=" . $expireDatesArray[1] . " where userId=" . $userId . ";";
// 				$updateCardStm = $conn->prepare($updateCard);
// 				$pdoExecCard = $updateCardStm->execute(array(":number" => $number));

// 				print_r($updateCardStm);

// 				$_SESSION['sucess'] = "User Updated sucessfuly";

// 				header('location: ' . $_SERVER["HTTP_REFERER"]);
// 			} else if ($numberOfCards < 1 &&  $number !== '' && $expireDate !== '' && $code !== '') {
// 				print_r("redfanb");
// 				$insertBooked = "insert into card (userId , number,expMonth,expYear,code) 
// 					values(:userId,:number,:expMonth,:expYear,:code);";
// 				$insertStatement = $conn->prepare($insertBooked);
// 				$pdoExecute = $insertStatement->execute(array(":userId" => $userId, ":number" => $number, ":expMonth" => $expireDatesArray[0], ":expYear" => $expireDatesArray[1], ":code" => $code));
// 				$_SESSION['errors'] = $error_message;
// 				header('location: ' . $_SERVER["HTTP_REFERER"]);
// 				die();
// 			}
// 		} else {
// 			$errormsg = "Fill all gaps please ! ";
// 			array_push($error_message, $errmsgr);
// 			header('location: ' . $_SERVER["HTTP_REFERER"]);
// 			die();
// 		}
// 	} else {
// 		$_SESSION['errors'] = $error_message;
// 		header('location: ' . $_SERVER["HTTP_REFERER"]);
// 		die();
// 	}
// } else {
// 	$_SESSION['errors'] = $error_message;
// 	header('location: ' . $_SERVER["HTTP_REFERER"]);
	// die();
}
