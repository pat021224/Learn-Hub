
<?php
session_start();
require_once __DIR__ . '/../vendor/autoload.php';
use App\Core\Router;
use App\Controller\PageController;

$isAjax = (
    isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
    strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'
);

// If it's an AJAX request, don't load the full HTML layout
if ($isAjax) {
    $router = new Router('/Learn-Hub/public');
    $router->dispatch();
    exit; // prevent loading rest of layout
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


</head>
<body>
    <div class="sticky-top">
        <?php
            $controller = new PageController();
            $controller->showNavbar();
        ?>
    </div>





    <div id="page-content">
        <?php
    
            $router = new Router('/Learn-Hub/public');
            $router->dispatch();
        ?>
    </div>

    

    
    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="js/main.js?v=<?= time() ?>"></script>
<script src="js/student.js?v=<?= time() ?>"></script>
<script src="js/teacher.js?v=<?= time() ?>"></script>
<script src="js/login.js?v=<?= time() ?>"></script>

</body>
</html>