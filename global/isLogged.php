<?php

require("verifyJWT.php");
require("getDataJWT.php");

$text = '<a href="./login.php">LOGIN<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>';
$isAuth = false;
$logOut = '';
// print_r($_SESSION);
$dataArr = array();
if (isset($_SESSION['token'])) {

    $dataArr = getDataJWT($_SESSION['token']);
    $token = $_SESSION["token"];
    $isLogged = verifyJWT($_SESSION['token']);
    if ($isLogged) {
        // echo "<script>console.log('Right');</script>";
        // echo $dataArr->name;
        $text = '<a href="./profile.php">' . $dataArr->name . '</a>';
        $logOut = '<a href="../global/logOut.php" style="cursor: pointer;disabled: true; background-color:gray;">Log Out</a>';
        $isAuth = true;
        // echo "<script>console.log('". $dataArr->role . "');</script>";
    } else {
        echo "<script>console.log('Wrong');</script>";
    }
} else {
    // echo "Wrong";
}

$path = $_SERVER['PHP_SELF'];
$path = explode('/', $path);

if (!$isAuth) {
    // if (in_array('dashboard', $path)) {

    //     header('location: http://localhost/AirAgency/main', true, 303);
    //     die();
    // }

    if (in_array('main', $path)) {
        $path = end($path);
        // echo "<script>console.log('" . $_SERVER['PHP_SELF'] . " " . $path . "');</script>";


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
    $path = $_SERVER['PHP_SELF'];
    $path = explode('/', $path);
    $endPath = end($path);
    // echo "<script>console.log('" . $_SERVER['PHP_SELF'] . " " . $path . "');</script>";

    switch ($endPath) {
        case 'login.php':
            header('location: index.php');
            die();
            break;
        default:
            break;
    }
    // if ($dataArr->role != 1) {
    //     if (in_array('dashboard', $path)) {
    //         header('location: http://localhost/AirAgency/main', true, 303);
    //         die();
    //     }
    // }
}
