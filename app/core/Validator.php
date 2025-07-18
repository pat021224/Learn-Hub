<?php

namespace App\Core;
class Validator{
    function formValidation(array $PostData){
        $data = array_map('trim', $PostData);
        $errors = [];

        foreach($data as $key => $value){
            if($value === ''){
                $fieldName = ucwords(str_replace('_', ' ', $key));
                $errors[] = "$fieldName is required. ";
            }
        }

        if(isset($data['email'])){
            $data['email'] = filter_var($data['email'], FILTER_SANITIZE_EMAIL);
            if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                $errors[] = "Invalid email format.";
            }  
        }

        if(isset($data['password'], $data['confirm_password'])){
            if($data['password'] !== $data['confirm_password']){
                $errors[] = "Password does not match.";
            }
        }

        $sanitized =  array_map('htmlspecialchars', $data);
        return [
            'errors' => $errors,
            'sanitized' => $sanitized
        ];
    }
}