<!-- app/view/pages/profile.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container py-5">
    <div class="row mb-4">
      <div class="col text-center">
        <h2 class="fw-bold">Student Profile</h2>
      </div>
    </div>

    <div class="card shadow-lg rounded">
      <div class="card-body p-5">
        <div class="row g-4 align-items-center">
          <!-- Profile Picture -->
          <div class="col-md-3 text-center">
            <img src="https://via.placeholder.com/150" alt="Profile Picture" class="img-thumbnail rounded-circle mb-2">
            <h5 class="mt-3">Juan Dela Cruz</h5>
            <p class="text-muted mb-0">Student ID: 2023-00123</p>
          </div>

          <!-- Student Information -->
          <div class="col-md-9">
            <div class="row mb-3">
              <div class="col-md-6">
                <label class="fw-bold">Full Name:</label>
                <p>Juan Dela Cruz</p>
              </div>
              <div class="col-md-6">
                <label class="fw-bold">Email:</label>
                <p>juan@example.com</p>
              </div>
              <div class="col-md-6">
                <label class="fw-bold">Gender:</label>
                <p>Male</p>
              </div>
              <div class="col-md-6">
                <label class="fw-bold">Nationality:</label>
                <p>Filipino</p>
              </div>
              <div class="col-md-6">
                <label class="fw-bold">Department:</label>
                <p>Information Technology</p>
              </div>
              <div class="col-md-6">
                <label class="fw-bold">Course:</label>
                <p>BSIT</p>
              </div>
              <div class="col-md-6">
                <label class="fw-bold">Year Level:</label>
                <p>3rd Year</p>
              </div>
              <div class="col-md-6">
                <label class="fw-bold">Section:</label>
                <p>A</p>
              </div>
              <div class="col-md-6">
                <label class="fw-bold">School Year:</label>
                <p>2024-2025</p>
              </div>
              <div class="col-md-6">
                <label class="fw-bold">Status:</label>
                <p>Active</p>
              </div>
            </div>

            <!-- Action Buttons -->
            <div class="text-end mt-4">
              <a href="edit-student?id=123" class="btn btn-outline-primary"><i class="bi bi-pencil"></i> Edit Profile</a>
              <a href="students" class="btn btn-outline-secondary"><i class="bi bi-arrow-left"></i> Back to List</a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</body>
</html>
