<?php
include_once("../dbConfig.php");
include_once("base64EncDec.php");


    function verifyJWT(string $token): bool
    {
        list($headerEncoded, $payloadEncoded, $signatureEncoded) = explode('.', $token);
     
        $dataEncoded = "$headerEncoded.$payloadEncoded";
     
        $signature = base64UrlDecode($signatureEncoded);
     
        $rawSignature = hash_hmac('sha256', $dataEncoded, JWT_SECRET_KEY, true);
     
        return hash_equals($rawSignature, $signature);
    }
     



?>