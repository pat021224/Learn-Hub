<?php

namespace app\model;

use app\core\database;
require_once __DIR__ . '/../core/database.php';

//received data from *studentcontroller.php* / *function store()*
//then save to database
class studentModel extends Database{
    function insertStudent($firstname, $middlename, $lastname, $gender, $dob,
        $email, $studentcontact, $guardianname, $guardiancontact, $nationality, $province, 
        $municipality, $barangay, $street, $zipcode, $course, $yearlevel, 
        $section, $schoolyear, $studentId){

        $query = "INSERT INTO students (
            first_name, middle_name, last_name, gender, dob, email, student_contact, 
            guardian_name, guardian_contact, nationality, province, municipality, barangay, street, 
            zipcode, course, year_level, section, school_year, student_id_number
        ) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([
            $firstname, $middlename, $lastname, $gender, $dob,
            $email, $studentcontact, $guardianname, $guardiancontact,
            $nationality, $province, $municipality, $barangay, $street, $zipcode, 
            $course, $yearlevel, $section, $schoolyear, $studentId
        ]);
    }

    //receive course data from *studentcontroller.php* / *function generateStudentId()*
    //use the data to count existing student in the database.
    //result will send back to controller
    function getCourseCount($course, $schoolyear){
        $query = "SELECT COUNT(*) FROM students WHERE course = ? AND school_year = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$course, $schoolyear]);
        return $stmt->fetchColumn();
        
    }

    //get all data of students that are not deleted
    function getStudentList(){
        $query = "SELECT * FROM students WHERE is_deleted = 0";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(); 
    }

    //update student data
    function updateStudent($firstname, $middlename, $lastname, $gender, $dob,
        $email, $studentcontact, $guardianname, $guardiancontact, $nationality, $province, 
        $municipality, $barangay, $street, $zipcode, $course, $yearlevel, 
        $section, $schoolyear, $status, $id){

        $query = "UPDATE students
            SET
            first_name = ?, middle_name = ?, last_name = ?, gender = ?, dob = ?, email = ?, student_contact = ?, 
            guardian_name = ?, guardian_contact = ?, nationality = ?, province = ?, municipality = ?, barangay = ?, street = ?, 
            zipcode = ?, course = ?, year_level = ?, section = ?, school_year = ?, status = ?
            WHERE id = ?";

        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([
            $firstname, $middlename, $lastname, $gender, $dob,
            $email, $studentcontact, $guardianname, $guardiancontact,
            $nationality, $province, $municipality, $barangay, $street, $zipcode, 
            $course, $yearlevel, $section, $schoolyear, $status, $id
        ]);
    }

    //get student by id
    function getById($id){
        $query = "SELECT * FROM students WHERE id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    //soft delete the student data
    function deleteStudent($id){
       $query = "UPDATE students SET is_deleted = 1 WHERE id = ?";
       $stmt = $this->connect()->prepare($query);
       return $stmt->execute([$id]);
    }
}