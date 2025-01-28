<?php
include_once 'config.php';

if (isset($_POST['delete_post'])) {
    $post_id = $_POST['post_id'];

    // Fetch the post to get the image path before deletion
    $post_query = "SELECT post_image FROM posts WHERE id = $post_id";
    $result = $conn->query($post_query);

    if ($result && $result->num_rows > 0) {
        $post_row = $result->fetch_assoc();
        $post_image = $post_row['post_image'];

        // Construct the full image path
        $image_path = "assets/posts/" . $post_image;

        // Delete the post from the database
        $delete_query = "DELETE FROM posts WHERE id = $post_id";
        if ($conn->query($delete_query) === TRUE) {
            // Remove the image file if it exists
            if ($post_image && file_exists($image_path)) {
                unlink($image_path); // Delete the image file from the server
            }
            echo json_encode(['status' => 'success', 'message' => 'Post deleted successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error deleting post: ' . $conn->error]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Post not found.']);
    }
}
?>
