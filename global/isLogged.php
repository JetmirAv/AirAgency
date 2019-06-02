<?php

require("verifyJWT.php");
require("getDataJWT.php");

$text = '<a href="./login.php">LOGIN<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>';
$isAuth = false;
$logOut = '';
$dataArr = array();
if (isset($_SESSION['token'])) {

    $dataArr = getDataJWT($_SESSION['token']);
    $token = $_SESSION["token"];
    $isLogged = verifyJWT($_SESSION['token']);
    if ($isLogged) {
        $text = '<a href="./profile.php">' . $dataArr->name . '</a>';
        $logOut = '<a href="../global/logOut.php" style="cursor: pointer;disabled: true; background-color:gray;">Log Out</a>';
        $isAuth = true;
    }
}

$path = $_SERVER['PHP_SELF'];
$path = explode('/', $path);

if (!$isAuth) {
    if (in_array('dashboard', $path)) {

        header('location: http://localhost/AirAgency/main/login.php');
        die();
    }

    if (in_array('main', $path)) {
        $path = end($path);


        switch ($path) {
            case 'booked.php':
                header('location: login.php');
                die();
                break;
            case 'profile.php':
                header('location: login.php');
                die();
                break;
            default:
                break;
        }
    }
} else {
    $endPath = end($path);

    switch ($endPath) {
        case 'login.php':
            header('location: index.php');
            die();
            break;
        default:
            break;
    }
    if ($dataArr->role != 1) {
        if (in_array('dashboard', $path)) {
            header('location: ../main/index.php');
            die();
        }
    } else {
        if (in_array('main', $path)) {
            if (in_array('profile.php', $path)) {
                header('location: http://localhost/AirAgency/main');
                die();
            }
            if (in_array('booked.php', $path)) {
                header('location: index.php');
                die();
            }
        }
    }
}
