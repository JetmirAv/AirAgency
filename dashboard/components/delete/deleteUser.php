<?php
    include '../../../databaseConfig.php';

        if(isset($_REQUEST['id'])){
            
            $deleteQuery = "delete from users where id = ?";
            $deleteUser = $conn->prepare($deleteQuery);
            $deleteUser->execute([$_REQUEST['id']]);
            if($deleteUser->rowCount() > 0){
                $_SESSION['deleteSucess'] = "Sukses";
                header("location: " . $_SERVER["HTTP_REFERER"]);
            } else {
                $_SESSION['deleteError'] = "Error";

                header("location: " . $_SERVER["HTTP_REFERER"]);                
            }
        } else {
            // echo "Wrong";
            $_SESSION['deleteError'] = "Error";
            header('location: index.php');
        }



    

?>