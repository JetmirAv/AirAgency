<?php


include "../../../databaseConfig.php";
include "../../../models/airplanes.php";
session_start();




$errors = array();
$_SESSION['success'] = "";
$_SESSION['errors'] = $errors;

if (isset($_POST['insertAirplane'])) {
    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );

    $name = $_POST['name'];
    try {
        $yearOfProd = (int)$_POST['yearOfProd'];
        $seats = (int)$_POST['seats'];
        $fuelCapacity = (int)$_POST['fuelCapacity'];
        $maxspeed = (int)$_POST['maxspeed'];
    } catch (Exception $ex) { }
    $additionalDesc = $_POST['additionalDesc'];

    // $doesExistFile = $_FILES["img"]["error"];


    if ($yearOfProd < 0) {
        $errmsg = "Year Of Product must be positive";
        array_push($errors, $errmsg);
    } else if ($yearOfProd == '') {
        $errmsg = "Year Of Product can not be null";
        array_push($errors, $errmsg);
    }

    if ($seats < 0) {
        $errmsg = "Seats value must be positive";
        array_push($errors, $errmsg);
    } else if ($seats == '') {
        $errmsg = "Seats  can not be null";
        array_push($errors, $errmsg);
    }

    if ($fuelCapacity < 0) {
        $errmsg = "Fuel Capacity must be positive";
        array_push($errors, $errmsg);
    } else if ($fuelCapacity == '') {
        $errmsg = "Fuel Capacity can not be null";
        array_push($errors, $errmsg);
    }

    if ($maxspeed < 0) {
        $errmsg = "maxspeed must be positive";
        array_push($errors, $errmsg);
    } else if ($maxspeed == '') {
        $errmsg = "maxspeed can not be null";
        array_push($errors, $errmsg);
    }
    if (isset($_FILES["img"])) {
        $file_extension = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);
        // Validate file input to check if is not empty
        if (!file_exists($_FILES["img"]["tmp_name"])) {
            $errmsg = "Choose image file to upload.";
            array_push($errors, $errmsg);
        }    // Validate file input to check if is with valid extension
        else if (!in_array($file_extension, $allowed_image_extension)) {
            $errmsg = "Upload valiid images. Only PNG and JPEG are allowed.";
            array_push($errors, $errmsg);
        }    // Validate image file size
        else if (($_FILES["img"]["size"] > 2000000)) {
            $errmsg = "Image size exceeds 2MB";
            array_push($errors, $errmsg);
        }    // Validate image file dimensi..on

        if ($additionalDesc == '') {
            $errmsg = "Write a description please ";
            array_push($errors, $errmsg);
        }
    }


    if (count($errors) <= 0) {

        $profilepic = $_FILES['img']['name'];
        $expProfilepic = explode('.', $profilepic);
        $profilepicExptype = $expProfilepic[1];
        $date = date('m/d/Yh:i:sa', time());
        $rand = rand(10000, 99999);
        $encname = $date . $rand;
        $profilepicName = md5($encname) . '.' . $profilepicExptype;
        $profilepicPath = "../../../uploads/airplane-img/" . $profilepicName;

        if (move_uploaded_file($_FILES["img"]["tmp_name"], $profilepicPath)) { } else {
            $errmsg = "Problem in uploading image files.";
            array_push($errors, $errmsg);
        }

        $objAirplane = new Airplane(
            $name,
            $yearOfProd,
            $seats,
            $fuelCapacity,
            $maxspeed,
            $additionalDesc,
            $img
        );

        $objAirplane->

        $insertPlane = "insert into airplane (name, yearOfProd, seats, fuelCapacity, maxspeed, additionalDesc,img) values (:name, :yearOfProd, :seats, :fuelCapacity, :maxspeed, :additionalDesc,:img) ;";
        $insertStm = $conn->prepare($insertPlane);
        $pdoExec = $insertStm->execute(array(":name" => $name, ":yearOfProd" => $yearOfProd, ":seats" => $seats, ":fuelCapacity" => $fuelCapacity, ":maxspeed" => $maxspeed, ":additionalDesc" => $additionalDesc, ":img" => $profilepicName));

        $_SESSION['success'] = "User Inserted sucessfuly";
        header('location: ' . $_SERVER["HTTP_REFERER"]);
    } else {
        $_SESSION['errors'] = $errors;
        header('location: ' . $_SERVER["HTTP_REFERER"]);
        die();
    }
}
