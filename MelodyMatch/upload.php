<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MelodyMatch - Upload Melody</title>
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
      </ul>
    </nav>
  </header>
  <main>
    <section class="upload-form">
      <h1>Upload Your Melody</h1>
      
      <form action="#" method="post" enctype="multipart/form-data">
        <input type="file" name="melodyFile" accept=".mp3, .wav">
        <label for="melodyDescription">Description:</label>
        <textarea id="melodyDescription" name="melodyDescription" rows="4"></textarea>
        <button type="submit" class="upload-button">Upload</button>
      </form>
    </section>
  </main>
  <footer>
    <p>&copy; 2023 MelodyMatch. All rights reserved.</p>
  </footer>
</body>
</html>
