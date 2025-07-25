<?php
use App\Core\Router; 
?> 
<div class="d-flex flex-column min-vh-100">
    <div class="sticky-top">
        <nav class="navbar navbar-expand-lg container-fluid justify-content-center sticky-top">
            <div class="container-fluid">
                    <a class="navbar-brand" href="home">
                        <i class="bi bi-mortarboard-fill"></i>
                        <span>Learn Hub</span>
                    </a>
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
                <div class="d-flex flex-column flex-lg-row gap-2 ms-lg-auto mt-2 mt-lg-0">

                    <?php
                    $page = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
                    $loginBtn = '<a href="login" class="nav-btn btn  btn-sm w-auto align-self-start">Login</a>';
                    $registerBtn = '<a href="register" class="nav-btn btn btn-sm w-auto align-self-start">Register</a>';
                    if($page == 'home' || $page == 'features' || $page == 'contact' || $page == 'about'){
                        echo $loginBtn . $registerBtn;
                    } elseif($page == 'login') {
                        echo $registerBtn;
                    } elseif($page == 'register') {
                        echo $loginBtn;
                    }
                    ?>
                </div>
                </div>
            </div>
        </nav>
    </div>

    <div class="page-content flex-grow-1">
        <?php
            $router = new Router('/Learn-Hub/public');
            $router->dispatch();
        ?>
    </div>
</div>

<footer class="footer container-fluid">
    <?php include __DIR__ . '/../partials/footer.php'; ?>
</footer>

