<?php
namespace App\Controller;
use App\Model\UserModel;
use App\Core\Validator;

class UserController{
    private $Validator;
    private $Controller;

    public function __construct(){
        $this->Validator = new Validator();
        $this->Model = new UserModel();
    }
    //LOGIN USERS
    function login(){
        $validate = $this->Validator->formValidation($_POST);
        $errors = $validate['errors'];
        if(!empty($errors)){
            foreach($errors as $error){
                echo $error;
            }
            return;
        }
        $data = $validate['sanitized'];
        $userData = $this->Model->getByEmail($data['email']);
        if(!$userData){
            echo "Your email address is not yet registered.";
            return;
        }
        if(!password_verify($data['password'], $userData['password'])){
            echo "Incorrect password.";
            return;
        }
        $allowedRoles = ['teacher', 'student', 'admin'];
        $table = $userData['role'];
        if(!in_array($table, $allowedRoles)){
            echo "Invalid Role.";
            return;
        }
        $email = $userData['email'];
        $user = $this->Model->getByRole($table, $email);
        if(!$user){
            echo "User not found in $table table";
            return;
        }
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
        
        $_SESSION['id'] = $user['id'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $userData['role'];

        

        echo $_SESSION['role'];
    }
    //REGISTER USERS 
    public function register(){
        $validate = $this->Validator->formValidation($_POST);
        $errors = $validate['errors'];
        if(!empty($errors)){
            foreach($errors as $error){
                echo $error;
            }
            return;
        }
        $data = $validate['sanitized'];
        $password = password_hash($data['password'], PASSWORD_DEFAULT);

        $tables = [
            'student', 'user', 'teacher'
        ];
        $email = $data['email'];
        $role = null;
        
        foreach ($tables as $table) {
            $result = $this->Model->checkRoles($table, $email);
            if($result){
                $role = $table;
                break;
            }
        }
        
        if($role !== null){
            $success = $this->Model->createUser($email, $password, $role);
            if($success){
                echo "We sent a verification in your email. please verify your account";
            }else{
                echo "User registration fail!";
            }
        }else{
            echo "The email you entered is not recognized. 
            Only students or teachers registered by the school can create an account. 
            Please use the email you provided during enrollment or contact the school for assistance.";
        } 
        
    }

    

    
}