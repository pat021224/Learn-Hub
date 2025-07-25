<?php
namespace App\Controller;
use App\Model\AdminModel;



class AdminController{
    private $model;

    public function __construct(){
        $this->model = new AdminModel();
    }

    public function getCount($table, $isDeleted){
        $data = $this->model->countUser($table, $isDeleted);
        echo $data; 
    }

    public function getUser($table, $isDeleted){
        $data = $this->model->getByIsDeleted($table, $isDeleted);
        foreach($data as $row){
            echo "<tr>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['role'] . "</td>";
            echo "</tr>";
        }
    }
}