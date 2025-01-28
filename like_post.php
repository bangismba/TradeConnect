<?php
// like_post.php
session_start();
include_once 'includes/config.php';

// Check for authentication
if (!isset($_SESSION['user_id']) || !isset($_POST['post_id'])) {
    echo json_encode(['error' => 'Authentication required']);
    exit;
}

$userId = $_SESSION['user_id'];
$postId = (int)$_POST['post_id'];

// Check if user has already liked the post
$query = "SELECT * FROM likes WHERE user_id = ? AND post_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $userId, $postId);
$stmt->execute();
$result = $stmt->get_result();
$isLiked = $result->num_rows > 0;

if ($isLiked) {
    // Unlike if already liked
    $query = "DELETE FROM likes WHERE user_id = ? AND post_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $userId, $postId);
    $stmt->execute();
} else {
    // Like if not liked
    $query = "INSERT INTO likes (user_id, post_id) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $userId, $postId);
    $stmt->execute();
}

// Get updated like count
$query = "SELECT COUNT(*) AS like_count FROM likes WHERE post_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $postId);
$stmt->execute();
$result = $stmt->get_result();
$likeCount = $result->fetch_assoc()['like_count'];

echo json_encode(['like_count' => $likeCount, 'liked' => !$isLiked]);
?>