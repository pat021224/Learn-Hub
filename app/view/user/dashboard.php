<?php
$firstname = $_SESSION['first_name'];
?>

<div class="container" id="admin-dashboard">
  <div class="row g-3 justify-content-center gx-4 gy-4">
  <!-- CARDS -->
   <h1>Hi <?= $firstname ?></h1>
    <div id="student_card" class="col-md-3">
      <div class="card admin-card">
          <div class="card-body">
            <div class="row d-flex align-items-center">
              <div class="count-wrapper col-sm-6 text-center">
                    <span class="counts" id="registered-student"></span><br>
                    <span>Students</span>
              </div>
              <div class="card-icon col-sm-6">    
                    <i class="bi bi-people-fill"></i>
              </div>
            </div>
          </div>
      </div>
    </div>
    <div id="teacher_card" class="col-md-3">
      <div class="card admin-card">
          <div class="card-body">
            <div class="row d-flex align-items-center">
              <div class="count-wrapper col-sm-6 text-center">
                    <span class="counts" id="registered-teacher"></span><br>
                    <span>Teachers</span>
              </div>
              <div class="card-icon col-sm-6">    
                    <i class="bi bi-people-fill"></i>
              </div>
            </div>
          </div>
      </div>
    </div>
    <div id="user_card" class="col-md-3">
      <div class="card admin-card">
          <div class="card-body">
             <div class="row d-flex align-items-center">
              <div class="count-wrapper col-sm-6 text-center">
                    <span class="counts" id="registered-user"></span><br>
                    <span>Users</span>
              </div>
              <div class="card-icon col-sm-6">    
                    <i class="bi bi-people-fill"></i>
              </div>
            </div>
          </div>
      </div>
    </div>
    <div id="admin_card" class="col-md-3">
      <div class="card admin-card">
          <div class="card-body">
             <div class="row d-flex align-items-center">
              <div class="count-wrapper col-sm-6 text-center">
                    <span class="counts" id="registered-admin"></span><br>
                    <span>Admins</span>
              </div>
              <div class="card-icon col-sm-6">    
                    <i class="bi bi-people-fill"></i>
              </div>
            </div>
          </div>
      </div>
    </div>

  <!-- LIST -->
<div class="card bg-dark text-white mx-3 mx-md-5 mt-3">
  <div class="card-body p-0">
    
    <form id="student_list_form" class="p-4 mx-2 mx-md-5">
      <h3>List of Users</h3>  
      <!-- 🛠️ Wrap table with .table-responsive -->
      <div class="table-responsive">
        <table class="table table-dark table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Email</th>
              <th scope="col">Role</th>
            </tr>
          </thead>
          <tbody id="response">
          </tbody>
        </table>
      </div>
      <div class="d-flex justify-content-center">
        <p id="delete-response" class="fw-bold"></p>
      </div>
    </form>
  </div>
</div>   

    
  </div>
</div>