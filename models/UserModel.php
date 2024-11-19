<?php
require '../models/model.php';

class UserModel extends Model{
    private $table_name = "OD_USER";

    public function creat($pseudo, $email , $password){
        $query = "INSERT INTO " . $this->table_name . " (USER_PSEUDO, USER_EMAIL, USER_PASSWORD) VALUES (:pseudo, :email, :password)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":pseudo", $pseudo);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        return $stmt->execute();
    }

    public function readAll(){
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function readById($id){
        $query = "SELECT * FROM " . $this->table_name . " WHERE USER_ID = :id LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }

    public function readByEmail($email){
        $query = "SELECT * FROM " . $this->table_name . " WHERE USER_EMAIL = :email LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }
}