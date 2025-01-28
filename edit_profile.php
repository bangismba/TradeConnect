<?php
// Ensure session is started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include "includes/auth.php";
include "includes/header-2.php";

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    $message = urlencode("Please log in to edit your profile.");
    header("Location: login.php?message=$message");
    exit();
}

// Retrieve user ID from the session
$user_id = $_SESSION['user_id'];
?>

<style>
    body {
        background-color: #f8f9fa;
    }

    .form-container {
        background-color: #ffffff;
        padding: 1.5rem;
        border-radius: .5rem;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 600px; 
        margin: 0 auto;
    }

    .custom-file-upload {
        position: relative;
        width: 100%;
        height: 300px;
        background-color: #f1f1f1;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        overflow: hidden;
        margin-bottom: 1rem; 
    }

    .custom-file-upload input[type="file"] {
        display: none;
    }

    .custom-file-upload img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    .add-icon-overlay {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 3rem; 
        color: rgba(255, 255, 255, 0.7);
        pointer-events: none;
    }

    .form-content {
        margin-top: 1rem;
    }
</style>

<body>
    <div class="container my-5">
        <div class="form-container mx-auto">
            <form action="includes/auth.php" method="POST" enctype="multipart/form-data">
                <div class="custom-file-upload" onclick="document.getElementById('profileImage').click();">
                    <input type="file" id="profileImage" name="profile" accept="image/*" onchange="previewImage(event)" required>
                    <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user_id); ?>">
                    <img id="profilePreview" src="assets/img/tradesman2.jpeg" alt="Image Preview">
                    <div class="add-icon-overlay">
                        <i class="fas fa-plus-circle"></i>
                    </div>
                </div>
                <div class="form-content">
                    <button type="submit" name="update_profile" class="btn btn-action-sm w-100">Update Profile</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function () {
                const output = document.getElementById('profilePreview');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

<?php
include "includes/footer.php";
include "includes/script.php";
?>
