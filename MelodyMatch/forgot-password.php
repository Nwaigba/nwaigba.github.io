<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MelodyMatch - Forgot Password</title>
  <link rel="stylesheet" href="styles/style.css"> <!-- Link to your CSS file -->
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
    <section class="forgot-password">
      <h1>Forgot Password</h1>
      <p>Enter your email address to receive a password reset link.</p>
      <form action="reset-password.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit" class="auth-button">Send Reset Link</button>
      </form>
      <p class="back-to-login-link"><a href="login.html">Back to Login</a></p>
    </section>
  </main>
  <footer>
    <!-- Footer content -->
  </footer>
</body>
</html>
