<?php

include "../../databaseConfig.php";

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
