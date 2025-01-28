<?php
session_start(); // Start the session

// Check if the user is authenticated
if (!isset($_SESSION['user_id'])) {
    // If not authenticated, redirect to login page
    header("Location: index.php");
    exit();
}

include "includes/auth.php";
include "includes/header.php";

$jobs = getAll("jobs");
rsort($jobs);
?>

<style>
    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border: none;
        border-radius: 8px;
        overflow: hidden;
        transition: transform 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    .card-body {
        background-color: #f8f9fa;
    }
    .card-title {
        font-size: 1.2rem;
        font-weight: bold;
        color: #333;
    }
    .card-text {
        font-size: 0.9rem;
        color: #555;
    }
    .btn-primary {
        background-color: #0069d9;
        border: none;
        transition: background-color 0.3s ease;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
    /* Center modal text */
    .modal-body {
        text-align: left;
    }
</style>

<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Available Job Listings for Tradesmen</h2>
    <div class="row">
        <?php foreach ($jobs as $job): 
            $jobId = $job['id'];
            $jobTitle = $job['job_title'];
            $tradeType = $job['trade_type'];
            $location = $job['location'];
            $description = substr($job['job_description'], 0, 100) . '...'; // Short description
            $fullDescription = $job['job_description']; // Full description for modal
        ?>
        
        <!-- Job Card -->
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($jobTitle); ?></h5>
                    <p class="card-text"><strong>Trade:</strong> <?php echo htmlspecialchars($tradeType); ?></p>
                    <p class="card-text"><strong>Location:</strong> <?php echo htmlspecialchars($location); ?></p>
                    <p class="card-text"><?php echo htmlspecialchars($description); ?></p>
                    <!-- Trigger Modal Button -->
                    <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#jobModal<?php echo $jobId; ?>">
                        <i class="fas fa-info-circle"></i> More Details
                    </button>
                </div>
            </div>
        </div>

        <!-- Job Modal -->
        <div class="modal fade" id="jobModal<?php echo $jobId; ?>" tabindex="-1" aria-labelledby="jobModalLabel<?php echo $jobId; ?>" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="jobModalLabel<?php echo $jobId; ?>"><?php echo htmlspecialchars($jobTitle); ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Trade Type:</strong> <?php echo htmlspecialchars($tradeType); ?></p>
                        <p><strong>Location:</strong> <?php echo htmlspecialchars($location); ?></p>
                        <p><strong>Full Description:</strong> <?php echo htmlspecialchars($fullDescription); ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <?php endforeach; ?>
    </div>
</div>

<script>
    // Bootstrap's JavaScript (necessary for modals)
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>

</body>

<?php
include "includes/footer.php";
include "includes/script.php";
?>
