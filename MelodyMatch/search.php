<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MelodyMatch - Search Melodies</title>
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
    <section class="search">
      <h1>Search Melodies</h1>
      <form action="#" method="get">
        <input type="text" name="searchQuery" placeholder="Enter search keyword">
        <button type="submit" class="search-button">Search</button>
      </form>
      <div class="search-results">
        <h2>Search Results</h2>
        <div class="result">
          <h3>Search Result 1</h3>
          <p>Description: Lorem ipsum dolor sit amet.</p>
          <audio controls>
            <source src="result1.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
          </audio>
        </div>
        <div class="result">
          <h3>Search Result 2</h3>
          <p>Description: Consectetur adipiscing elit.</p>
          <audio controls>
            <source src="result2.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
          </audio>
        </div>
        <!-- Add more result divs for additional search results -->
      </div>
    </section>
  </main>
  <footer>
    <p>&copy; 2023 MelodyMatch. All rights reserved.</p>
  </footer>
</body>
</html>
