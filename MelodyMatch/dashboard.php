<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="styles/style1.css"> <!-- Link to your CSS file -->

    <style>
        
    </style>
</head>
<body>
    <header>
        <h1>Welcome, User!</h1>
        <nav>
            <ul>
                <li><a href="?page=profile">Profile</a></li>
                <li><a href="?page=upload">Upload Music</a></li>
                <li><a href="?page=playlists">Playlists</a></li>
                <li><a href="?page=activity">Activity</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <!-- Profile Section -->
        <section id="profile" class="dashboard-section">
            <h2>Profile</h2>
            <!-- Add profile information here -->
        </section>

        <!-- Upload Music Section -->
        <section id="upload" class="dashboard-section">
            <h2>Upload Music</h2>
            <!-- Add music upload form here -->
        </section>

        <!-- Playlists Section -->
        <section id="playlists" class="dashboard-section">
            <h2>Playlists</h2>
            <!-- Add playlist management here -->
        </section>

        <!-- Activity Section -->
        <section id="activity" class="dashboard-section">
            <h2>Activity</h2>
            <!-- Add activity feed here -->
        </section>
    </main>

    <footer>
        <!-- Footer content here -->
    </footer>

    <script src="scripts/dashboard.js"></script>
</body>
</html>
