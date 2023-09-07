<?php
session_start(); // Start the session (if not already started)
include("database/connect.php"); // Include your database connection

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to the login page if not logged in
    exit();
}

// Fetch user data from the database based on user_id
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM users WHERE id = ?";
$stmt = $connect->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>
<!-- HTML part for displaying user profile information -->
<h2>Profile Information</h2>
<p>Name: <?php echo $user['name']; ?></p>
<p>Email: <?php echo $user['email']; ?></p>
<!-- Add more profile fields as needed -->

<!-- HTML part for displaying user profile information -->
<h2>Profile Information</h2>
<p>Name: <?php echo isset($user['name']) ? $user['name'] : 'N/A'; ?></p>
<p>Email: <?php echo isset($user['email']) ? $user['email'] : 'N/A'; ?></p>

<!-- Display the user's profile picture if available -->
<?php if (isset($user['profile_picture'])): ?>
    <img src="<?php echo $user['profile_picture']; ?>" alt="Profile Picture">
<?php else: ?>
    <!-- If no profile picture is available, you can display a default image -->
    <img src="default_profile_picture.jpg" alt="Default Profile Picture">
<?php endif; ?>

<!-- Add more profile fields as needed -->




<?php
// Check if the profile update form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_profile'])) {
    // Retrieve form data
    $newName = $_POST['new_name'];
    $newEmail = $_POST['new_email'];

    // Update user data in the database
    $updateQuery = "UPDATE users SET name = ?, email = ? WHERE id = ?";
    $stmt = $connect->prepare($updateQuery);
    $stmt->bind_param("ssi", $newName, $newEmail, $user_id);

    if ($stmt->execute()) {
        // Update successful, you can display a success message
        $_SESSION['flash_message'] = "Profile updated successfully.";
    } else {
        // Update failed, display an error message
        $_SESSION['flash_message'] = "Profile update failed.";
    }
    // Redirect back to the profile page
    header("Location: profile.php");
    exit();
}
?>

