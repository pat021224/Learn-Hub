<div class="container mt-5 text-dark">
    <div class="d-flex justify-content-center">
        <h2 style="padding: 5px;">Add Student</h2>
    </div>
    <form id="add_student_form" class="p-4 bg-white border rounded shadow mx-5">
        <div class="row justify-content-center">
            <h4>Personal Information</h4>
            <!--FIRST NAME-->
            <div class="col-lg-4 mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
            </div>

            <!--MIDDLE NAME-->
            <div class="col-lg-4 mb-3">
                <label for="middle_name" class="form-label">Middle Name</label>
                <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Middle Name">
            </div>

            <!--LAST NAME-->
            <div class="col-lg-4 mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
            </div>

            <!--GENDER-->
            <div class="col-lg-2 mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select form-select" id="gender" name="gender" aria-label="Large select example">
                    <option value="" selected disabled>Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>

            <!--DATE OF BIRTH-->
            <div class="col-lg-2 mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob"placeholder="YYYY-MM-DD">
            </div>

            <!--EMAIL-->
            <div class="col-lg-4 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>

            <!--STUDENT CONTACT-->
            <div class="col-lg-4 mb-3">
                <label for="student_contact" class="form-label">Contact</label>
                <input type="text" class="form-control" id="student_contact" name="student_contact" placeholder="Student Contact">
            </div>

            <!--GUARDIAN NAME-->
            <div class="col-lg-6 mb-3">
                <label for="guardian_name" class="form-label">Guardian Name</label>
                <input type="text" class="form-control" id="guardian_name" name="guardian_name" placeholder="Guardian Name">
            </div>

            <!--GUARDIAN CONTACT-->
            <div class="col-lg-6 mb-3">
                <label for="guardian_contact" class="form-label">Guardian Contact</label>
                <input type="text" class="form-control" id="guardian_contact" name="guardian_contact" placeholder="Guardian Contact">
            </div>

            <h4>Address</h4>
            <!--NATIONALITY-->
            <div class="col-lg-2 mb-3">
                <label for="nationality" class="form-label">Nationality</label>
                <select class="form-select form-select" id="nationality" name="nationality" aria-label="Large select example">
                    <option value="" disabled selected>Nationality</option>
                </select>
            </div>

            <!--PROVINCE-->
            <div class="col-lg-2 mb-3">
                <label for="province" class="form-label">Province</label>
                <input type="text" class="form-control" id="province" name="province" placeholder="Province">
            </div>

            <!--MUNICIPALITY-->
            <div class="col-lg-2 mb-3">
                <label for="municipality" class="form-label">Municipality</label>
                <input type="text" class="form-control" id="municipality" name="municipality" placeholder="Municipality">
            </div>

            <!--BARANGAY-->
            <div class="col-lg-2 mb-3">
                <label for="barangay" class="form-label">Barangay</label>
                <input type="text" class="form-control" id="barangay" name="barangay" placeholder="barangay">
            </div>

            <!--STREET-->
            <div class="col-lg-2 mb-3">
                <label for="street" class="form-label">Street</label>
                <input type="text" class="form-control" id="street" name="street" placeholder="Street">
            </div>

            <!--ZIPCODE-->
            <div class="col-lg-2 mb-3">
                <label for="zipcode" class="form-label">Zip Code</label>
                <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Zip Code">
            </div>

            <h4>Academic Information</h4>
            <!--COURSE-->
            <div class="col-lg-6 mb-3">
                <label for="course" class="form-label">Course</label>
                <select class="form-select form-select" id="course" name="course" aria-label="Large select example">
                    <option value="" disabled selected>Course</option>
                    <option value="BSIT">Bachelero Of Science in Information Technology</option>
                    <option value="BSCS">Bachelero Of Science in Computer Science</option>
                </select>
            </div>
            
            <!--YEAR LEVEL-->
            <div class="col-lg-2 mb-3">
                <label for="year_level" class="form-label">Year Level</label>
                <select class="form-select form-select" id="year_level" name="year_level" aria-label="Large select example">
                    <option value="" disabled selected>Year Level</option>
                    <option value="1st Year">1st Year</option>
                    <option value="2nd Year">2nd Year</option>
                    <option value="3rd Year">3rd Year</option>
                    <option value="4th Year">4th Year</option>
                    <option value="5th Year">5th Year</option>
                </select>
            </div>

            <!--SECTION-->
            <div class="col-lg-2 mb-3">
                <label for="section" class="form-label">Section</label>
                <input type="text" class="form-control" id="section" name="section" placeholder="Section">
            </div>

            <!--SCHOOL YEAR-->
            <div class="col-lg-2 mb-3">
                <label for="school_year" class="form-label">School Year</label>
                <input type="text" class="form-control" id="school_year" name="school_year" placeholder="School Year" readonly>
            </div>

            <div class="d-flex justify-content-center mt-3">
                    <p id="response"></p>
            </div>

            <!--SUBMIT BUTTON-->
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Save Student</button>
            </div>
        </div>  
    </form>
</div>
