<?php
session_start();
// var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MelodyMatch - Signup</title>
  <link rel="stylesheet" href="styles/style.css"> <!-- Link to your CSS file -->
</head>
<body>
  <header>
    <nav>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="upload.html">Upload</a></li>
        <li><a href="profile.html">Profile</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="contact.html">Contact</a></li>
        <li><a href="faq.html">FAQ/Help</a></li>
        <li><a href="signup.html">Sign Up</a></li>
        <li><a href="login.html">Login</a></li>
      </ul>
    </nav>
  </header>

  <!-- <?php
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $email = $_POST['email'];
//     $password = $_POST['password'];
//     $username = $_POST['username'];

//     // Validate input here (e.g., check if email is valid, password meets requirements, etc.)

//     // Hash the password
//     $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

//     // Connect to the database and insert user data
//     $conn = mysqli_connect($host, $user, $password, $database);
//     $query = "INSERT INTO users (email, password, username) VALUES ('$email', '$hashedPassword', '$username')";

//     if (mysqli_query($conn, $query)) {
//         echo "Registration successful!";
//     } else {
//         echo "Error: " . mysqli_error($conn);
//     }

//     mysqli_close($conn);
// }
?> -->



  <main>
    <section class="auth">
      <h1>Sign Up</h1>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $pics = $_FILES['pics'];
  $password = $_POST['password'];
  $cpassword = $_POST['Cpassword'];

  // hash the password 
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  // setup the pics upload folder
$targetDirectory = 'uploads/';  // Specify your target directory
$uploadedFile = $_FILES['pics']['tmp_name'];
$targetFile = $targetDirectory . $_FILES['pics']['name'];

// Move the uploaded file to the target directory
if (move_uploaded_file($uploadedFile, $targetFile)) {
    // File uploaded successfully
    // Store $targetFile in the database
} else {
    // File upload failed
    echo "File upload failed. Make sure the file is less than 50MB.";
}

  // connect to the database 
  include("database/connect.php");
  $query = "INSERT INTO users(username, email, profile_picture, password) VALUES ('$name', '$email', '$targetFile', '$hashedPassword')";
    if (mysqli_query($connect, $query)) {
      // Set a flash message
      $_SESSION['flash_message'] = "Registration Successful!";
      // echo "Registration Successful";
      // Redirect to another page after processing
    header("Location: login.php");
    exit(); // Ensure that no further code is executed
    } else {
      echo "Error: " .mysqli_error($connect);
    }
}
?>
<?php
?>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        <label for="name">UserName:</label>
        <input type="text" id="name" name="name" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="pics">Profile Picture:</label>
        <input type="file" id="pics" name="pics" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <label for="Cpassword">Confirm Password:</label>
        <input type="password" id="Cpassword" name="Cpassword" required>
        <button type="submit" class="auth-button" id="submit-button">Sign Up</button>
      </form>
    </section>
  </main>
  <footer>
    <!-- Footer content -->
  </footer>
  <script>
  </script>
</body>
</html>
