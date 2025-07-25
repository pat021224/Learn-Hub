<div class="d-flex justify-content-end gap-2 m-2">
  <a href="archived-student" class="btn btn-outline-secondary btn-sm">
    <i class="bi bi-archive"></i> Archived
  </a>    
  <a href="add-student" class="btn btn-primary btn-sm">
    Add Student
  </a>  
</div>
<div class="px-3 px-md-5 pt-4">
  <div class="row">
    <div class="col-sm-8">
      <h4 class="fw-bold text-dark">Student List</h4>
    </div>
    <div class="container-fluid col-sm-4">
      <form id="search-form" class="d-flex" role="search">
        <input id="search-box" name="student" class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
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
        <p id="action-response" class="fw-bold"></p>
      </div>
    </form>
  </div>
</div>




