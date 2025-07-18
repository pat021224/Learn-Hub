<?php
$firstName = $_SESSION['first_name'] ?? 'Guest';
$lastName = $_SESSION['last_name'] ?? '';
$role = $_SESSION['role'] ?? '';
?>
<style>
    body {
      min-height: 100vh;
    }
    .sidebar {
      height: 100vh;
    }
  </style>
</head>
<body>

  <div class="d-flex">
    <!-- Sidebar -->
    <div class="bg-dark text-white p-5 sidebar">
      <!-- User Profile -->
    <div class="d-flex align-items-center mb-3">
        <img src="path_to_profile.jpg" alt="Profile" class="rounded-circle me-2" width="48" height="48">
        <div>
            <div class="fw-bold"><?= $firstName . ' ' . $lastName ?></div>
            <small class="text-muted"><?= $role ?></small>
        </div>
    </div>

    

      <ul class="nav flex-column">
        <li class="nav-item mb-2">
          <a class="nav-link text-white" href="#">Dashboard</a>
        </li>
        <li class="nav-item mb-2">
          <a class="nav-link text-white" href="student-list">Manage Students</a>
        </li>
        <li class="nav-item mb-2">
          <a class="nav-link text-white" href="add-teacher">Manage Teachers</a>
        </li>
        <li class="nav-item mb-2">
          <a class="nav-link text-white" href="#">User Accounts</a>
        </li>
        <li class="nav-item mt-4">
          <a class="btn btn-danger btn-sm w-100" href="logout">Logout</a>
        </li>
      </ul>
    </div>

    <!-- Main Content -->
    <div class="flex-grow-1 p-4">
      <h2 class="mb-4">Welcome, Admin</h2>

      <div class="row g-4">
        <div class="col-md-4">
          <div class="card text-bg-primary shadow-sm">
            <div class="card-body">
              <h5 class="card-title">Total Students</h5>
              <p class="card-text fs-4">120</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card text-bg-success shadow-sm">
            <div class="card-body">
              <h5 class="card-title">Total Teachers</h5>
              <p class="card-text fs-4">15</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card text-bg-warning shadow-sm">
            <div class="card-body">
              <h5 class="card-title">Registered Users</h5>
              <p class="card-text fs-4">200</p>
            </div>
          </div>
        </div>
      </div>

      <hr class="my-4">

      <h4>Recent Activity</h4>
      <ul class="list-group">
        <li class="list-group-item">John Doe registered as student</li>
        <li class="list-group-item">New teacher account created</li>
        <li class="list-group-item">Password reset requested</li>
      </ul>
    </div>
  </div>