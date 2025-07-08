<?php
namespace app\controller;
require_once __DIR__ . '/../model/studentmodel.php';
use app\model\studentmodel;


//receive data from add-student.php 
//validate the data then send to *studentmodel.php* -> *function insertStudent()*
class studentController extends studentModel{
    //receive selected course from add-student.php
    //then send to *studentmodel.php* -> *function getCourseCount()*  
    function generateStudentId(){
    if(isset($_POST['course'])){
        $schoolyear = $_POST['school_year'];
        $course = $_POST['course'];
        $yearStart = explode('-', $schoolyear)[0];
            
        $count = $this->getCourseCount($course, $schoolyear);
        $courseCode = strtoupper($course);
        $newId = $count + 1;
        $studentId = $yearStart . '-' . $courseCode . '-' . str_pad($newId, 4, '0', STR_PAD_LEFT);
        return $studentId;
        
    }
    echo "❌ Missing course data";
        
    }
    function store(){
        $required = [
            'first_name', 'middle_name', 'last_name', 'gender', 'dob',
            'email', 'student_contact', 'guardian_name', 'guardian_contact',
            'province', 'municipality', 'barangay', 'street', 'zipcode', 
            'course', 'year_level', 'section', 'school_year'
        ];
            foreach ($required as $row) {
                if(empty($_POST[$row])){
                    echo "❌ Saving failed! All fields should be filled!";
                    return;
                }
            }
        $data = array_map(function($val){
            return htmlspecialchars(trim($val));
        }, $_POST);

        $studentId = $this->generateStudentId();
        
        $this->insertStudent(
            $data['first_name'], $data['middle_name'], $data['last_name'], $data['gender'], $data['dob'],
            $data['email'], $data['student_contact'], $data['guardian_name'], $data['guardian_contact'],
            $data['province'], $data['municipality'], $data['barangay'], $data['street'], $data['zipcode'], 
            $data['course'], $data['year_level'], $data['section'], $data['school_year'], $studentId
        );
    }




}