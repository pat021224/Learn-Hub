<?php
namespace App\Controller;
class PageController{
    public function showNavbar(){
        include_once __DIR__ . '/../view/partials/header.php';  
    }

    public function guestNavbar(){
        $page = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        $loginBtn = '<a href="login" class="btn btn-outline-primary btn-sm">Login</a>';
        $logoutBtn = '<a href="logout" class="btn btn-outline-danger btn-sm">Logout</a>';
        $registerBtn = '<a href="register" class="btn btn-outline-primary btn-sm">Register</a>';

        if($page == 'home' || $page == 'features' || $page == 'contact' || $page == 'about'){
            $navBtn = $loginBtn . $registerBtn;
        } elseif($page == 'login') {
            $navBtn = $registerBtn;
        } elseif($page == 'register') {
            $navBtn = $loginBtn;
        }

        $navbar = <<<HTML
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white container-fluid justify-content-center sticky-top border-bottom border-secondary">
                <div class="container-fluid">
                        <a class="navbar-brand" href="#">Learn Hub</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="features">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about">About</a>
                        </li>
                    </ul>

                    <div class="d-flex justify-content-end gap-2 ms-auto">
                        $navBtn
                    </div>
                    </div>
                </div>
            </nav>
        HTML;
        echo $navbar;
    }

    
    public function userNavbar(){
        $navbar = <<<HTML
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white container-fluid justify-content-center sticky-top border-bottom border-secondary">
                <div class="container-fluid">
                    <div class="d-flex justify-content-end gap-2 ms-auto">
                        <ul class="navbar-nav">
                            <li class="mx-auto d-flex align-items-center">
                                <p class="mb-0 fw-bold">Pat G.</p>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" title="Profile"><i class="bi bi-person-square text-white"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        HTML;
        echo $navbar;
    }
    
}