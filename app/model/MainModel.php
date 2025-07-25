<?php
namespace App\Model;
use App\Core\Database;
class MainModel extends Database{
    public function insert(string $table, array $data){
        $columns = implode(", ", array_keys($data));
        $placeholder = implode(", ", array_fill(0, count($data), '?'));
        $query = "INSERT INTO $table ($columns) VALUES($placeholder)";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute(array_values($data));
    }
    public function getLastId(string $table){
        $query = "SELECT id FROM $table ORDER BY id DESC LIMIT 1";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function getAll(string $field, string $table, string $column, mixed $data){
        $query = "SELECT $field FROM $table WHERE $column = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$data]);
        return $stmt->fetchAll();
    }
    public function getBy(string $field, string $table, string $column, mixed $data){
        $query = "SELECT $field FROM $table WHERE $column = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$data]);
        return $stmt->fetch();
    }
    public function delete(string $table, string $column, int $data){
        $query = "DELETE FROM $table WHERE $column = ?";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([$data]);
    }
    public function update(string $table, array $data, string $column, mixed $target){
        $setPart = implode(', ', array_map(fn($key) => "`$key` = ?", array_keys($data)));
        $query = "UPDATE $table SET $setPart WHERE $column = ?";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute(array_merge(array_values($data), [$target]));
    }
    public function search(string $table, array $field, mixed $keyword){
        $columns = implode(" LIKE ? OR ", $field) . " LIKE ?";
        $data = array_fill(0, count($field), "%$keyword%");
        $query = "SELECT * FROM $table WHERE $columns";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute($data);
        return $stmt->fetchAll();
    }
}