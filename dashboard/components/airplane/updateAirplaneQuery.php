<?php
include "../../../databaseConfig.php";
include "../../../models/airplanes.php";
include "../../../global/validations.php";

session_start();

$errors = array();



if (isset($_POST['updateAirplane'])) {

    $planeId = $_POST['updateAirplane'];

    $_SESSION['sukses'] = "";
    $_SESSION['gabimet'] = $errors;
    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );

    $name = strip_tags($_POST['name']);
    $name = str_replace(' ', '', $name);
    $name = ucfirst(strtolower($name));
    $name = trim(ucfirst(strtolower($name)));

    $yearOfProd = (int)$_POST['yearOfProd'];
    $seats = (int)$_POST['seats'];
    $fuelCapacity = (int)$_POST['fuelCapacity'];
    $maxspeed = (int)$_POST['maxspeed'];
    $additionalDesc = $_POST['additionalDesc'];


    if ($_FILES["img"]["error"] === 0) {
        $file_extension = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
        if (!file_exists($_FILES["img"]["tmp_name"])) {
            $errmsg = "Choose image file to upload.";
            array_push($errors, $errmsg);
            print_r($errors);
        }
        if (!in_array($file_extension, $allowed_image_extension)) {
            $errmsg = "Upload valiid images. Only PNG and JPEG are allowed.";
            array_push($errors, $errmsg);
        } else if (($_FILES["img"]["size"] > 8000000)) {
            $errmsg = "Image size exceeds 8MB";
            array_push($errors, $errmsg);
        }
    }

    if ($yearOfProd > 0) {

        if (!check_year($yearOfProd)) {
            $errmsg = "Invalid year";
            array_push($errors, $errmsg);
        }
    } else {
        $errmsg = "Negative number of year is not allowed";
        array_push($errors, $errmsg);
    }

    if ($seats < 0) {
        $errmsg = "Negative number of seats is not allowed";
        array_push($errors, $errmsg);
    } else if ($seats == '') {
        $errmsg = "Null value of seats is not allowed";
        array_push($errors, $errmsg);
    }

    if ($fuelCapacity < 0) {
        $errmsg = "Negative number of fuelCapacity is not allowed";
        array_push($errors, $errmsg);
    } else if ($fuelCapacity == '') {
        $errmsg = "Null value of fuelCapacity is not allowed";
        array_push($errors, $errmsg);
    }

    if ($maxspeed < 0) {
        $errmsg = "Negative number of maxspeed is not allowed";
        array_push($errors, $errmsg);
    } else if ($maxspeed == '') {
        $errmsg = "Null value of maxspeed is not allowed";
        array_push($errors, $errmsg);
    }

    if (count($errors) <= 0) {

        if ($_FILES["img"]["error"] === 0) {

            $profilepic = $_FILES['img']['name'];
            $expProfilepic = explode('.', $profilepic);
            $profilepicExptype = $expProfilepic[1];
            $date = date('m/d/Yh:i:sa', time());
            $rand = rand(10000, 99999);
            $encname = $date . $rand;
            $profilepicName = md5($encname) . '.' . $profilepicExptype;
            $profilepicPath = "../../../uploads/airplane-img/" . $profilepicName;
            echo $profilepicPath;
            if (move_uploaded_file($_FILES["img"]["tmp_name"], $profilepicPath)) { 
                echo "The file ". basename( $_FILES["img"]["name"]). " has been uploaded.";
            } else {
                $errmsg = "Problem in uploading image files.";
                array_push($errors, $errmsg);
            }
        }
        if (count($errors) === 0) {
            $finalImg = $_FILES["img"]["error"] === 0 ?  $profilepicName : null;

            $objAirplane = new Airplane(
                $name,
                $yearOfProd,
                $seats,
                $fuelCapacity,
                $maxspeed,
                $additionalDesc,
                $finalImg
            );

            print_r($objAirplane->update($conn, $planeId));


            $_SESSION['sukses'] = "Airplane Updated sucessfuly";
            header('location: ' . $_SERVER["HTTP_REFERER"]);
            die();

        }
    } else {
        $_SESSION['gabimet'] = $errors;
        header('location: ' . $_SERVER["HTTP_REFERER"]);
        die();
    }
}
