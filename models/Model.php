<?php
require '../config/Database.php';
abstract class Model{
    protected $db;
    
    public function __construct() {
        $this->db = Database::getConnection();
    }

}