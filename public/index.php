

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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
                <a class="nav-link" href="student-list">Students</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="teachers">Teachers</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="features">Features</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="about">About</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>





    <nav id="page-content">
        <?php
            include __DIR__ . '/../app/core/router.php';
            use App\Core\Router;
            $router = new Router('/Learn-Hub/public');
            $router->dispatch();
        ?>
    </nav>
    

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
  flatpickr("#dob", {
    dateFormat: "Y-m-d",
    maxDate: "today"
  });
</script>

</body>
</html>