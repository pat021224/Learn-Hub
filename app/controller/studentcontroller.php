<?php
namespace App\Controller;
use App\Core\Validator;
use App\Model\MainModel;

//receive data from add-student.php 
//validate the data then send to *studentmodel.php* -> *function insertStudent()*
class StudentController{
    private $Validator;
    private $StudentModel;
    private $MainModel;

    public function __construct(){
        $this->Validator = new Validator();
        $this->MainModel = new MainModel();
    }
    //receive selected course from add-student.php
    //then send to *studentmodel.php* -> *function getCourseCount()*  
    public function generateStudentId($course, $schoolyear){
        $id = $this->MainModel->getLastId('student');
        $yearStart = explode('-', $schoolyear)[0];
        $courseCode = strtoupper($course);
        $newId = $id['id'] + 1;
        $studentId = $yearStart . '-' . $courseCode . '-' . str_pad($newId, 4, '0', STR_PAD_LEFT);
        return $studentId;    
    }   
    //save data inputs to database
    public function store(){
        $validate = $this->Validator->formValidation($_POST);
        $errors = $validate['errors'];
        if(!empty($errors)){
            foreach($errors as $error){
                echo $error;
                return;
            }
        }
        $clean = $validate['sanitized'];

        //assign the generated id format in the variable
        $studentId = $this->generateStudentId($clean['course'], $clean['school_year']);
        $data = [
            'first_name' => $clean['first_name'],
            'middle_name' => $clean['middle_name'],
            'last_name' => $clean['last_name'],
            'dob' => $clean['dob'],
            'gender' => $clean['gender'],
            'email' => $clean['email'],
            'student_contact' => $clean['student_contact'],
            'guardian_name' => $clean['guardian_name'],
            'guardian_contact' => $clean['guardian_contact'],
            'nationality' => $clean['nationality'],
            'province' => $clean['province'],
            'municipality' => $clean['municipality'],
            'barangay' => $clean['barangay'],
            'street' => $clean['street'],
            'zipcode' => $clean['zipcode'],
            'course' => $clean['course'],
            'year_level' => $clean['year_level'],
            'section' => $clean['section'],
            'school_year' => $clean['school_year'],
            'student_id_number' => $studentId
        ];
        $status = $this->MainModel->insert('student', $data);
        echo $status 
        ? "You successfully added " . $data['first_name'] . " " . $data['last_name'] . " to the database"
        : "Creating Student profile for " . $data['first_name'] . " " . $data['last_name'] . " failed!";
    }   
    //show the list of students
    public function show(){
        $data = $this->MainModel->getAll('*', 'student', 'is_deleted', 0);
        foreach ($data as $row) {
            echo "<tr>";
                echo "<td>" . $row['student_id_number'] . "</td>";
                echo "<td>" . $row['full_name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['course'] . "</td>";
                echo "<td>" . $row['year_level'] . "</td>";
                echo "<td>" . $row['section'] . "</td>";
                echo "<td>" . $row['school_year'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td class='text-center'>
                    <a href='edit-student?id=" . $row['id'] . "' title='Edit' class='btn btn-outline-primary btn-sm'><i class='bi bi-pencil'></i></a>
                    <a href='#' title='Profile' id='" . $row['id'] . "' class='btn btn-outline-secondary btn-sm'><i class='bi bi-person-circle'></i></a>
                    <a href='#' title='Delete' id='student' data-id='" . $row['id'] . "' class='delete btn btn-outline-warning btn-sm' data-bs-toggle='modal' data-bs-target='#confirmation-modal'><i class='bi bi-trash text-danger'></i></a></td>";
            echo "</tr>";
        }
    }   
    // send the data of selected student to javascript
    public function load($id){
            $data = $this->MainModel->getBy('*', 'student', 'id', $id);
            header('Content-Type: application/json');
            echo json_encode($data);
    }   
    //send updated data of student to model
    public function update(){
        $validate = $this->Validator->formValidation($_POST);
        $errors = $validate['errors'];
        if($errors){
            foreach($errors as $error){
                echo $error;
                return;
            }
        }
        $clean = $validate['sanitized'];
        $data = [
            'first_name' => $clean['first_name'],
            'middle_name' => $clean['middle_name'],
            'last_name' => $clean['last_name'],
            'gender' => $clean['gender'],
            'dob' => $clean['dob'],
            'email' => $clean['email'],
            'student_contact' => $clean['student_contact'],
            'guardian_name' => $clean['guardian_name'],
            'guardian_contact' => $clean['guardian_contact'],
            'nationality' => $clean['nationality'],
            'province' => $clean['province'],
            'municipality' => $clean['municipality'],
            'barangay' => $clean['barangay'],
            'street' => $clean['street'],
            'zipcode' => $clean['zipcode'],
            'course' => $clean['course'],
            'year_level' => $clean['year_level'],
            'section' => $clean['section'],
            'school_year' => $clean['school_year'],
            'status' => $clean['status'],
        ];
        $id = $clean['id'];
        $status = $this->MainModel->update('student', $data, 'id', $id);
        echo $status
        ? "You successfully updated " . $data['first_name'] . " " . $data['last_name']
        : "Updating " . $data['first_name'] . " " . $data['last_name'] . " failed!";
    }      
    
    //show list of soft deleted students
    public function getArchivedStudents(){
        $data = $this->MainModel->getAll('*', 'student', 'is_deleted', 1);
        foreach($data as $row){
            echo "<tr>";
                    echo "<td>" . $row['full_name'] . "</td>";
                    echo "<td>" . $row['course'] . "</td>";
                    echo "<td>" . $row['year_level'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td><a href='#' title='Restore' id='student' data-id='" . $row['id'] . "' class='restore btn btn-outline-primary btn-sm' data-bs-toggle='modal' data-bs-target='#confirmation-modal'><i class='bi bi-arrow-counterclockwise'></i></a>
                         <a href='#' title='Delete' id='student' data-id='" . $row['id'] . "' class='permanent-delete btn btn-outline-danger btn-sm' data-bs-toggle='modal' data-bs-target='#confirmation-modal'><i class='bi bi-trash text-danger'></i></a></td>";
                    echo "</tr>";
        }
    }
       
    
}

    




