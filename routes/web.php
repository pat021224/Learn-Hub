<?php
use App\Controller\StudentController;
use App\Controller\UserController;
use App\Controller\TeacherController;
use App\Controller\AdminController;
use App\Controller\MainController;

return [
    //FORMS STUFF
    'nationalities' => function(){
        require_once __DIR__ . '/../public/assets/nationalities.json';
    },


    
    //public pages navigation
    '' => function(){
        require_once __DIR__ . '/../app/view/public/home.php';
    },
    'home' => function(){
        require_once __DIR__ . '/../app/view/public/home.php';
    },
    'about' => function(){
        require_once __DIR__ . '/../app/view/public/about.php';
    },
    'features' => function(){
        require_once __DIR__ . '/../app/view/public/features.php';
    },
    'contact' => function(){
        require_once __DIR__ . '/../app/view/public/contact.php';
    },

    //admin pages navigation for students
    'student-list' => function(){
        require_once __DIR__ . '/../app/view/admin/students/student-list.php';
    },
    'add-student' => function(){
        require_once __DIR__ . '/../app/view/admin/students/add-student.php';
    },
    'archived-student' => function(){
        require_once __DIR__ . '/../app/view/admin/students/archived-students.php';
    },
    'edit-student' => function(){
        require_once __DIR__ . '/../app/view/admin/students/edit-student.php';
    },
    'get/count' => function(){
        $table = $_POST['table'];
        $isDeleted = $_POST['isDeleted'];
        $controller = new AdminController();
        $controller->getCount($table, $isDeleted);
    },
    'get/user' => function(){
        $table = $_POST['table'];
        $isDeleted = $_POST['isDeleted'];
        $controller = new AdminController();
        $controller->getUser($table, $isDeleted);
    },


    //handles form submission for students
    'store/student' => function(){
        $controller = new StudentController();
        $controller->store();
    },
    'student/list' => function(){
        $controller = new StudentController();
        $controller->show();
    },
    'edit/student' => function(){
        $id = $_POST['id'];
        $controller = new StudentController();
        $controller->load($id);
    },
    'update/student' => function(){     //update student
        $controller = new StudentController();
        $controller->update();
    },
    'archived/students' => function(){
        $controller = new StudentController();
        $controller->getArchivedStudents();
    },



    //SOFT DELETE/ DELETE / RESTORE
    
    'soft/delete' => function(){
        $table = $_POST['table'];
        $id = $_POST['id'];
        $controller = new MainController();
        $controller->softDelete($table, $id);
    },
    'restore' => function(){
        $table = $_POST['table'];
        $id = $_POST['id'];
        $controller = new MainController();
        $controller->restore($table, $id);
    },
    'permanent/delete' => function(){
        $table = $_POST['table'];
        $id = $_POST['id'];
        $controller = new MainController();
        $controller->permanentDelete($table, $id);
    },

    
    //admin pages navigation for teachers
    'teacher-list' => function(){
        require_once __DIR__ . '/../app/view/admin/teachers/teacher-list.php';
    },
    'add-teacher' => function(){
        require_once __DIR__ . '/../app/view/admin/teachers/add-teacher.php';
    },
    'archived-teacher' => function(){
        require_once __DIR__ . '/../app/view/admin/teachers/archived-teachers.php';
    },
    'edit-teacher' => function(){
        require_once __DIR__ . '/../app/view/admin/teachers/edit-teacher.php';
    },

    //handles form submission for teachers
    'add/teacher' => function(){
        $controller = new TeacherController();
        $controller->store();
    },
    'get/teacher/list' => function(){
        $controller = new TeacherController();
        $controller->show();
    },
    'archived/teachers' => function(){
        $controller = new TeacherController();
        $controller->showArchivedTeacher();
    },
    'edit/teacher' => function(){
        $id = $_POST['id'];
        $controller = new TeacherController();
        $controller->load($id);
    },
    'update/teacher' => function(){     
        $controller = new TeacherController();
        $controller->update();
    },
    

    //USERS AREA
    //users pages navigation
    'login' => function(){
        require_once __DIR__ . '/../app/view/auth/login.php';
    },
    'logout' => function(){
        require_once __DIR__ . '/../app/view/auth/logout.php';
    },
    'register' => function(){
        require_once __DIR__ . '/../app/view/auth/register.php';
    },

    //handles form submission for users
    'login/user' => function(){
        $controller = new UserController();
        $controller->login();
    },
    'register/user' => function(){
        $controller = new UserController();
        $controller->register();
    },
  

    //USERS
    'dashboard' => function(){
        require_once __DIR__ . '/../app/view/user/dashboard.php';
    },
    'teacher-dashboard' => function(){
        require_once __DIR__ . '/../app/view/teacher/teacher-dashboard.php';
    },
    'student-dashboard' => function(){
        require_once __DIR__ . '/../app/view/student/student-dashboard.php';
    },
    'profile' => function(){
        require_once __DIR__ . '/../app/view/user/profile.php';
    },
    'newsfeed' => function(){
        require_once __DIR__ . '/../app/view/user/newsfeed.php';
    },



    //modal confirmation
    'modal/confirmation' => function(){
        $action = $_POST['action'];
        $table = $_POST['table'];
        $id = $_POST['id'];
        $controller = new MainController();
        $controller->modalResponse($action, $table, $id);
    },

    //SEARCH
    'search' => function(){
        $table = $_POST['table'];
        $keyword = $_POST['keyword'];
        $controller = new MainController();
        $controller->search($table, $keyword);
    },
];
