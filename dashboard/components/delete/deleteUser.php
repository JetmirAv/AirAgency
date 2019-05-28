<?php
    include '../../../databaseConfig.php';

        if(isset($_REQUEST['id'])){
            
            $deleteQuery = "delete from users where id = ?";
            $deleteUser = $conn->prepare($deleteQuery);
            $deleteUser->execute([$_REQUEST['id']]);
            if($deleteUser->rowCount() > 0){
                header("location: " . $_SERVER["HTTP_REFERER"]);
            } else {
                header("location: " . $_SERVER["HTTP_REFERER"]);                
            }
        } else {
            // echo "Wrong";
            header('location: index.php');
        }



    

?>