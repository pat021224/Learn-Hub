<div class="d-flex justify-content-end gap-2 m-2">
  <a href="restore-student" class="btn btn-outline-secondary btn-sm">
    <i class="bi bi-archive"></i> Archived
  </a>    
  <a href="add-student" class="btn btn-primary btn-sm">
    Add Student
  </a>  
</div>
<div class="px-3 px-md-5 pt-4">
  <h4 class="fw-bold text-dark">Student List</h4>
  <p class="text-muted mb-0">View and manage all registered students</p>
</div>
<div class="card bg-dark text-white mx-3 mx-md-5 mt-3">
  <div class="card-body p-0">
    <form id="student_list_form" class="p-4 mx-2 mx-md-5">  
      <!-- 🛠️ Wrap table with .table-responsive -->
      <div class="table-responsive">
        <table class="table table-dark table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">Student Id</th>
              <th scope="col">Full Name</th>
              <th scope="col">Email</th>
              <th scope="col">Course</th>
              <th scope="col">Year Level</th>
              <th scope="col">Section</th>
              <th scope="col">School Year</th>
              <th scope="col">Status</th>
              <th scope="col"></th>
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




