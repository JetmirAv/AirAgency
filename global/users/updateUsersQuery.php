<?php

include "../../databaseConfig.php";
include '../validations.php';

session_start();
$_SESSION['errors'] = '';
$_SESSION['sucess'] = '';

if (isset($_POST['userUpdate'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postal = $_POST['postal'];
    $phoneNumber = $_POST['phoneNumber'];
    $gendre = $_POST['gendre'];
    $img = $_POST['img'];
    $birthday = $_POST['birthday'];
    $number = $_POST['number'];

    if (!valid_email($email)) {
        $_SESSION['errors'] = 'Email is not valid!';
    }
    if ($password != '') {
        if (!valid_password($password)) {
            $_SESSION['errors'] = 'Password must have at least one Uppercase character,' .
                ' one lowercase character, one number and be at least 8 characters long!';
        } else {
            $password = password_hash($password, PASSWORD_DEFAULT);
        }
    }

    if (!valid_phone($phoneNumber)) {
        $_SESSION['errors'] = 'Phone number is not valid!';
    }
    if (!valide_date($birthday)) {
        $_SESSION['errors'] = 'Birthday input is not valid!';
    }

    $expireDate = $_POST['expireDate'];
    $expireDatesArray = explode('/', $expireDate);

    $updatePlane = "update users set firstname = :firstname, lastname = :lastname, email = :email, password = :password, birthday = :birthday, gendre = :gendre, address=:address , city=:city , state=:state , postal=:postal , phoneNumber=:phoneNumber, img = :img, updatedAt = NOW() where id = 76;";
    $updateStm = $conn->prepare($updatePlane);
    $pdoExec = $updateStm->execute(array(":firstname" => $firstname, ":lastname" => $lastname, ":email" => $email, ":password" => $password, ":birthday" => $birthday, ":gendre" => $gendre, ":address" => $address, ":city" => $city, ":state" => $state, ":postal" => $postal, ":phoneNumber" => $phoneNumber, ":img" => $img));

    $updateCard = "update card c inner join users u on c.userId=u.id set c.number=:number,
    c.expMonth='$expireDatesArray[0]',c.expYear='$expireDatesArray[1]' where u.id=76";
    $updateCardStm = $conn->prepare($updateCard);
    $pdoExecCard = $updateCardStm->execute(array(":number" => $number));
}
