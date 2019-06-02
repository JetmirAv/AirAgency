<?php
include '../../../databaseConfig.php';
include '../../../models/users.php';
session_start();
$_SESSION['deleteSucess'] = null;
$_SESSION['deleteError'] = null;

if (isset($_POST['id'])) {

    try {
        User::delete($conn, $_REQUEST['id']);
        $_SESSION['deleteSucess'] = "User deleted Successfuly";
    } catch (Exception $ex) {
        $_SESSION['deleteError'] = $ex->getMessage();
    }
}
