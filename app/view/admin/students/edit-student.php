
<div class="container mt-5">
  <form id="edit_student_form" class="p-4 bg-white border rounded shadow mx-5">
    <h4 class="mb-4">Edit Student</h4>
    <div class="row">
        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $_GET['id']; ?>">
      <!-- Personal Info -->
      <div class="col-lg-4 mb-3">
        <label for="first_name" class="form-label">First Name</label>
        <input type="text" class="form-control" id="first_name" name="first_name" value="<?= htmlspecialchars($student['first_name'] ?? '') ?>">
      </div>
      <div class="col-lg-4 mb-3">
        <label for="middle_name" class="form-label">Middle Name</label>
        <input type="text" class="form-control" id="middle_name" name="middle_name">
      </div>
      <div class="col-lg-4 mb-3">
        <label for="last_name" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="last_name" name="last_name">
      </div>

      <div class="col-lg-2 mb-3">
        <label for="gender" class="form-label">Gender</label>
        <select class="form-select" id="gender" name="gender">
          <option value="" disabled selected>Select Gender</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
      </div>
      <div class="col-lg-2 mb-3">
        <label for="dob" class="form-label">Date of Birth</label>
        <input type="date" class="form-control" id="dob" name="dob">
      </div>
      <div class="col-lg-4 mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email">
      </div>
      <div class="col-lg-4 mb-3">
        <label for="student_contact" class="form-label">Student Contact</label>
        <input type="text" class="form-control" id="student_contact" name="student_contact">
      </div>
      <div class="col-lg-6 mb-3">
        <label for="guardian_name" class="form-label">Guardian Name</label>
        <input type="text" class="form-control" id="guardian_name" name="guardian_name">
      </div>
      <div class="col-lg-6 mb-3">
        <label for="guardian_contact" class="form-label">Guardian Contact</label>
        <input type="text" class="form-control" id="guardian_contact" name="guardian_contact">
      </div>

      <!-- Address -->
      <div class="col-lg-2 mb-3">
          <label for="nationality" class="form-label">Nationality</label>
          <select class="form-select form-select" id="nationality" name="nationality" aria-label="Large select example">
              <option value="" disabled selected>Nationality</option>
          </select>
      </div> 
      <div class="col-lg-2 mb-3">
        <label for="province" class="form-label">Province</label>
        <input type="text" class="form-control" id="province" name="province">
      </div>
      <div class="col-lg-2 mb-3">
        <label for="municipality" class="form-label">Municipality</label>
        <input type="text" class="form-control" id="municipality" name="municipality">
      </div>
      <div class="col-lg-2 mb-3">
        <label for="barangay" class="form-label">Barangay</label>
        <input type="text" class="form-control" id="barangay" name="barangay">
      </div>
      <div class="col-lg-2 mb-3">
        <label for="street" class="form-label">Street</label>
        <input type="text" class="form-control" id="street" name="street">
      </div>
      <div class="col-lg-2 mb-3">
        <label for="zipcode" class="form-label">Zip Code</label>
        <input type="text" class="form-control" id="zipcode" name="zipcode">
      </div>

      <!-- Academic Info -->
      <div class="col-lg-6 mb-3">
        <label for="course" class="form-label">Course</label>
        <select class="form-select" id="course" name="course">
          <option value="" disabled selected>Select Course</option>
          <option value="BSIT">BS in Information Technology</option>
          <option value="BSCS">BS in Computer Science</option>
        </select>
      </div>
      <div class="col-lg-2 mb-3">
        <label for="year_level" class="form-label">Year Level</label>
        <select class="form-select" id="year_level" name="year_level">
          <option value="" disabled selected>Year Level</option>
          <option value="1st Year">1st Year</option>
          <option value="2nd Year">2nd Year</option>
          <option value="3rd Year">3rd Year</option>
          <option value="4th Year">4th Year</option>
        </select>
      </div>
      <div class="col-lg-2 mb-3">
        <label for="section" class="form-label">Section</label>
        <input type="text" class="form-control" id="section" name="section">
      </div>
      <div class="col-lg-2 mb-3">
        <label for="school_year" class="form-label">School Year</label>
        <input type="text" class="form-control" id="school_year" name="school_year" readonly>
      </div>
      <div class="col-lg-2 mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" id="status" name="status">
          <option value="" disabled selected>Status</option>
          <option value="active">Active</option>
          <option value="inactive">Inactive</option>
        </select>
      </div>
    </div>
    <div class="text-end">
      <button type="submit" class="btn btn-success" id="update-btn">Update Student</button>
    </div>
  </form>
  <div class="d-flex justify-content-center">
    <p id="response">s</p>
  </div>
</div>

