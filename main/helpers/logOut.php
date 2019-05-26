<?php

        // session_destroy();
        echo "Hello";
        header('location: {$_SERVER["HTTP_REFERER"]}');

?>