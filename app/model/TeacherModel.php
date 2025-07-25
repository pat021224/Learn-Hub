<?php
namespace App\Model;
use App\Core\Database;
class TeacherModel extends Database{
    function addTeacher($firstname, $middlename, $lastname, $gender, $dob, $email,
            $phonenumber, $nationality, $province, $municipality, $barangay,
            $street, $zipcode, $department){

        $query = "INSERT INTO teacher (
                first_name, middle_name, last_name, gender, dob, email,
                phone_number, nationality, province, municipality, barangay,
                street, zipcode, department
            ) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([$firstname, $middlename, $lastname, $gender, $dob, $email,
            $phonenumber, $nationality, $province, $municipality, $barangay,
            $street, $zipcode, $department]);
    }
    public function getByIsDeleted($table, $isDeleted){
        $query = "SELECT * FROM `$table` WHERE is_deleted = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$isDeleted]);
        return $stmt->fetchAll();
    }
}