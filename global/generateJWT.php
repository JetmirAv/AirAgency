<?php
include_once("../dbConfig.php");
include_once("base64EncDec.php");

    function generateJWT($id, $role, $email, $name): string 
        {

        $header = [
            "alg"     => "HS256",
            "typ"     => "JWT"
        ];

        $payload = [
            "id"        => $id,
            "role"      => $role,
            "email"     => $email,
            "name"      => $name
        ];
        $headerEncoded = base64UrlEncode(json_encode($header));
     
        $payloadEncoded = base64UrlEncode(json_encode($payload));
     
        // Delimit with period (.)
        $dataEncoded = "$headerEncoded.$payloadEncoded";
     
        $rawSignature = hash_hmac('sha256', $dataEncoded, JWT_SECRET_KEY, true);
     
        $signatureEncoded = base64UrlEncode($rawSignature);
     
        // Delimit with second period (.)
        $jwt = "$dataEncoded.$signatureEncoded";
     
        return $jwt;
    }


?>