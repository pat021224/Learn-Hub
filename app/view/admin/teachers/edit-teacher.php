
<div class="container mt-5">
  <form id="edit_teacher_form" class="p-4 bg-white border rounded shadow mx-5">
    <h4 class="mb-4">Edit Teacher</h4>
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
          <option value="male">Male</option>
          <option value="female">Female</option>
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
        <label for="phone_number" class="form-label">Student Contact</label>
        <input type="text" class="form-control" id="phone_number" name="phone_number">
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
        <label for="department" class="form-label">Department</label>
        <select class="form-select" id="department" name="department">
          <option value="" disabled selected>Department</option>
            <option value="Computer Science">Computer Science</option>
            <option value="Information Technology">Information Technology</option>
            <option value="Mathematics">Mathematics</option>
            <option value="Physics">Physics</option>
            <option value="Biology">Biology</option>
        </select>
      </div>
    </div>
    <div class="text-center">
      <p id="response"></p>
    </div>
    <div class="text-end">
      <button type="submit" class="btn btn-success" id="update-teacher-btn">Update Teacher</button>
    </div>
  </form>
  <div class="d-flex justify-content-center">
  </div>
</div>

