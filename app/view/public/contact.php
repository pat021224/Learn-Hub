<div class="page-container d-flex justify-content-center align-item-center">
  <div class="card shadow-sm w-100" style="max-width: 600px; max-height: fit-content; margin-top: 100px; color: #000;">
    <div class="card-body bg-white">
      <!-- Contact Page -->
    <h1 class="fw-bold text-center mb-4">Contact Us</h1>
    
    <!-- Contact Form -->
    <form id="contact_form">
      <!-- Full Name -->
      <div class="mb-3">
        <label for="name" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Your full name" required>
      </div>

      <!-- Email -->
      <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
      </div>

      <!-- Message -->
      <div class="mb-3">
        <label for="message" class="form-label">Your Message</label>
        <textarea class="form-control" id="message" name="message" rows="5" placeholder="Write your message here..." required></textarea>
      </div>

      <!-- Response (optional for AJAX) -->
      <div id="form_response" class="text-danger mb-3"></div>

      <!-- Submit Button -->
      <button type="submit" class="btn btn-primary w-100">Send Message</button>
    </form>

    <!-- Contact Info (Optional) -->
    <div class="mt-5 text-center text-muted small">
      <p>Need to reach us directly? Email us at <a href="mailto:info@learnhub.com">info@learnhub.com</a></p>
      <p>Or visit our office at 123 Web Street, Cavite, PH</p>
    </div>
  </div>
</div>
</div>


<?php include __DIR__ . '/../partials/footer.php'; ?>