<div class="d-flex justify-content-center align-item-center">
  <div class="card shadow-sm w-100" style="max-width: 500px; max-height: fit-content; margin-top: 100px; color: #000;">
    <div class="card-body bg-white">

    <h3 class="text-center mb-3">🔐 Login</h3>
    <form id="login_form">
      <!-- Email -->
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" name="email" id="email" required>
      </div>
      
      <!-- Password -->
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password" required>
      </div>
      
      <p id="response"></p>

      <!-- Submit -->
      <div class="d-grid">
        <button type="submit" class="btn btn-primary">Login</button>
      </div>

      

      <!-- Optional: Forgot password -->
      <div class="text-center mt-3">
        <a href="#">Forgot password?</a>
      </div>
      
      <div class="text-center mt-3">
        <small>Don't have an account? <a href="register-btn">Register here</a></small>
      </div>
    </form>
    </div>
  </div>
</div>


