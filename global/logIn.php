<?php
include_once("../databaseConfig.php");
include_once("../models/users.php");
include_once("generateJWT.php");
include_once("validations.php");

session_start();

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
            header("location: ../main/index.php");
            die();
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
