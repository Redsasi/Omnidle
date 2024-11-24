<?php

require_once 'ConnectionParam.php';

class Database {
    private static $connection = null;
    
    private function __construct(){

    }

    public static function getConnection() {
        if (self::$connection === null) {
            try {
                self::$connection = new PDO("mysql:host=" . ConnectionParam::HOST . ";dbname=" . ConnectionParam::DBNAME, ConnectionParam::USER, ConnectionParam::PASS);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Database connection error: " . $e->getMessage());
            }
        }
        return self::$connection;
    }

}