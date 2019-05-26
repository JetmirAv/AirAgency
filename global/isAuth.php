<?php 
    echo "isAuth";
    if(!$isAuth){
        echo "isAuth";

        $path = ende(explode('/',$_SERVER['PHP_SELF']));
        echo "<script>console.log('" . $_SERVER['PHP_SELF'] ." ". $path . "');</script>";

        switch ($path){
            case 'flights.php':
                header('location: login.php'); 
                die();
                break;
            default: 
                break;                
        }
       
       
    }
 
?>
