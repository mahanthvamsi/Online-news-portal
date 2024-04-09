<!DOCTYPE html>
<html>
<head>
    <title>Newspaper - Latest Articles</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
        <h1>Newspaper - Latest Articles</h1>
        <button class="signout-button" onclick="window.location.href='logout.php'">Sign Out</button>
    </header>
    
    <main>
        <section>
            <h2>Latest Articles</h2>
            <?php
            include 'includes/db_connection.php';
            // Fetch latest articles
            $sql = "SELECT * FROM articles ORDER BY publication_date DESC LIMIT 10"; // Fetching latest 10 articles
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<article>";
                    echo "<h3>" . $row["title"] . "</h3>";
                    echo "<img src='" . $row["photo_url"] . "' alt='" . $row["title"] . "' />";
                    echo "<p>" . $row["content"] . "</p>";
                    echo "</article>";
                }
            } else {
                echo "No articles found";
            }
            ?>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Newspaper Website</p>
    </footer>
</body>
</html>
