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





    //handles form submission
    'store/student' => function(){
        $controller = new studentController();
        $controller->store();
    },
    'get/course/count' => function(){
        $controller = new studentController();
        $controller->generateStudentId();
    }

];
