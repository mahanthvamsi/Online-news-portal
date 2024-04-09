<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Author Dashboard - Newspaper</title>
    <link rel="stylesheet" type="text/css" href="astyle.css">
</head>
<body>
    <header>
        <h1>Author Dashboard</h1>
    </header>
    <nav>
        <ul>
            <li><a href="add_article.php">Add News</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <main>
        <section>
            <h2>Latest Articles</h2>
            <?php
            include 'includes/db_connection.php';
            // Fetch latest articles
            $sql = "SELECT * FROM articles ORDER BY publication_date DESC LIMIT 10";
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
