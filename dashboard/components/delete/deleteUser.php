<?php
include '../../../databaseConfig.php';
session_start();
$_SESSION['deleteSucess'] = null;
$_SESSION['deleteError'] = null;

if (isset($_REQUEST['id'])) {

    $findUserQuery = "select * from users where id = ?";
    $findUser = $conn->prepare($findUserQuery);
    $findUser->execute([$_REQUEST['id']]);

    $row = $findUser->fetchAll()[0];;
    if ($row[1] != 1) {
        $deleteQuery = "delete from users where id = ?";
        $deleteUser = $conn->prepare($deleteQuery);
        $deleteUser->execute([$_REQUEST['id']]);
        if ($deleteUser->rowCount() > 0) {
            $_SESSION['deleteSucess'] = "Sukses";
        } else {
            $_SESSION['deleteError'] = "Error";
        }
    } else {
        $_SESSION['deleteError'] = "Error cant delete Admin";

    }
} else {
    $_SESSION['deleteError'] = "Error";
}
