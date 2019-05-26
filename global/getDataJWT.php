<?php 
    include_once("base64EncDec.php");

    function getDataJWT($token){
        $payload = explode('.', $token)[1];
        $payloadDecoded = base64UrlDecode($payload);
        return json_decode($payloadDecoded);
    }


?>