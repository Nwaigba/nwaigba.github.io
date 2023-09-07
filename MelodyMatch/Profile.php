<?php
session_start(); // Start the session (if not already started)
include("database/connect.php"); //Include your database connection.

// Check if the user is logged in
if(!isset($_SESSION['user_id'])) {
  header("Location: login.php"); // Redirect to the login page if not logged in.
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MelodyMatch - Your Profile</title>
  <link rel="stylesheet" href="styles/style.css"> <!-- Link to your CSS file -->
  <style>

</style>
</head>
<body>
  <header>
    <nav>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="upload.html">Upload</a></li>
        <li><a href="profile.html">Profile</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="about.html">User Profile</a></li>
      </ul>
    </nav>
  </header>

  <?php
  // Fetch user data from the database basedon user_id
  $user_id = $_SESSION['user_id'];
  $query = "SELECT * FROM users WHERE id = ?";
  $stmt = $connect->prepare($query);
  $stmt->bind_param("i", $user_id);
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_assoc(); 
  ?>
  <main>
    <section class="user-profile">
      <div class="user-info">
        <?php if (isset($user['profile_picture'])):?>
        <img src="<?php echo $user['profile_picture']; ?>" alt="Your Avatar"  width="100px">
          <?php else: ?>
             <!-- If no profile picture is available, you can display a default image -->
        <img src="default_profile_picture.jpg" alt="Default Profile Picture">
          <?php endif; ?>
        <h1>Your Profile</h1>
        <p>Name:  <?php echo isset($user['username']) ? $user['username'] : 'N/A';?></p>
        <p>Email: <?php echo $user['email']?></p>
        <!-- Add more user details as needed -->
      </div>

      <?php
// Check if the profile update form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_profile'])) {
    // Retrieve form data
    $newName = $_POST['new_name'];
    $newEmail = $_POST['new_email'];

    // Update user data in the database
    $updateQuery = "UPDATE users SET username = ?, email = ? WHERE id = ?";
    $stmt = $connect->prepare($updateQuery);
    $stmt->bind_param("ssi", $newName, $newEmail, $user_id);

    if ($stmt->execute()) {
        // Update successful, you can display a success message
        $_SESSION['flash-message'] = "Profile updated successfully.";
    } else {
        // Update failed, display an error message
        $_SESSION['flash_message'] = "Profile update failed.";
    }
    // Redirect back to the profile page
    header("Location: profile.php");
    exit();
}
?>

      <div>
        <!-- HTML part for the profile update form -->
      <form method="POST" action="profile.php" class="auth">
    <label for="new_name">New Name:</label>
    <input type="text" id="new_name" name="new_name" value="<?php echo $user['username']; ?>">
    <label for="new_email">New Email:</label>
    <input type="email" id="new_email" name="new_email" value="<?php echo $user['email']; ?>">
    <button type="submit" class="auth-button" name="update_profile">Update Profile</button>
</form>
      </div>
      <div class="uploaded-melodies">
        <h2>Uploaded Melodies</h2>
        <div class="melody">
          <h3>Melody 1</h3>
          <p>Description: Lorem ipsum dolor sit amet.</p>
          <audio controls>
            <source src="melody1.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
          </audio>
        </div>
        <div class="melody">
          <h3>Melody 2</h3>
          <p>Description: Consectetur adipiscing elit.</p>
          <audio controls>
            <source src="melody2.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
          </audio>
        </div>
        <!-- Add more melody divs for additional uploads -->
      </div>
    </section>
  </main>
  <footer>
    <p>&copy; 2023 MelodyMatch. All rights reserved.</p>
  </footer>
  <script>
  </script>
</body>
</html>
