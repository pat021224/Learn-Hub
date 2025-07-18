<?php
namespace App\Model;
use App\Core\Database;

//received data from *studentcontroller.php* / *function store()*
//then save to database
class StudentModel extends Database{
    public function insertStudent($firstname, $middlename, $lastname, $gender, $dob,
        $email, $studentcontact, $guardianname, $guardiancontact, $nationality, $province, 
        $municipality, $barangay, $street, $zipcode, $course, $yearlevel, 
        $section, $schoolyear, $studentId){

        $query = "INSERT INTO student (
            first_name, middle_name, last_name, gender, dob, email, student_contact, 
            guardian_name, guardian_contact, nationality, province, municipality, barangay, street, 
            zipcode, course, year_level, section, school_year, student_id_number
        ) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([
            $firstname, $middlename, $lastname, $gender, $dob, $email, 
            $studentcontact, $guardianname, $guardiancontact, $nationality, 
            $province, $municipality, $barangay, $street, $zipcode, $course, 
            $yearlevel, $section, $schoolyear, $studentId
        ]);
    }

    //receive course data from *studentcontroller.php* / *function generateStudentId()*
    //use the data to count existing student in the database.
    //result will send back to controller
    public function getCourseCount($course, $schoolyear){
        $query = "SELECT COUNT(*) FROM student WHERE course = ? AND school_year = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$course, $schoolyear]);
        return $stmt->fetchColumn();
        
    }

    //get all data of students that are not deleted
    public function getByIsDeleted($isDeleted){
        $query = "SELECT * FROM student WHERE is_deleted = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$isDeleted]);
        return $stmt->fetchAll(); 
    }

    //update student data
    public function updateStudent($firstname, $middlename, $lastname, $gender, $dob,
        $email, $studentcontact, $guardianname, $guardiancontact, $nationality, 
        $province, $municipality, $barangay, $street, $zipcode, $course, $yearlevel, 
        $section, $schoolyear, $status, $id){

        $query = "UPDATE student
            SET
            first_name = ?, middle_name = ?, last_name = ?, gender = ?, dob = ?, email = ?, 
            student_contact = ?, guardian_name = ?, guardian_contact = ?, nationality = ?, 
            province = ?, municipality = ?, barangay = ?, street = ?, zipcode = ?, course = ?, 
            year_level = ?, section = ?, school_year = ?, status = ?
            WHERE id = ?";

        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([
            $firstname, $middlename, $lastname, $gender, $dob, $email, $studentcontact, 
            $guardianname, $guardiancontact, $nationality, $province, $municipality, 
            $barangay, $street, $zipcode, $course, $yearlevel, $section, $schoolyear, 
            $status, $id
        ]);
    }

    //get student by id
    public function getById($id){
        $query = "SELECT * FROM student WHERE id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    //soft delete the student data
    public function deleteStudent($id){
       $query = "UPDATE student SET is_deleted = 1 WHERE id = ?";
       $stmt = $this->connect()->prepare($query);
       return $stmt->execute([$id]);
    }
    //restore soft deleted students
    public function restoreStudent($id){
       $query = "UPDATE student SET is_deleted = 0 WHERE id = ?";
       $stmt = $this->connect()->prepare($query);
       return $stmt->execute([$id]);
    }
    //permanently delete students
    public function permanentDeleteStudent($id){
        $query = "DELETE FROM student WHERE id = ?";
        $stmt = $this->connect()->prepare($query);
        return $stmt->execute([$id]);
    }
}