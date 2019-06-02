<?php

require("../../../models/users");
require("../../../databaseConfig");

if (isset($_POST['forgotPassword'])) {

    $email = trim($_POST["form-email"]);


    try {
        $user = User::findByEmailAndPassword($conn, $email);
        
    } catch (Exception  $ex){
        $_POST["fpError"] = "Cant find user with this email";
    }

}
