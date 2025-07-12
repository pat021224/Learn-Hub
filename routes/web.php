<?php

use app\controller\studentcontroller;
require_once __DIR__ . '/../app/controller/studentcontroller.php';



return [

    //show form pages
    '' => function(){
        require_once __DIR__ . '/../app/view/pages/home.php';
    },
    'home' => function(){
        require_once __DIR__ . '/../app/view/pages/home.php';
    },
    'about' => function(){
        require_once __DIR__ . '/../app/view/pages/about.php';
    },
    'student-list' => function(){
        require_once __DIR__ . '/../app/view/pages/student-list.php';
    },
    'teachers' => function(){
        require_once __DIR__ . '/../app/view/pages/teachers.php';
    },
    'add-student' => function(){
        require_once __DIR__ . '/../app/view/pages/add-student.php';
    },
    'restore-student' => function(){
        require_once __DIR__ . '/../app/view/pages/archived-students.php';
    },
    'edit-student' => function(){
        require_once __DIR__ . '/../app/view/pages/edit-student.php';
    },'nationalities' => function(){
        require_once __DIR__ . '/../public/assets/nationalities.json';
    },





    //handles form submission
    'store/student' => function(){
        $controller = new studentController();
        $controller->store();
    },
    'get/course/count' => function(){
        $course = $_POST['course'] ?? null;
        $schoolyear = $_POST['school_year'] ?? null;
        $controller = new studentController();
        $controller->generateStudentId($course, $schoolyear);
    },
    'student/list' => function(){
        $controller = new studentController();
        $controller->show();
    },
    'edit/student' => function(){
        $id = $_POST['id'];
        $controller = new studentController();
        $controller->load($id);
    },
    'update/student' => function(){     //update student
        $controller = new studentController();
        $controller->update();
    },
    'modal/response' => function(){
        $id = $_POST['id'];
        $controller = new studentController();
        $controller->modalResponse($id);
    },
    'delete/student' => function(){
        $id = $_POST['id'];
        $controller = new studentController();
        $controller->delete($id);
    }
    

];
