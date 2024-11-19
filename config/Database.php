<?php
class Database {
    private static $connection = null;
    private static $host = 'localhost';
    private static $dbname = 'omnidle';
    private static $username = 'root';
    private static $password = '';
    
    private function __construct(){

    }

    public static function getConnection() {
        if (self::$connection === null) {
            try {
                self::$connection = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname, self::$username, self::$password);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Database connection error: " . $e->getMessage());
            }
        }
        return self::$connection;
    }

}