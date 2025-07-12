this is archived student<form id="restore_students_form" class="p-4 mx-5">
<table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">Full Name</th>
      <th scope="col">Course</th>
      <th scope="col">Year Level</th>
      <th scope="col">Status</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody id="response">
  </tbody>
</table>
  <div class="d-flex justify-content-center">
    <p id="delete-response" class="fw-bold text-danger"></p>
  </div>
</form>


<!-- MODAL FOR DELETE CONFIRMATION -->
<form id="restore-modal-form">
  <div class="modal" id="delete-student-modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirm Deletion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="modal-response">Are you sure you want to delete Name data?.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="confirm-delete-student">Delete Student</button>
      </div>
    </div>
  </div>
</div>
</form>



