<?php
include_once("../../databaseConfig.php");
include_once("../../global/validations.php");

if(isset($_POST['email']))
{   
    $errors = array();
    $email = strtolower(trim($_POST['email']));
//    $email=$_POST['email'];
    if (valid_email($email)) 
    {
    
    $sql="INSERT INTO subscribers (email) VALUES (:email)";
    $insertStm = $conn->prepare($sql);
    $pdoExec = $insertStm->execute(array(":email"=>$email));

    if($pdoExec)
    {
    echo "You have been successfully subscribed.";
    }
    
    else
    {
        echo "You have subscribed before with this email.";
    }
    }
    else
    {        
        $errmsg = "Invalid email";
        array_push($errors, $errmsg);
    }
}

?>


 
