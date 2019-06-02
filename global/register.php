<?php
include_once("../databaseConfig.php");
include_once("generateJWT.php");
include_once("validations.php");
include_once("../models/users.php");

session_start();


echo "Fillimi";

if (isset($_POST['register'])) {

    $_SESSION['sucess'] = "";

    $errors = array();
    $_SESSION['errors'] = $errors;
    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );

    $firstname = trim($_POST['form-first-name']);
    $lastname = trim($_POST['form-last-name']);
    $email = strtolower(trim($_POST['form-email']));
    $password = trim($_POST['form-password']);
    $birthdate = date("Y-m-d", strtotime(trim($_POST['form-date'])));
    $gender = (int)trim($_POST['form-gender']);
    $address = trim($_POST['form-address']);
    $city = trim($_POST['form-city']);
    $state = trim($_POST['form-state']);
    $postal = trim($_POST['form-postal']);
    $phone = trim($_POST['form-phone']);


    if (!valid_email($email)) {
        $errmsg = "Invalid email";
        array_push($errors, $errmsg);
    }
    if (!valid_password($password)) {
        $errmsg = "Password mus contain at least 8 characters one upper case one lower case and on number.";
        array_push($errors, $errmsg);
    }
    if (!valide_date($birthdate)) {
        $errmsg = "Date is invalid";
        array_push($errors, $errmsg);
    }
    if (!valid_phone($phone)) {
        $errmsg = "Invalid phone number";
        array_push($errors, $errmsg);
    }

    $file_extension = pathinfo($_FILES["form-img"]["name"], PATHINFO_EXTENSION);
    if (!file_exists($_FILES["form-img"]["tmp_name"])) {
        $errmsg = "Choose image file to upload.";
        array_push($errors, $errmsg);
    }  
    else if (!in_array($file_extension, $allowed_image_extension)) {
        $errmsg = "Upload valiid images. Only PNG and JPEG are allowed.";
        array_push($errors, $errmsg);
    }   
    else if (($_FILES["form-img"]["size"] > 2000000)) {
        $errmsg = "Image size exceeds 20MB";
        array_push($errors, $errmsg);
    }   


    if ($gender == 1) {
        $gender = "M";
    } else {
        $gender = "F";
    }
    if (count($errors) <= 0) {
        $emailCheck = $conn->prepare("Select * from users where email=?");
        $emailCheck->execute([$email]);
        if ($emailCheck->rowCount() <= 0) {
            $emailCheck = null;
            //Image 2




            $profilepic = $_FILES['form-img']['name'];
            $expProfilepic = explode('.', $profilepic);
            $profilepicExptype = $expProfilepic[1];
            $date = date('m/d/Yh:i:sa', time());
            $rand = rand(10000, 99999);
            $encname = $date . $rand;
            $profilepicName = md5($encname) . '.' . $profilepicExptype;
            $profilepicPath = "../uploads/user-img/" . $profilepicName;

            if (move_uploaded_file($_FILES["form-img"]["tmp_name"], $profilepicPath)) { } else {
                $errmsg = "Problem in uploading image files.";
                array_push($errors, $errmsg);
            }

            if (count($errors) <= 0) {
                $password = password_hash($password, PASSWORD_DEFAULT);

                $user = new User(
                    2,
                    $firstname,
                    $lastname,
                    $email,
                    $birthdate,
                    $gender,
                    $address,
                    $city,
                    $state,
                    $postal,
                    $phone,
                    $password,
                    $profilepicName
                );
                try {

                    $createUser = $user->createUser($conn);
                } catch (Exception $e) {
                    $errmsg = "We have faced some problems. Please try again.".
                        " <br>If this error happens again please contact us.";
                    array_push($errors, $errmsg);
                    $_SESSION['errors'] = $errors;
                    header('location: ' . $_SERVER["HTTP_REFERER"]);
                    die();
                }

                $insertedId = $conn->lastInsertId();
                $getRole = $conn->prepare("Select id, roleId, email, firstname from users where id=?");
                $getRole->execute([$insertedId]);
                $roleId = $getRole->fetch();

                $_SESSION["token"] = generateJWT($roleId['id'], $roleId['roleId'], $roleId['email'], $roleId['firstname']);

                $path = $_SERVER['PHP_SELF'];
                $path = explode('/', $path);

                if (in_array('main', $path)) {
                    header("location: ../main/index.php");
                    die();
                } else {
                    $_SESSION['errors'] = null;
                    $_SESSION['sucess'] = "User created successfuly.";
                    header('location: ' . $_SERVER["HTTP_REFERER"]);
                    die();
                }
            } else {
                $_SESSION['errors'] = $errors;
                header('location: ' . $_SERVER["HTTP_REFERER"]);
                die();
            }
        } else {
            $emailErr = "Email alredy exists";
            $errors . array_push($emailErr);
            $_SESSION['errors'] = $errors;
            header('location: ' . $_SERVER["HTTP_REFERER"]);
            die();
        }
    } else {
        $_SESSION['errors'] = $errors;
        header('location: ' . $_SERVER["HTTP_REFERER"]);
        die();
    }
}
