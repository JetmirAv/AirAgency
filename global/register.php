<?php
include_once("../databaseConfig.php");
include_once("generateJWT.php");
include_once("validations.php");

session_start();


echo "Fillimi";

// REGISTER USER
if (isset($_POST['register'])) {

    $_SESSION['sucess'] = "";

    $errors = array();
    $_SESSION['errors'] = $errors;
    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );

    // receive all input values from the form
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

    // Get image file extension
    $file_extension = pathinfo($_FILES["form-img"]["name"], PATHINFO_EXTENSION);
    echo "<br/>";
    echo $email;
    echo "<br/>";
    print_r($_FILES['form-img']);
    echo "<br/>";
    echo !file_exists($_FILES["form-img"]["tmp_name"]) ? 'true' : 'false';
    echo "<br/>";
    // Validate file input to check if is not empty
    if (!file_exists($_FILES["form-img"]["tmp_name"])) {
        $errmsg = "Choose image file to upload.";
        array_push($errors, $errmsg);
    }    // Validate file input to check if is with valid extension
    else if (!in_array($file_extension, $allowed_image_extension)) {
        $errmsg = "Upload valiid images. Only PNG and JPEG are allowed.";
        array_push($errors, $errmsg);
    }    // Validate image file size
    else if (($_FILES["form-img"]["size"] > 2000000)) {
        $errmsg = "Image size exceeds 2MB";
        array_push($errors, $errmsg);
    }    // Validate image file dimensi..on


    if ($gender == 1) {
        $gender = "M";
    } else {
        $gender = "F";
    }

    // echo $firstname . " " .  $lastname . " " .  
    // $email . " " .  $password . " " . 
    // $birthdate . " Gender: " . 		$gender . " Address: " . 
    // $address . " " . 
    // $city . " " . 
    // $state . " " . 
    // $postal . " " . 
    // $phone ;

    //Email check 

    // echo $emailCheck->rowCount();
    // echo "<br>";
    // echo gettype($emailCheck);
    // echo "<br>";		
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
                $createUser = $conn->prepare("INSERT INTO users" .
                    "(roleId, firstname, lastname, email, password, birthday," .
                    " gendre, address, city, state, postal, phoneNumber, img) " .
                    "VALUES " .
                    "(2, :firstname, :lastname, :email, :password, :birthday," .
                    " :gendre, :address, :city, :state, :postal, :phoneNumber, :img) ");
                $createUser->execute([
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'email' => $email,
                    'password' => $password,
                    'birthday' => $birthdate,
                    'gendre' => $gender,
                    'address' => $address,
                    'city' => $city,
                    'state' => $state,
                    'postal' => $postal,
                    'phoneNumber' => $phone,
                    'img' => $profilepicName
                ]);
                echo "<br>" . "<br>";

                echo $createUser->rowCount();
                $arr = $createUser->errorInfo();
                print_r($arr);
                $insertedId = $conn->lastInsertId();

                $getRole = $conn->prepare("Select roleId from users where id=?");
                $getRole->execute([$insertedId]);

                $roleId = $getRole->fetch();
                print_r($roleId);
                print($roleId['roleId']);
                $_SESSION["token"] = generateJWT($insertedId, $roleId['roleId'], $email, $firstname);

                //Redirecting ...
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
