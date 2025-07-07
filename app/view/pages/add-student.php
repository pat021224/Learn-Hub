<div class="container mt-5">

<form id="add-student-form" class="p-4 bg-white border rounded shadow mx-5">
     <div class="row justify-content-center">
        <h4>Personal Information</h4>
        <div class="col-4 mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
        </div>

        <div class="col-4 mb-3">
            <label for="middle_name" class="form-label">Middle Name</label>
            <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Middle Name">
        </div>

        <div class="col-4 mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
        </div>

        <div class="col-2 mb-3">
        <label for="dob" class="form-label">Date of Birth</label>
        <input type="text" id="dob" class="form-control" placeholder="YYYY-MM-DD">
        </div>

        <div class="col-2 mb-3">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-select form-select" id="gender" name="gender" aria-label="Large select example">
                <option selected>Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>

        <div class="col-4 mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email">
        </div>

        <div class="col-4 mb-3">
            <label for="student_contact" class="form-label">Contact</label>
            <input type="text" class="form-control" id="student_contact" name="student_contact" placeholder="Student Contact">
        </div>


        <h4>Address</h4>
        <div class="col-4 mb-3">
            <label for="street" class="form-label">Street</label>
            <input type="text" class="form-control" id="street" name="street" placeholder="Street">
        </div>
        <div class="col-2 mb-3">
            <label for="province" class="form-label">Province</label>
            <select class="form-select form-select" id="province" name="province" aria-label="Large select example">
                <option selected>Select Province</option>
                <option value="Cavite">Cavite</option>
                <option value="Laguna">Laguna</option>
            </select>
        </div>
        <div class="col-2 mb-3">
            <label for="municipality" class="form-label">Municipality</label>
            <select class="form-select form-select" id="municipality" name="municipality" aria-label="Large select example">
                <option selected>Municipality</option>
                <option value="Tanza">Tanza</option>
                <option value="Gen Tri">Gen Tri</option>
            </select>
        </div>
        <div class="col-2 mb-3">
            <label for="barangay" class="form-label">Barangay</label>
            <select class="form-select form-select" id="barangay" name="barangay" aria-label="Large select example">
                <option selected>Barangay</option>
                <option value="Bucal">Bucal</option>
                <option value="Santol">Santol</option>
            </select>
        </div>
        <div class="col-2 mb-3">
            <label for="zip_code" class="form-label">Zip Code</label>
            <input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="Zip Code">
        </div>
       



        <h4>Academic Information</h4>
        <div class="col-6 mb-3">
            <label for="course" class="form-label">Course</label>
            <select class="form-select form-select" id="course" name="course" aria-label="Large select example">
                <option selected>Course</option>
                <option value="BSIT">Bachelero Of Science in Information Technology</option>
                <option value="BSCS">Bachelero Of Science in Computer Science</option>
            </select>
        </div>
        
        <div class="col-2 mb-3">
            <label for="year_level" class="form-label">Year Level</label>
            <select class="form-select form-select" id="year_level" name="year_level" aria-label="Large select example">
                <option selected>Year Level</option>
                <option value="1st Year">1st Year</option>
                <option value="2nd Year">2nd Year</option>
                <option value="3rd Year">3rd Year</option>
                <option value="4th Year">4th Year</option>
                <option value="5th Year">5th Year</option>
            </select>
        </div>
        <div class="col-2 mb-3">
            <label for="section" class="form-label">Section</label>
            <input type="text" class="form-control" id="section" name="section" placeholder="Section">
        </div>
        <div class="col-2 mb-3">
            <label for="school_year" class="form-label">School Year</label>
            <select class="form-select form-select" id="school_year" name="school_year" aria-label="Large select example">
                <option selected>School Year</option>
                <option value="2025">2025</option>
            </select>
        </div>

        <h4>Guardian</h4>
        <div class="col-6 mb-3">
            <label for="guardian_name" class="form-label">Guardian Name</label>
            <input type="text" class="form-control" id="guardian_name" name="guardian_name" placeholder="Guardian Name">
        </div>
        <div class="col-6 mb-3">
            <label for="guardian_contact" class="form-label">Guardian Contact</label>
            <input type="text" class="form-control" id="guardian_contact" name="guardian_contact" placeholder="Guardian Contact">
        </div>
        <div>
            <button class="btn btn-primary">Save Student</button>
        </div>
    </div>  
</form>

</div>
