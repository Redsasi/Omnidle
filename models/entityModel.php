<?php
require_once '../models/model.php';

class EntityModel extends Model{
    private $table_name = "OD_ENTITY";
    
    public function creat($name, $image, $quizzId){
        $query = "INSERT INTO " . $this->table_name . " (ENTITY_NAME, ENTITY_IMAGE, QUIZZ_ID) VALUES (:name, :image, :quizzId)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":image", $image);
        $stmt->bindParam(":quizzId", $quizzId);
        $stmt->execute();
    }
    
    public function getAllAttributsByQuizzId($quizzId){
        $query = "SELECT * FROM " . $this->table_name . " WHERE QUIZZ_ID = :quizzId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":quizzId", $quizzId);
        $stmt->execute();
    }
}