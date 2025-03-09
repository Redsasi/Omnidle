<?php
require_once '../models/model.php';

class DleGameModel extends Model{
    private $table_name = "OD_QUIZZ";

    public function creat($name, $image, $description , $userId){
        $query = "INSERT INTO " . $this->table_name . " (QUIZZ_NAME, QUIZZ_IMAGE, QUIZZ_DESCRIPTION, USER_ID) VALUES (:name, :image, :description, :userId )";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":image", $image);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":userId", $userId);
        $stmt->execute();
    }

    public function readAll(){
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readQuizzById($quizzId){
        $query = "SELECT * FROM " . $this->table_name . " WHERE QUIZZ_ID = :quizzId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":quizzId", $quizzId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function readByUserId($userId){
        $query = "SELECT * FROM " . $this->table_name . " WHERE USER_ID = :userId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":userId", $userId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function updateByIdImage($quizzId, $name, $image, $description){        
        $query = "UPDATE " . $this->table_name . " set QUIZZ_NAME = :name, QUIZZ_IMAGE = :image, QUIZZ_DESCRIPTION = :description WHERE QUIZZ_ID = :quizzId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":image", $image);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":quizzId", $quizzId);
        $stmt->execute();
    }
    public function updateById($quizzId, $name, $description){
        $query = "UPDATE " . $this->table_name . " set QUIZZ_NAME = :name, QUIZZ_DESCRIPTION = :description WHERE QUIZZ_ID = :quizzId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":quizzId", $quizzId);
        $stmt->execute();
    }

    public function deletById($quizzId){
        $query = "DELETE FROM " . $this->table_name . " WHERE QUIZZ_ID = :quizzId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":quizzId", $quizzId);
        $stmt->execute();
    }

    public function getFullEntitesOfQuizzById($quizzId){
        $query = "DELETE FROM " . $this->table_name . " WHERE QUIZZ_ID = :quizzId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":quizzId", $quizzId);
        $stmt->execute();
    }

    
}