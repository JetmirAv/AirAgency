<?php
include_once("../databaseConfig.php");
include_once("generateJWT.php");
include_once("validations.php");

session_start();

if (isset($_POST['login'])) {
    $logInErrors = array();
    $_SESSION['error'] = $logInErrors;

    $email = trim($_POST['form-username']);
    $password = trim($_POST['form-password']);

    if (!valid_email($email)) {
        array_push($logInErrors, "Invalid email");
    }


    if (count($logInErrors) <= 0) {
        $user = "select * from users where email='$email'  ";
        

        $result = $conn->query($user);
        $data = $result->fetch();
        $getUser = $result->rowCount();

        $dbPassword=$data["password"];
        
        if(password_verify($password, $dbPassword)){
            echo "true";
        }
        else{
            echo "false";
        }
        

        if ($getUser == 1) {
            if(password_verify($password, $dbPassword)){
            $_SESSION["loggedin"] = true;
            $_SESSION["name"] = $data['firstname'];
            $_SESSION["token"] = generateJWT($data['id'], $data['roleId'], $data['email'], $data['firstname']);
            header("location: ../main/index.php");
            $path = $_SERVER['PHP_SELF'];
            $path = explode('/', $path);

            if (in_array('main', $path)) {
                header("location: ../main/index.php");
                die();
            } else {
                $_SESSION['error'] = null;
                $_SESSION['sucess'] = "User logedin successfuly.";
                header('location: ' . $_SERVER["HTTP_REFERER"]);
                die();
            }
        }
        else{
            array_push($logInErrors, "<br> Password incorrect");
            $_SESSION['error'] = $logInErrors;
            header('location: ' . $_SERVER["HTTP_REFERER"]);
            die();
        }
        } else {
            array_push($logInErrors, "Email  incorrect");
            $_SESSION['error'] = $logInErrors;
            header('location: ' . $_SERVER["HTTP_REFERER"]);
            die();
        }
    } else {
        $_SESSION['error'] = $logInErrors;
        header('location: ' . $_SERVER["HTTP_REFERER"]);
        die();
     }
}
