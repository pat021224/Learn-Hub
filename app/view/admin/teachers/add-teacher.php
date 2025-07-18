<div class="container mt-5">
    <form id="add_teacher_form" class="p-4 bg-white border rounded shadow mx-5">
        <div class="row">
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
                <input type="text" class="form-control" id="email" name="email" placeholder="Email">
            </div>

            <!--CONTACT-->
            <div class="col-lg-4 mb-3">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Contact">
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

            <h4>Department</h4>
            <!--DEPARTMENT-->
            <div class="col-lg-4 mb-3">
                <label for="department" class="form-label">Department</label>
                <select class="form-select form-select" id="department" name="department" aria-label="Large select example">
                    <option value="" disabled selected>Department</option>
                    <option value="Computer Science">Computer Science</option>
                    <option value="Information Technology">Information Technology</option>
                    <option value="Mathematics">Mathematics</option>
                    <option value="Physics">Physics</option>
                    <option value="Biology">Biology</option>
                </select>
            </div>
            <!--RESPONSE-->
            <div class="d-flex justify-content-center">
                <p id="response">s</p>
            </div>

            <!--SUBMIT BUTTON-->
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Add Teacher</button>
            </div>
        </div>  
    </form>
</div>
