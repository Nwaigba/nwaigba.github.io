<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'mysql';
$database_create = mysqli_connect($hostname,$username,$password,$database);


$sql = "CREATE DATABASE IF NOT EXISTS melodyMatch";
$tx = $database_create->prepare($sql);
$tx->execute();

$newdatabase = 'melodyMatch';
$connect = mysqli_connect($hostname,$username,$password,$newdatabase);


if($connect == true){
}else{
echo("<script>alert('Unable to access database');</script>");
}
?>


<!-- 

// Database credentials

$host = 'localhost';
$user = 'username';
$password = 'password';
$database = 'melodymatch';

// Create a connection
$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Example: Fetching user details by email
$email = 'user@example.com';
$query = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    echo "User ID: " . $user['id'] . "<br>";
    echo "Email: " . $user['email'] . "<br>";
} else {
    echo "User not found.";
}

// Close the connection
$conn->close();
?> -->
