<?php
session_start(); // Start the session

// Check if the user is authenticated
if (!isset($_SESSION['user_id'])) {
    // If not authenticated, redirect to login page
    header("Location: index.php");
    exit();
}

// Initialize variable
$id_of_user = null;
$userData = null;

// Include necessary files
include "includes/auth.php";
include "includes/header-2.php";

// Get the ID from the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_of_user = $_GET['id'];

    // Fetch user data using a secure function
    $userData = getItem($id_of_user, 'users'); // Assuming this function is defined elsewhere
}

$totalPost = countRowsById('posts', 'user_id', $id_of_user);

// Handle the case where user data is not found
if (!$userData) {
    echo "User not found.";
    exit();
}

// Fetch all posts and sort them
$posts = getAll("posts");
rsort($posts);

?>

  <main class="main overflow-hidden">

    <!-- user profile -->
    <div>
      <div class="">
        <div class="modal-content">
          <div class="modal-header bg-accent">
            <h5 class="modal-title" id="staticBackdropLabel">User Profile</h5>
          </div>
          <div class="modal-body bg-secondary">
              <div class="ter py-5">
                <div class="row d-flex justify-content-center">
                  <div class="col col-lg-9 col-xl-8">
                    <div class="card">
                      <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
                        <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                          <img src="assets/posts/<?php echo htmlspecialchars($userData['profile']); ?>"
                            alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                            style="width: 150px; z-index: 1">
                        <?php if($_SESSION['user_id'] == $id_of_user){ ?>
                          <a href="edit_profile.php"  type="button"  class="btn btn-outline-dark"  style="z-index: 1;">
                            Edit profile
                        </a>
                        <?php }?>
                        </div>
                        <div class="ms-3" style="margin-top: 130px;">
                          <h5><?php echo htmlspecialchars($userData['fname']); ?></h5>
                          <p><?php echo htmlspecialchars($userData['state']); ?></p>
                        </div>
                      </div>
                      <div class="p-4 text-black bg-body-tertiary">
                        <div class="d-flex justify-content-end text-center py-1 text-body">
                          <div>
                            <p class="mb-1 h5"><?php echo htmlspecialchars($totalPost); ?></p>
                            <p class="small text-muted mb-0"><?php if($totalPost > 1){ echo "Posts";} else{ echo "Post";}  ?></p>
                          </div>
                        </div>
                      </div>
                      <div class="card-body p-4 text-black">
                        <div class="mb-5  text-body">
                          <p class="lead fw-normal mb-1">About</p>
                          <div class="p-4 bg-body-tertiary">
                            <p class="font-italic mb-1"><?php echo htmlspecialchars($userData['skill']); ?></p>
                            <p class="font-italic mb-1">Lives within <?php echo htmlspecialchars($userData['localGov']); ?></p>
                          </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-4 text-body">
                          <p class="lead fw-normal mb-0">Posts</p>
                        </div>
                        <div class="row g-2">
                          <?php $user_posts = fetchData('posts', 'user_id', $id_of_user); foreach($user_posts as $user_post){ ?>
                          <div class="col-md-6 mb-2">
                            <img src="../assets/posts/<?php echo htmlspecialchars($user_post['post_image']); ?>" alt="image 1"
                              class="w-100 rounded-3"> <br>
                              <p><?php echo htmlspecialchars($user_post['post_description']); ?></p>
                              <?php if($_SESSION['user_id'] == $id_of_user){ ?> <div class="lead fw-normal mb-1"><button class="btn btn-action-sm" onclick="deletePost(<?php echo $user_post['id']; ?>)">Delete Post</button></div><?php } ?>
                          </div>
                          <?php }; ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>

    <?php include "includes/settings.php";?>
  </main>
<?php




include "includes/footer.php";
include "includes/script.php";


?>