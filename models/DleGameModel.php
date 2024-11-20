<?php
require_once '../models/model.php';

class DleGameModel extends Model{
    private $table_name = "OD_QUIZZ";

    public function creat($name, $image, $description , $userId){
        
        echo "DEBUG start of model";
        $query = "INSERT INTO " . $this->table_name . " (QUIZZ_NAME, QUIZZ_IMAGE, QUIZZ_DESCRIPTION, USER_ID) VALUES (:name, :image, :description, :userId )";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":image", $image);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":userId", $userId);
        echo "DEBUG before execute";
        $stmt->execute();
        echo "DEBUG after execute";
    }

    public function readAll(){
        
    }
    
    public function updateById(){

    }

    public function deletById(){

    }
    
}