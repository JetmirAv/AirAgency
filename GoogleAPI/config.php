<?php
//	session_start();
	require_once "vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("144002503190-ett5fmvlnfl7ggvv1ltejkbn9qn1tk27.apps.googleusercontent.com");
	$gClient->setClientSecret("U-p4vW1B6Z6gpt4n-bCvJ4LH");
	$gClient->setApplicationName("AirAgency");
	$gClient->setRedirectUri("http://localhost:1234/github/AirAgency/global/logIn.php");
	$gClient->addScope("email");
?>
