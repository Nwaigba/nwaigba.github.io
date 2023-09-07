<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MelodyMatch App</title>
<style>
  body {
    font-family: Arial, sans-serif;
    text-align: center;
    margin: 0;
    padding: 0;
  }
  header {
    background-color: #333;
    color: white;
    padding: 10px;
  }
  main {
    padding: 20px;
  }
  button {
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    border: none;
    cursor: pointer;
  }
</style>
</head>
<body>
  <header>
    <h1>MelodyMatch App</h1>
  </header>
  <main>
    <h2>Upload Melody</h2>
    <input type="file" accept=".mp3, .wav">
    <button id="uploadButton">Upload</button>
    <div id="result"></div>
  </main>
  <script>
    const uploadButton = document.getElementById("uploadButton");
    const resultDiv = document.getElementById("result");
    
    uploadButton.addEventListener("click", () => {
      // In a real app, you would implement the melody matching logic here
      resultDiv.innerHTML = "Melody matching result will appear here.";
    });
  </script>
</body>
</html>
