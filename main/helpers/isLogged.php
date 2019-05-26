<?php

include_once("helpers/verifyJWT.php");
include_once("helpers/getDataJWT.php");

$text = '<a href="./login.php">LOGIN<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>';
$isAuth = false;
$logOut = '';
$token = $_SESSION["token"];

if ($_SESSION["token"]) {

    echo "<script>console.log('" . $_SERVER['PHP_SELF'] . " " . $_SESSION['token'] . " " . $_SESSION['email'] . "');</script>";

    $isLogged = verifyJWT($_SESSION['token']);


    if ($isLogged) {
        echo "<script>console.log('Right');</script>";
        $dataArr = getDataJWT($_SESSION['token']);
        echo $dataArr->name;
        $text = '<a href="./profile.php">' . $dataArr->name . '</a>';
        $logOut = '<a href="helpers/logOut.php" style="cursor: pointer;disabled: true; background-color:gray;">Log Out</a>';
        $isAuth = true;
    } else {
        echo "<script>console.log('Wrong');</script>";
    }
} else {
    echo "Wrong";
}


if (!$isAuth) {
    $path = $_SERVER['PHP_SELF'];
    $path = explode('/', $path);
    $path = end($path);
    echo "<script>console.log('" . $_SERVER['PHP_SELF'] . " " . $path . "');</script>";

    switch ($path){
        case 'booked.php':
            header('location: login.php'); 
            break;
        default: 
            break;                
    }


}
