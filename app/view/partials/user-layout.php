<?php
use App\Core\Router;
$role = $_SESSION['role'];

$admin = <<<HTML
            <li class="nav-item">
                <a class="sidebar-link" href="student-list">
                    <i class="bi bi-person-lines-fill"></i>
                    <span>Manage Student</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="sidebar-link" href="teacher-list">
                    <i class="bi bi-person-badge-fill"></i>
                    <span>Manage Teacher</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="sidebar-link" href="#">
                    <i class="bi bi-building"></i>
                    <span>Classes</span>
                </a>
            </li>
        HTML;
$teacher = <<<HTML
            <li class="nav-item">
                <a class="sidebar-link" href="#">
                    <i class="bi bi-book"></i>
                    <span>Subject</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="sidebar-link" href="#">
                    <i class="bi bi-clipboard-data"></i>
                    <span>Grades</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="sidebar-link" href="#">
                    <i class="bi bi-building"></i>
                    <span>Classes</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="sidebar-link" href="student-list">
                    <i class="bi bi-person-lines-fill"></i>
                    <span>Student List</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="sidebar-link" href="#">
                    <i class="bi bi-calendar-check"></i>
                    <span>Schedule</span>
                </a>
            </li>
        HTML;
$student = <<<HTML
            <li class="nav-item">
                <a class="sidebar-link" href="#">
                    <i class="bi bi-book"></i>
                    <span>Subject</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="sidebar-link" href="#">
                    <i class="bi bi-clipboard-data"></i>
                    <span>Grades</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="sidebar-link" href="#">
                    <i class="bi bi-calendar-check"></i>
                    <span>Schedule</span>
                </a>
            </li>
        HTML;
?> 

<div class="wrapper d-flex">
    <aside id="sidebar" class="stick-top">
        <div class="d-flex justify-content-between">
            <div class="sidebar-logo">
                <a class="sidebar-link" href="#">LEARN HUB</a>
            </div>
            <button id="toggle-btn">
                <i id="icon" class="bi bi-chevron-double-left"></i>
            </button>
            
        </div>
        <ul class="sidebar-nav">
            <li class="nav-item">
                <a class="sidebar-link" href="profile">
                    <i class="bi bi-person-circle"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class="sidebar-link" href="newsfeed">
                    <i class="bi bi-newspaper"></i>
                    <span>News Feed</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="sidebar-link" href="dashboard">
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="sidebar-link" href="dashboard">
                    <i class="bi bi-chat-dots"></i>
                    <span>Messeges</span>
                </a>
            </li>



            <?php
            if($role == 'admin'){
                echo $admin;
            }elseif($role == 'teacher'){
                echo $teacher;
            }elseif($role == 'student'){
                echo $student;
            }

            ?>



            <li class="nav-item">
                <a class="sidebar-link" href="#">
                    <i class="bi bi-gear-fill"></i>
                    <span>Settings</span>
                </a>
            </li>
        </ul>
        <div class="sidebar-footer">
            <a href="logout" class="sidebar-link">
                <i class="bi bi-box-arrow-left"></i>
                <span>Logout</span>
            </a>
        </div>
    </aside>
    <div class="main p-3">
            <?php
                $router = new Router('/Learn-Hub/public');
                $router->dispatch();
            ?>
    </div>
</div>


    




