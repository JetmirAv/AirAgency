<?php include 'components/constants.php' ?>

<?php 
  


if(isset($_POST['contactUs'])){
    
    $to = EMAIL;; // this is your Email address
    $from = $_POST['message-email']; // this is the sender's Email address
    $first_name = $_POST['message-name'];
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $first_name . " "  . " wrote the following:" . "\n\n" . $_POST['message'];
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    $backMsg = "<p style='color:green;'>Mail Sent. Thank you " . $first_name . ", we will contact you shortly.</p>";
    
    echo $backMsg;     
    

    
   /* mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    
*/
}
?>