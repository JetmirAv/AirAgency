<?php
session_start();
include_once("../databaseConfig.php");
include_once("../models/users.php");
include_once("generateJWT.php");
include_once("validations.php");
require_once "../GoogleAPI/config.php";


//if(isset(session_start()) === null){
//	session_start();
//} 

if (isset($_POST['login'])) {
    $logInErrors = array();
    $_SESSION['error'] = $logInErrors;

    $email = trim($_POST['form-username']);
    $password = trim($_POST['form-password']);

    if (!valid_email($email)) {
        array_push($logInErrors, "Invalid email");
    }

    if (count($logInErrors) <= 0) {
        try {
            $data = User::findByEmailAndPassword($conn, $email, $password);
            $_SESSION["token"] = generateJWT($data['id'], $data['roleId'], $data['email'], $data['firstname']);
            if($data['roleId'] != 1){
                header("location: ../main/index.php");
                die();
            } else {
                header("location: ../dashboard/index.php");
                die();
            }
        } catch (Exception $ex) {
            array_push($logInErrors, $ex->getMessage());
            $_SESSION['error'] = $logInErrors;
            header('location: ' . $_SERVER["HTTP_REFERER"]);
            die();
        }
    } else {
        $_SESSION['error'] = $logInErrors;
        header('location: ' . $_SERVER["HTTP_REFERER"]);
        die();
    }
}
if (isset($_GET['code'])) {
    $logInErrors = array();
    $_SESSION['error'] = $logInErrors;

    if (isset($_GET['code'])) {
        echo "code";
        $token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
    }

    if (isset($_SESSION['access_token'])) {
        echo "access-toke";
        $gClient->setAccessToken($_SESSION['access_token']);
    }



    echo "Jasht";
    echo "<br><br>";
    // print_r($gClient);
    echo "<br><br>";
    $oAuth = new Google_Service_Oauth2($gClient);
    echo "Ketu";
    $userData = $oAuth->userinfo_v2_me->get();
    echo "Ketu";


    $email = $userData['email'];


    if (!valid_email($email)) {
        array_push($logInErrors, "Invalid email");
    }

    if (count($logInErrors) <= 0) {
        try {
            $data = User::findByEmailAndPassword($conn, $email);
            $_SESSION["token"] = generateJWT($data['id'], $data['roleId'], $data['email'], $data['firstname']);
            header("location: ../main/index.php");
            die();
        } catch (Exception $ex) {
            array_push($logInErrors, $ex->getMessage());
            $_SESSION['error'] = $logInErrors;
            header('location: ../main/login.php');
            die();
        }
    } else {
        $_SESSION['error'] = $logInErrors;
        header('location: ../main/login.php');
        die();
    }
}
