<div class="d-flex justify-content-end gap-2 m-2">
  <a href="archived-teacher" class="btn btn-outline-secondary btn-sm">
    <i class="bi bi-archive"></i> Archived
  </a>    
  <a href="add-teacher" class="btn btn-primary btn-sm">
    Add Teacher
  </a>  
</div>
<div class="px-3 px-md-5 pt-4">
  <div class="row">
    <div class="col-sm-8">
      <h4 class="fw-bold text-dark">Teacher List</h4>
    </div>
    <div class="container-fluid col-sm-4">
        <form id="search-form" class="d-flex" role="search">
          <input id="search-box" name="teacher" class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
  </div>
</div>
<div class="card bg-dark text-white mx-3 mx-md-5 mt-3">
  <div class="card-body p-0">
    <div id="teacher_list" class="p-4 mx-2 mx-md-5">  
      <!-- 🛠️ Wrap table with .table-responsive -->
      <div class="table-responsive">
        <table class="table table-dark table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">First Name</th>
              <th scope="col">Middle Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Email</th>
              <th scope="col">Department</th>
              <th scope="col">Gender</th>
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
    </div>
  </div>
</div>




