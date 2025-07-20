<div class="page-container d-flex justify-content-center align-item-center">
  <div class="card shadow-sm w-100" style="max-width: 600px; max-height: fit-content; margin-top: 100px; color: #000;">
    <div class="card-body bg-white">
    <h3 class="text-center mb-4">Account Registration</h3>
    <form id="registration_form">
      
      <!-- Email -->
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" required placeholder="Enter your school email">
      </div>

      <!-- Password -->
      <div class="mb-3">
        <label for="password" class="form-label">Create Password</label>
        <input type="password" name="password" id="password" class="form-control" required placeholder="Enter password">
      </div>

      <!-- Confirm Password -->
      <div class="mb-3">
        <label for="confirm_password" class="form-label">Confirm Password</label>
        <input type="password" name="confirm_password" id="confirm_password" class="form-control" required placeholder="Re-enter password">
      </div>

      <!-- Response area (for AJAX message, optional) -->
      <div id="response" class="mb-3 text-danger"></div>

      <!-- Submit Button -->
      <button type="submit" class="btn btn-primary w-100">Register</button>

      <!-- Already have account? -->
      <div class="text-center mt-3">
        <small>Already registered? <a href="login">Login here</a></small>
      </div>

    </form>
    </div>
  </div>
</div>

<?php include __DIR__ . '/../partials/footer.php'; ?>
