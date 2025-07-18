<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Teacher Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Teacher Panel</a>
      <div class="ms-auto">
        <a href="logout" class="btn btn-light btn-sm">Logout</a>
      </div>
    </div>
  </nav>

  <div class="container mt-4">
    <h2>Welcome, Teacher!</h2>
    <div class="row">
      <div class="col-md-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <h5 class="card-title">My Classes</h5>
            <p class="card-text">Manage subjects and view enrolled students.</p>
            <a href="#" class="btn btn-success btn-sm">Open</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Enter Grades</h5>
            <p class="card-text">Record or update student grades.</p>
            <a href="#" class="btn btn-success btn-sm">Enter</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Profile</h5>
            <p class="card-text">Manage your teacher profile and preferences.</p>
            <a href="#" class="btn btn-success btn-sm">Edit</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
