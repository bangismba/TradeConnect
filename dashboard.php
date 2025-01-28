<?php
session_start(); // Start the session

// Check if the user is authenticated
if (!isset($_SESSION['user_id'])) {
    // If not authenticated, redirect to login page
    header("Location: index.php");
    exit();
}

include_once "includes/auth.php";
include_once "includes/header.php";
?>


<?php
include_once "includes/footer.php";
include_once "includes/script.php";
?>