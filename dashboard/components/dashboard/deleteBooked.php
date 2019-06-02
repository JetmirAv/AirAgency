<?php
include "../../../dbConnection.php";
include "../../../models/booked.php";



if (isset($_POST['id'])) {

    try {
        if (Booked::delete($conn, (int)$_POST['id'])) {
            $_SESSION['deleteSucess'] = "Sukses";
        } else {
            $_SESSION['deleteError'] = "Error";
        }
    } catch (Exception $ex) {
        $_SESSION['deleteError'] = $ex->getMessage();
    }
}
