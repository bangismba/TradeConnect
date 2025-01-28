<?php
// Ensure session is started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "includes/auth.php";
include "includes/header.php";

$user_id = "User";

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}
?>
  <style>
    body {
      background-color: #f8f9fa;
      font-family: Arial, sans-serif;
    }
    .form-container {
      background-color: #ffffff;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 30px;
      max-width: 600px;
      margin: 30px auto;
    }
    .form-title {
      font-size: 1.8rem;
      font-weight: bold;
      color: #333;
      text-align: center;
    }
    .form-label {
      font-weight: bold;
      color: #555;
    }
    .btn-primary {
      background-color: #0069d9;
      border: none;
      padding: 10px 20px;
      font-size: 1.1rem;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }
    .btn-primary:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="form-container">
      <h2 class="form-title mb-4">Post a Job for Tradesmen</h2>
      <form action="" method="POST">
        
        <!-- Job Title -->
        <div class="mb-3">
          <label for="jobTitle" class="form-label">Job Title <i class="fas fa-briefcase"></i></label>
          <input type="text" class="form-control" id="jobTitle" name="job_title" placeholder="e.g., Plumber Needed for Pipe Repairs" required>
        </div>

        <!-- Trade Type -->
        <div class="mb-3">
            <label class="form-label" for="tradeType">Trade Type <i class="fas fa-tools"></i></label> 
            <select class="form-control" name="skill" id="tradeType">
            <?php foreach ($skills as $skill): ?>
            <option value="<?php echo htmlspecialchars($skill); ?>"><?php echo htmlspecialchars($skill); ?></option>
            <?php endforeach; ?>
            </select>
        </div>

        <!-- Location -->
        <div class="mb-3">
          <label for="location" class="form-label">Location <i class="fas fa-map-marker-alt"></i></label>
          <input type="text" class="form-control" id="location" name="location" placeholder="e.g., Lagos, Nigeria" required>
        </div>

        <!-- Job Type -->
        <div class="mb-3">
          <label for="jobType" class="form-label">Job Type <i class="fas fa-calendar-alt"></i></label>
          <select class="form-select" id="jobType" name="job_type" required>
            <option value="" disabled selected>Select Job Type</option>
            <option value="Full-Time">Full-Time</option>
            <option value="Part-Time">Part-Time</option>
            <option value="Contract">Contract</option>
            <option value="Temporary">Temporary</option>
          </select>
        </div>

        <!-- Project Duration -->
        <div class="mb-3">
          <label for="duration" class="form-label">Expected Project Duration <i class="fas fa-hourglass-half"></i></label>
          <input type="text" class="form-control" id="duration" name="duration" placeholder="e.g., 2 weeks, 3 months">
        </div>

        <!-- Job Description -->
        <div class="mb-3">
          <label for="jobDescription" class="form-label">Job Description <i class="fas fa-file-alt"></i></label>
          <textarea class="form-control" id="jobDescription" name="job_description" rows="4" placeholder="Describe the work involved" required></textarea>
        </div>

        <!-- Application Deadline -->
        <div class="mb-3">
          <label for="deadline" class="form-label">Application Deadline <i class="fas fa-calendar-check"></i></label>
          <input type="date" class="form-control" id="deadline" name="deadline">
        </div>

        <!-- Contact Email -->
        <div class="mb-3">
          <label for="contactEmail" class="form-label">Contact Email <i class="fas fa-envelope"></i></label>
          <input type="email" class="form-control" id="contactEmail" name="contact_email" placeholder="employer@example.com" required>
        </div>

        <!-- Contact Email -->
        <div class="mb-3">
          <label for="contactNumber" class="form-label">Contact Number <i class="fas fa-envelope"></i></label>
          <input type="number" class="form-control" id="contactNumber" name="contact_number" placeholder="080 *** *** **" required>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
          <button type="submit" name="post_job" class="btn btn-action-sm">Post Job</button>
        </div>
      </form>
    </div>
  </div>
</body>

<?php
include "includes/footer.php";
include "includes/script.php";

?>