<?php
use App\Controller\StudentController;
use App\Controller\UserController;
use App\Controller\TeacherController;

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

    //admin pages navigation for students
    'student-list' => function(){
        require_once __DIR__ . '/../app/view/admin/students/student-list.php';
    },
    'add-student' => function(){
        require_once __DIR__ . '/../app/view/admin/students/add-student.php';
    },
    'restore-student' => function(){
        require_once __DIR__ . '/../app/view/admin/students/archived-students.php';
    },
    'edit-student' => function(){
        require_once __DIR__ . '/../app/view/admin/students/edit-student.php';
    },
    //handles form submission for students
    'store/student' => function(){
        $controller = new StudentController();
        $controller->store();
    },
    'get/course/count' => function(){
        $course = $_POST['course'] ?? null;
        $schoolyear = $_POST['school_year'] ?? null;
        $controller = new StudentController();
        $controller->generateStudentId($course, $schoolyear);
    },
    'student/list' => function(){
        $isDeleted = $_POST['isDeleted'];
        $controller = new StudentController();
        $controller->show($isDeleted);
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
    'modal/response' => function(){
        $id = $_POST['id'];
        $controller = new StudentController();
        $controller->modalResponse($id);
    },
    'delete/student' => function(){
        $id = $_POST['id'];
        $controller = new StudentController();
        $controller->delete($id);
    },
    'archived/students' => function(){
        $isDeleted = $_POST['isDeleted'];
        $controller = new StudentController();
        $controller->getArchivedStudents($isDeleted);
    },
    'restore/modal/response' => function(){
        $id = $_POST['id'];
        $controller = new StudentController();
        $controller->restoreModalResponse($id);
    },
    'restore/student' => function(){
        $id = $_POST['id'];
        $controller = new StudentController();
        $controller->restore($id);
    },
    'permanent/delete/modal/response' => function(){
        $id = $_POST['id'];
        $controller = new StudentController();
        $controller->permanentDeleteModalResponse($id);
    },
    'permanent/delete/student' => function(){
        $id = $_POST['id'];
        $controller = new StudentController();
        $controller->permanentDelete($id);
    },

    
    //admin pages navigation for teachers
    'teachers' => function(){
        require_once __DIR__ . '/../app/view/admin/teachers/teacher-list.php';
    },
    'add-teacher' => function(){
        require_once __DIR__ . '/../app/view/admin/teachers/add-teacher.php';
    },
    //handles form submission for teachers
    'add/teacher' => function(){
        $controller = new teacherController();
        $controller->store();
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
  

    //LOGIN DASHBOARDS
    'admin-dashboard' => function(){
        require_once __DIR__ . '/../app/view/admin/admin/admin-dashboard.php';
    },
    'teacher-dashboard' => function(){
        require_once __DIR__ . '/../app/view/teacher/teacher-dashboard.php';
    },
    'student-dashboard' => function(){
        require_once __DIR__ . '/../app/view/student/student-dashboard.php';
    }

];
