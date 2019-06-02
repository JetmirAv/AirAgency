<?php
include '../../../databaseConfig.php';
include '../../../models/airplanes.php';
session_start();

$_SESSION['deleteSucess'] = null;
$_SESSION['deleteError'] = null;

if (isset($_POST['id'])) {

    if (Airplane::delete($conn, (int)$_POST['id'])) {
        $_SESSION['deleteSucess'] = "Sukses";
    } else {
        $_SESSION['deleteError'] = "Error";
    }
}
