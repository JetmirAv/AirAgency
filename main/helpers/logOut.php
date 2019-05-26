<?php
        session_start();
        session_destroy();
        // $_SESSION['token'] = null;
        echo "Hello";
        header('location: ' . $_SERVER["HTTP_REFERER"]);

?>