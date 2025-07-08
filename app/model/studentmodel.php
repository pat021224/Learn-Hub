<?php

namespace app\model;

use app\core\database;
require_once __DIR__ . '/../core/database.php';

//received data from *studentcontroller.php* / *function store()*
//then save to database
class studentModel extends Database{
    function insertStudent($firstname, $middlename, $lastname, $gender, $dob,
        $email, $studentcontact, $guardianname, $guardiancontact, $province, 
        $municipality, $barangay, $street, $zipcode, $course, $yearlevel, 
        $section, $schoolyear, $studentId){

        $query = "INSERT INTO students (
            first_name, middle_name, last_name, gender, dob, email, student_contact, 
            guardian_name, guardian_contact, province, municipality, barangay, street, 
            zipcode, course, year_level, section, school_year, student_id_number
        ) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->connect()->prepare($query);
        $stmt->execute([
            $firstname, $middlename, $lastname, $gender, $dob,
            $email, $studentcontact, $guardianname, $guardiancontact,
            $province, $municipality, $barangay, $street, $zipcode, 
            $course, $yearlevel, $section, $schoolyear, $studentId
        ]);
    }

    //receive course data from *studentcontroller.php* / *function generateStudentId()*
    //use the data to count existing student in the database.
    //result will send back to controller
    function getCourseCount($course, $schoolyear){
        $query = "SELECT * FROM students WHERE course = ? AND school_year = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$course, $schoolyear]);
        return $stmt->fetchColumn();
        
    }
}