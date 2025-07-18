<?php
namespace App\Controller;
use App\Model\TeacherModel;
use App\Core\Validator;

class TeacherController{
    private $validator;
    private $controller;

    public function __construct(){
        $this->validator = new Validator();
        $this->Model = new TeacherModel();
    }

    function store(){
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
}