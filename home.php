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

$commenter_id = $_SESSION['user_id'];

// Fetch all posts and sort them
$posts = getAll("posts");
if (is_array($posts)) {
    rsort($posts);
}

// Fetch user data
$userData = getItem($commenter_id, 'users');
?>

<main class="main overflow-hidden">
    <?php include "includes/category_filter.php"; ?>
    <?php include "includes/search.php"; ?>
    <?php include "includes/all_posts.php"; ?>
</main>

<?php
include_once "includes/footer.php";
include_once "includes/script.php";
?>
