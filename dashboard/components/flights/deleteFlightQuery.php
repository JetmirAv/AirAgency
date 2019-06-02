<?php
include '../../../databaseConfig.php';
include '../../../models/flights.php';
session_start();
$_SESSION['deleteSucess'] = null;
$_SESSION['deleteError'] = null;

if (isset($_REQUEST['id'])) {

    try {
        if (Flight::delete($conn, (int)$_REQUEST['id'])) {

            $_SESSION['deleteSucess'] = "Sukses";
        } else {
            $_SESSION['deleteError'] = "Error";
        }
    } catch (Exception $ex) {
        $_SESSION['deleteError'] = $ex->getMessage();
    }
}
