<?php
    include '../../../databaseConfig.php';

        if(isset($_REQUEST['id'])){
            
            $deleteQuery = "delete from users where id = ?";
            $deleteUser = $conn->prepare($deleteQuery);
            $deleteUser->execute([$_REQUEST['id']]);
            if($deleteUser->rowCount() > 0){
                echo "Sukses";
            } else {
                echo "Deshtim";
            }
        } else {
            echo "Wrong";
            // header('location: index.php');
        }



    

?>