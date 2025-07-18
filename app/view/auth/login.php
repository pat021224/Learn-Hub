
<!-- 🟢 WRAPPER that replaces vh-100 and centers below navbar -->
<div class="container py-5 d-flex justify-content-center">
  <!-- 🟢 Card for login form -->
  <div class="card p-4 shadow-sm w-100" style="max-width: 400px;">
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
