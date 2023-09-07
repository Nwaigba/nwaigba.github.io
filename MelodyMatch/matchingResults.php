<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MelodyMatch - Matching Results</title>
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
        <li><a href="matchingResults.html">Matching Results</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <section class="matching-results">
      <h1>Matching Results</h1>
      <div class="result">
        <h2>Matched Melody 1</h2>
        <p>Description: Lorem ipsum dolor sit amet.</p>
        <audio controls>
          <source src="melody1.mp3" type="audio/mpeg">
          Your browser does not support the audio element.
        </audio>
      </div>
      <div class="result">
        <h2>Matched Melody 2</h2>
        <p>Description: Consectetur adipiscing elit.</p>
        <audio controls>
          <source src="melody2.mp3" type="audio/mpeg">
          Your browser does not support the audio element.
        </audio>
      </div>
      <!-- Add more result divs for additional matches -->
    </section>
  </main>
  <footer>
    <p>&copy; 2023 MelodyMatch. All rights reserved.</p>
  </footer>
</body>
</html>
