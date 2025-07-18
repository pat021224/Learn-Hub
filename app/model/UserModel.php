<?php
namespace App\Model;
use App\Core\Database;
class UserModel extends Database{
    function checkRoles($table, $email){
        $query = "SELECT * FROM `$table` WHERE email = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$email]);
        return $stmt->fetchAll();
    }
    function createUser($email, $password, $role){
        $query = "INSERT INTO user (email, password, role) VALUES(?, ?, ?)";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([$email, $password, $role]);
    }
    function getByEmail($email){
        $query = "SELECT * FROM user WHERE email = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$email]);
        return $stmt->fetch();
    }
    function getByRole($table, $email){
        $query = "SELECT * FROM `$table` WHERE email = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$email]);
        return $stmt->fetch();
    }
 
}