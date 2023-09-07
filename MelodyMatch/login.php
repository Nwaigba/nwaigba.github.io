<?php
session_start(); // Start the session (if not already started)

// check if the user is already logged in. Redirect to the dashboard if logged in.
if(isset($_SESSION['user_id'])){
  header("Location: dashboard.php");
  exit();
} 

include ("database/connect.php"); //  include your database connection
// handle login form submission
  if ($_SERVER['REQUEST_METHOD']== "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Validate user input (e.g., check for empty fields)
  if (empty($email) || empty($password)) {
    $_SESSION['flash_message'] = "Please fill in both email and password fields."; 
  } else {
     // Validate and sanitize input
     $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // check if the email exists in the database
    $query = "SELECT id, email, password FROM users WHERE email = ?";
    $stmt = $connect->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
      $row = $result->fetch_assoc();
      $user_id = $row["id"];
      $hashed_password = $row["password"];

      // verify the password
      if(password_verify($password, $hashed_password)) {
        // password is correct, create a session
        $_SESSION['user_id'] = $user_id;
        $_SESSION['flash_message'] = "Login successful!";
        header("Location: Profile.php ");
        exit();
      } else {
        $_SESSION['flash_message'] = "Incorrect password!";
      }
    } else {
      $_SESSION['flash_message'] = "User not found. Please register!";
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MelodyMatch - Login</title>
  <link rel="stylesheet"  type="text/css" href="styles/style.css"> <!-- Link to your CSS file -->
</head>
<body>
  <header>
    <nav>
      <ul>
        <!-- Navigation links -->
      </ul>
    </nav>
  </header>
  <main>
    <section class="auth">
      <h1>Login</h1>
<?php
include ("database/connect.php");
// Check if a flash message is set
if (isset($_SESSION['flash_message'])) {
  echo '<div class="flash-message">' . $_SESSION['flash_message'] . '</div>';
  
  // Clear the flash message
  unset($_SESSION['flash_message']);
}



?>
      <form action="<?php  echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit" class="auth-button">Login</button>
      </form>
      <p class="forgot-password-link"><a href="forgot-password.php">Forgot your password?</a></p>
    </section>
  </main>
  <footer>
    <!-- Footer content -->
  </footer>
  <script>
  // Function to fade out the flash message
  function fadeOutFlashMessage() {
    var flashMessage = document.querySelector('.flash-message');
    if (flashMessage) {
      flashMessage.style.transition = "opacity 6s ease-in-out";
      flashMessage.style.opacity = "0";
      setTimeout(function() {
        flashMessage.style.display = "none";
      }, 2000); // Adjust the duration (in milliseconds) as needed
    }
  }

  // Call the fadeOutFlashMessage function when the page loads
  window.onload = function() {
    fadeOutFlashMessage();
  };
</script>

</body>
</html>
