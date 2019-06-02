<?php

include "../../databaseConfig.php";
include "../../models/users.php";
include '../validations.php';
session_start();

if (isset($_POST['userUpdate'])) {

	$userId = $_POST['userUpdate'];

	$error_message = array();
	$_SESSION['sucess'] = "";
	$_SESSION['errors'] = $error_message;

	$allowed_image_extension = array(
		"png",
		"jpg",
		"jpeg"
	);

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

	$expireDate = trim($_POST['expireDate']);
	$expireDatesArray = explode('/', $expireDate);

	if (!valid_email($email)) {
		$errmsg = "Invalid email";
		array_push($error_message, $errmsg);
	}
	if ($password === '') { } else {

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
	if ($_FILES["img"]["error"] === 0) {
		$file_extension = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
		if (!file_exists($_FILES["img"]["tmp_name"])) {
			$errmsg = "Choose image file to upload.";
			array_push($error_message, $errmsg);
		}
		if (!in_array($file_extension, $allowed_image_extension)) {
			$errmsg = "Upload valiid images. Only PNG and JPEG are allowed.";
			array_push($error_message, $errmsg);
		} else if (($_FILES["img"]["size"] > 8000000)) {
			$errmsg = "Image size exceeds 8MB";
			array_push($error_message, $errmsg);
		}
	}

	if (count($error_message) <= 0) {

		if ($_FILES["img"]["error"] === 0) {

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
		}

		if (count($error_message) <= 0) {

			$finalPassword = $password === "" ? null : $password;
			$finalImg = $_FILES["img"]["error"] === 0 ?  $profilepicName : null;
			
			echo gettype($finalPassword);
			echo "<br>";
			echo gettype($finalImg);

			$objUser = new User(
				2,
				$firstname,
				$lastname,
				$email,
				$birthday,
				$gendre,
				$address,
				$city,
				$state,
				$postal,
				$phoneNumber,
				$finalPassword,
				$finalImg
			);

			$objUser->update($conn, $userId);

			$countCards = "select  count(*) as count  from card where userId = " . $userId . " ";
			$getStmForCards = $conn->prepare($countCards);
			$getStmForCards->execute();
			$count = $getStmForCards->fetch();
			$numberOfCards = $count['count'];


			if ($numberOfCards > 0 && ($number !== '' || $expireDate !== '' || $code !== '')) {
				$updateCard = "update card  set number=:number,
					expMonth=" . $expireDatesArray[0] . " , expYear=" . $expireDatesArray[1] . " where userId=" . $userId . ";";
				$updateCardStm = $conn->prepare($updateCard);
				$pdoExecCard = $updateCardStm->execute(array(":number" => $number));

				print_r($updateCardStm);

				$_SESSION['sucess'] = "User Updated sucessfuly";

				header('location: ' . $_SERVER["HTTP_REFERER"]);
			} else if ($numberOfCards < 1 &&  $number !== '' && $expireDate !== '' && $code !== '') {
				print_r("redfanb");
				$insertBooked = "insert into card (userId , number,expMonth,expYear,code) 
					values(:userId,:number,:expMonth,:expYear,:code);";
				$insertStatement = $conn->prepare($insertBooked);
				$pdoExecute = $insertStatement->execute(array(":userId" => $userId, ":number" => $number, ":expMonth" => $expireDatesArray[0], ":expYear" => $expireDatesArray[1], ":code" => $code));
				$_SESSION['errors'] = $error_message;
				header('location: ' . $_SERVER["HTTP_REFERER"]);
				die();



			}



		} else {
			$errormsg = "Fill all gaps please ! ";
			array_push($error_message, $errmsgr);
			header('location: ' . $_SERVER["HTTP_REFERER"]);
			die();
		}
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
