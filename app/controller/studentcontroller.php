<?php
namespace app\controller;
require_once __DIR__ . '/../model/studentmodel.php';
use app\model\studentmodel;


//receive data from add-student.php 
//validate the data then send to *studentmodel.php* -> *function insertStudent()*
class studentController extends studentModel{

    //receive selected course from add-student.php
    //then send to *studentmodel.php* -> *function getCourseCount()*  
    function generateStudentId($course, $schoolyear){
        $yearStart = explode('-', $schoolyear)[0];
        $count = $this->getCourseCount($course, $schoolyear);
        $courseCode = strtoupper($course);
        $newId = $count + 1;
        $studentId = $yearStart . '-' . $courseCode . '-' . str_pad($newId, 4, '0', STR_PAD_LEFT);
        return $studentId;    
    }

        //save data inputs to database
        function store(){
            $required = [
                'first_name', 'middle_name', 'last_name', 'gender', 'dob',
                'email', 'student_contact', 'guardian_name', 'guardian_contact',
                'nationality', 'province', 'municipality', 'barangay', 'street', 'zipcode', 
                'course', 'year_level', 'section', 'school_year'
            ];
                //check if all fields are not empty
                foreach ($required as $row) {
                    if(empty($_POST[$row])){
                        echo "❌ Saving failed! All fields should be filled!";
                    }
                }
                //check if input has spaces
            $data = array_map(function($val){
                return htmlspecialchars(trim($val));
            }, $_POST);

            //check if email is a valid email address format
            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                echo "Invalid email format";
                return;
            }
            //assign the generated id format in the variable
            $studentId = $this->generateStudentId($data['course'], $data['school_year']);
            
            $result = $this->insertStudent(
                $data['first_name'], $data['middle_name'], $data['last_name'], $data['gender'], $data['dob'],
                $data['email'], $data['student_contact'], $data['guardian_name'], $data['guardian_contact'],
                $data['nationality'], $data['province'], $data['municipality'], $data['barangay'], $data['street'], $data['zipcode'], 
                $data['course'], $data['year_level'], $data['section'], $data['school_year'], $studentId
            );
            if($result){
                echo "You successfully added " . $data['first_name'] . " " . $data['last_name'] . " to the database";
                return;
            }
        }
        //show the list of students on table
        function show(){
            $data = $this->getStudentList();
            
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
                        <a href='edit-student?id=" . $row['id'] . "' title='Edit' class='me-2'><i class='bi bi-pencil'></i></a>
                        <a href='#' title='Profile' id='" . $row['id'] . "' class='me-2'><i class='bi bi-person-circle'></i></a>
                        <a href='#' title='Delete' data-id='" . $row['id'] . "' class='delete' data-bs-toggle='modal' data-bs-target='#delete-student-modal'><i class='bi bi-trash text-danger'></i></a></td>";
                echo "</tr>";
            }

        }

        // send the data of selected student to javascript
        function load($id){
                $data = $this->getById($id);
                header('Content-Type: application/json');
                echo json_encode($data);
        }

        //send updated data of student to model
        function update(){
            
            $required = [
                'first_name', 'middle_name', 'last_name', 'gender', 'dob',
                'email', 'student_contact', 'guardian_name', 'guardian_contact',
                'nationality', 'province', 'municipality', 'barangay', 'street', 'zipcode', 
                'course', 'year_level', 'section', 'school_year', 'status', 'id'
            ];
                //check if all fields are not empty
                foreach ($required as $row) {
                    if(empty($_POST[$row])){
                        echo "❌ Saving failed! All fields should be filled!";
                    }
                }
                //check if input has spaces
            $data = array_map(function($val){
                return htmlspecialchars(trim($val));
            }, $_POST);

            //check if email is a valid email address format
            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                echo "Invalid email format";
                return;
            }
            $result = $this->updateStudent(
                $data['first_name'], $data['middle_name'], $data['last_name'], $data['gender'], $data['dob'],
                $data['email'], $data['student_contact'], $data['guardian_name'], $data['guardian_contact'],
                $data['nationality'], $data['province'], $data['municipality'], $data['barangay'], $data['street'], $data['zipcode'], 
                $data['course'], $data['year_level'], $data['section'], $data['school_year'], $data['status'], $data['id']
            );
            
            if($result){
                echo "You successfully updated " . $data['first_name'] . " " . $data['last_name'];
                return;
            }
        }      
        
        
        //response modal with student name about to deleted
        function modalResponse($id){
            $data = $this->getById($id);
            echo "You’re about to delete the student profile of <span class='fw-bold text-danger'>" . htmlspecialchars($data['full_name']) . "</span> ?";

        }

        //send the id of selected student to be deleted to model
        function delete($id){
            $data = $this->getById($id);
            $result = $this->deleteStudent($id);
            if($result){
                echo $data['full_name'] . " data has succesfully deleted!";
            }else{
                echo "deletion failed!";
            }
        }
    
    
    
    }

    




