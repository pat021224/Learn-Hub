<?php
namespace App\Controller;
use App\Model\TeacherModel;
use App\Core\Validator;
use App\Model\MainModel;

class TeacherController{
    private $validator;
    private $Model;
    private $MainModel;

    public function __construct(){
        $this->validator = new Validator();
        $this->Model = new TeacherModel();
        $this->MainModel = new MainModel();
    }

    public function store(){
        $validate = $this->validator->formValidation($_POST);
        $errors = $validate['errors'];
        if(!empty($errors)){
            foreach($errors as $error){
                echo  $error;
            }
            return;
        }

        $data = $validate['sanitized'];
        $success = $this->Model->addTeacher(
            $data['first_name'], $data['middle_name'], $data['last_name'], $data['gender'],
            $data['dob'], $data['email'], $data['phone_number'], $data['nationality'],
            $data['province'], $data['municipality'], $data['barangay'], $data['street'],
            $data['zipcode'], $data['department']
        );
        if($success){
            echo "{$data['first_name']} {$data['middle_name']} {$data['last_name']} teachers profile is succesfully created.";
        }
    }

    public function show(){
        $data = $this->MainModel->getAll('*', 'teacher', 'is_deleted', 0);
        foreach($data as $row){
            echo "<tr>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['middle_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['department'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td class='text-center'>
                    <a href='edit-teacher?id=" . $row['id'] . "' title='Edit' class='btn btn-outline-primary btn-sm'><i class='bi bi-pencil'></i></a>
                    <a href='#' title='Profile' id='" . $row['id'] . "' class='btn btn-outline-secondary btn-sm'><i class='bi bi-person-circle'></i></a>
                    <a href='#' title='Delete' id='teacher' data-id='" . $row['id'] . "' class='delete btn btn-outline-warning btn-sm' data-bs-toggle='modal' data-bs-target='#confirmation-modal'><i class='bi bi-trash text-danger'></i></a></td>";
            echo "</tr>";
        }
    }
    public function showArchivedTeacher(){
        $data = $this->MainModel->getAll('*', 'teacher', 'is_deleted', 1);
        foreach($data as $row){
            echo "<tr>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['middle_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row['department'] . "</td>";
            echo "<td><a href='#' title='Restore' id='teacher' data-id='" . $row['id'] . "' class='restore btn btn-outline-primary btn-sm' data-bs-toggle='modal' data-bs-target='#confirmation-modal'><i class='bi bi-arrow-counterclockwise'></i></a>
                    <a href='#' title='Delete' id='teacher' data-id='" . $row['id'] . "' class='permanent-delete btn btn-outline-danger btn-sm' data-bs-toggle='modal' data-bs-target='#confirmation-modal'><i class='bi bi-trash text-danger'></i></a></td>";
            echo "</tr>";
        }
    }

}