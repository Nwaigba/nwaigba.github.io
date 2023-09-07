<?php
"CREATE DATABASE IF NOT EXISTS melodymatch";
// USE melodymatch;

// -- Users Table
$Users= "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    username VARCHAR(50),
    profile_picture VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

create_table($Users);

// -- Tracks Table
$Tracks = "CREATE TABLE IF NOT EXISTS tracks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    artist VARCHAR(100),
    album VARCHAR(100),
    release_year INT,
    duration INT,
    genre VARCHAR(50),
    audio_url VARCHAR(255),
    uploaded_by INT,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (uploaded_by) REFERENCES users(id)
)";
create_table($Tracks);

// -- Favorites Table
$favorites= "CREATE TABLE IF NOT EXISTS favorites (
    user_id INT,
    track_id INT,
    PRIMARY KEY (user_id, track_id),
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (track_id) REFERENCES tracks(id)
)";
create_table($favorites);

// -- Playlists Table
$Playlists = "CREATE TABLE IF NOT EXISTS playlists (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    created_by INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (created_by) REFERENCES users(id)
)";
create_table($favorites);

// -- Playlist Tracks Table
$PlaylistTrack = "CREATE TABLE IF NOT EXISTS playlist_tracks (
    playlist_id INT,
    track_id INT,
    PRIMARY KEY (playlist_id, track_id),
    FOREIGN KEY (playlist_id) REFERENCES playlists(id),
    FOREIGN KEY (track_id) REFERENCES tracks(id)
)";
create_table($PlaylistTrack);

// -- Likes/Dislikes Table
$likes_dislikes = "CREATE TABLE IF NOT EXISTS likes_dislikes (
    user_id INT,
    track_id INT,
    type ENUM('like', 'dislike'),
    PRIMARY KEY (user_id, track_id),
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (track_id) REFERENCES tracks(id)
)";
create_table($likes_dislikes);

// -- Comments Table
$Comments = "CREATE TABLE IF NOT EXISTS comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    track_id INT,
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (track_id) REFERENCES tracks(id)
)";
create_table($Comments);

// -- Followers/Following Table
$Followers = "CREATE TABLE IF NOT EXISTS followers (
    follower_id INT,
    following_id INT,
    PRIMARY KEY (follower_id, following_id),
    FOREIGN KEY (follower_id) REFERENCES users(id),
    FOREIGN KEY (following_id) REFERENCES users(id)
)";
create_table($Followers);

// -- Activity Table
$Activity = "CREATE TABLE IF NOT EXISTS activity (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    activity_type VARCHAR(50),
    activity_timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    associated_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id)
)";
create_table($Activity);

function create_table($sql_query){
    include("connect.php");
    $db = $connect->prepare($sql_query);
    if ($db->execute()){
        echo("Table created Successfully");
    }
};

// Execute the SQL queries
// if (mysqli_multi_query($conn, $createUsersTable . $createTracksTable /* + other tables */)) {
//     echo "Tables created successfully";
// } else {
//     echo "Error creating tables: " . mysqli_error($connect);
// }

// Close the connection
// mysqli_close($connect);
?>