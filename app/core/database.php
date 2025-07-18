<?php
namespace App\Core;

use PDO;
use PDOException;

class Database{
        private $conn;

        public function __construct(){
            $config = include __DIR__ . '/../../config/dbconfig.php';

            $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8mb4";
            
            try {
                $this->conn = new PDO($dsn, $config['user'], $config['pw']);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch(PDOException $e) {
                die("Database Connection Failed: " . $e->getMessage());
            }
        }

        public function connect(){
            return $this->conn;
        }

       
    }
?>