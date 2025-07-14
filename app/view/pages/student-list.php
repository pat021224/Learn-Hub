<div class="d-flex justify-content-end gap-2 m-2">
  <a href="restore-student" class="btn btn-outline-secondary btn-sm" type="button" btn btn-outline-secondary btn-sm>
    <i class="bi bi-archive"></i> Archived
  </a>    
  <a href="add-student" type="button" class="btn btn-primary btn-sm">
    Add Student
  </a>  
</div>

<div class="px-5 pt-4">
  <h4 class="fw-bold">Student List</h4>
  <p class="text-muted mb-0">View and manage all registered students</p>
</div>

<div class="card bg-dark text-white mx-5 mt-3">
  <div class="card-body p-0">
  <form id="student_list_form" class="p-4 mx-5">
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
    <div class="d-flex justify-content-center">
      <p id="delete-response" class="fw-bold"></p>
    </div>
  </form>
  </div>
</div>

<!-- MODAL FOR DELETE CONFIRMATION -->
<form id="del-modal-form">
  <div class="modal" id="delete-student-modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger"><i class="bi bi-exclamation-triangle"></i> Confirm Deletion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="modal-response" class="mb-0"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="confirm-delete-student">Delete Student</button>
      </div>
    </div>
  </div>
</div>
</form>



