<?php
namespace App\Model;
use App\Core\Database;
class AdminModel extends Database{

    function countUser($table, $isDeleted){
        $query = "SELECT COUNT(*) FROM `$table` WHERE is_deleted = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$isDeleted]);
        return  $stmt->fetchColumn();
    }

    function getByIsDeleted($table, $isDeleted){
        $query = "SELECT * FROM `$table` WHERE is_deleted = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$isDeleted]);
        return  $stmt->fetchAll();
    }
}