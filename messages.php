<?php
// Include necessary files
include "includes/auth.php";
include "includes/header-2.php";

// Ensure session is started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is authenticated
if (!isset($_SESSION['user_id'])) {
    // If not authenticated, redirect to login page
    header("Location: index.php");
    exit();
}

// Get the current user's details
$user_id = $_SESSION['user_id'];
$me = getItem($user_id, 'users');

// Check if the 'id' parameter exists in the URL and retrieve it safely
$other_id = isset($_GET['id']) ? intval($_GET['id']) : null;

if ($other_id === null) {
    // Redirect or handle error if no 'id' is provided
    header("Location: error.php?message=Invalid User ID");
    exit();
}

// Get the other user's details
$other = getItem($other_id, 'users');

// Ensure the `getItem` function returns valid data for the other user
if (!$other) {
    // Redirect or handle error if the other user is not found
    header("Location: error.php?message=User Not Found");
    exit();
}

// Generate consistent conversation ID (order user IDs alphabetically)
$conversation_id = min($user_id, $other_id) . '-' . max($user_id, $other_id);
?>

<script src="https://cdn.talkjs.com/talk.js"></script>
<script>
  // Enable debugging to troubleshoot issues
  Talk.debug = true;

  // Ensure TalkJS is loaded before initializing the session
  Talk.ready.then(function () {
      // Define the current user
      const me = new Talk.User({
          id: '<?php echo $me['id']; ?>',
          name: '<?php echo htmlspecialchars($me['fname']); ?>',
          email: '<?php echo htmlspecialchars($me['email']); ?>',
          photoUrl: 'assets/posts/<?php echo htmlspecialchars($me['profile']); ?>',
          welcomeMessage: 'Hi there!',
      });

      // Initialize TalkJS session for the current user
      const session = new Talk.Session({
          appId: 'tsAXudC9',  // Ensure this App ID is correct
          me: me,
      });

      // Define the other user
      const other = new Talk.User({
          id: '<?php echo $other['id']; ?>',
          name: '<?php echo htmlspecialchars($other['fname']); ?>',
          email: '<?php echo htmlspecialchars($other['email']); ?>',
          photoUrl: 'assets/posts/<?php echo htmlspecialchars($other['profile']); ?>',
          welcomeMessage: 'Hey, how can I help?',
      });

      // Create a consistent conversation ID for both users
      const conversationId = 'conversation-<?php echo $conversation_id; ?>';
      const conversation = session.getOrCreateConversation(conversationId);
      conversation.setParticipant(me);
      conversation.setParticipant(other);

      // Mount the chatbox UI
      const chatbox = session.createChatbox();
      chatbox.select(conversation);

      // Ensure the chatbox container exists before mounting
      const chatContainer = document.getElementById('talkjs-container');
      if (chatContainer) {
          chatbox.mount(chatContainer);
      } else {
          console.error("Chat container not found.");
      }

      // Debugging output to console
      console.log("TalkJS session initialized:", session);
      console.log("Conversation ID:", conversationId);
      console.log("Participants:", me, other);
  }).catch(function (error) {
      console.error("TalkJS failed to initialize:", error);
  });
</script>

<!-- Chat container element -->
<div id="talkjs-container" style="width: 90%; margin: 30px; height: 500px;">
  <i>Loading chat...</i>
</div>

<?php include "includes/settings.php"; ?>
<?php include "includes/footer.php"; ?>
<?php include "includes/script.php"; ?>
