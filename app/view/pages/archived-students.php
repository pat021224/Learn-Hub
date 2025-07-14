<form id="restore_students_form" class="p-4 mx-5">
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
    <p id="restore-response" class="fw-bold"></p>
  </div>
</form>


<!-- MODAL FOR RESTORE CONFIRMATION -->
<form id="restore-modal-form">
  <div class="modal" id="restore-student-modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirm Restoration</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="modal-response"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="confirm-restore-student">Restore Student</button>
      </div>
    </div>
  </div>
</div>
</form>

<!-- MODAL FOR PERMANENT DELETE CONFIRMATION -->
<form id="permanent-delete-modal-form">
  <div class="modal" id="permanent-delete-student-modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirm Permanent Deletion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="perma-modal-response"></p> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" id="confirm-permanent-delete-student">Permanently Delete Student</button>
      </div>
    </div>
  </div>
</div>
</form>






