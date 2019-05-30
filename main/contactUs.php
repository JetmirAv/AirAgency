


<?php include "../databaseConfig.php";            ?>


<?php 

session_start();

require("../global/isLogged.php");
$userId = $_POST['userId'];
$subject = $_POST['subject'];
$content = $_POST['content'];
$rating = $_POST['rating'];
if($rating>=0){

$insertFeedBacks = "insert into feedbacks(userId,subject,content,rating)
values(:userId,:subject,:content,:rating)";
$insertStm = $conn->prepare($insertFeedBacks);
$pdoExecute = $insertStm -> execute(array(":userId"=>$userId,":subject"=>$subject,":content"=>$content,":rating"=>$rating));

echo "<p style='color:green;'>Mail Sent. Thank you " . $dataArr->name . ", we will contact you shortly.</p>";
} else {
    echo "<p style='color:red;'>Rating must be positive </p>";
}
?>