<?php



abstract class DbConnection
{
    private const HOST =  "localhost";
    private const DBNAME = "airagency";
    private const USERNAME = "root";
    private const PASSWORD = "Password1234!";
    private const JWT_SECRET_KEY = "somesupersecretkeytoencryptpasswords";
    private $dsn = "mysql:host=" . HOST . ";dbname=" . DBNAME;
    

    

    abstract function createConn();

    function getDSN(){
        return $this->dsn;
    }

    function getUSERNAME(){
        return USERNAME;
    }

    function getPASSWORD(){
        return PASSWORD;
    }
}
