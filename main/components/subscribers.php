<?php
include_once("../../databaseConfig.php");


//function valid_email($str)
//{
//    return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
//}
    $email = $_POST['email'];
  //  $insertSubscribers = "insert into subscribers (email) value (:email) ;";
//    $insertStm = $conn->prepare($insertSubscribers);
   // $pdoExec = $insertStm->execute(array(":email"=>$email));
    echo $email;


//public function htmlfilter($form_data)
//{
//    $form_Fata = trim(stripcslashes(htmlpecialchars($form_data)));
//    return $form_data;
//}




//if(isset($_POST['email_data_values']))
//{
//    $emailRecv = $_POST['email_data_values'];
//    $insert = $podExec("email",$emailRecv);
//    if($insert)
//    {
//        echo "you subscribed";
//    }
//    
//}









//if(isset($_POST['email_data_values']))
//{
//    $n_email = $_POST['email_data_values'];
//    $email = $email_access->htmlfilter($n_email);
//}
//
//if(preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$email))
//{
//    $_email_field['email'] = $email;
//    $email_check = $email_access->email_exists("email",$email_field);
//    
//    if($email_check){
//        $insertStm = $email_access->insert("email",$email_field);
//        
//        if($insertStm)
//        {
//            echo "Thank you for subscribe";
//        }
//        else{
//            echo "Not subscribed";
//            return false;
//        }
//    }
//    else{
//        echo "you have already subscribed";
//        return false;
//    }
//    
//    
//}
//else(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$email))
//{
//    echo "error";
//}
//





//echo $_POST['email'];


?>

 
