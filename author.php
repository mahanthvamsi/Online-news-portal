<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Author Dashboard - Newspaper</title>
    <link rel="stylesheet" type="text/css" href="author.css">
</head>
<body>
    <header>
        <h1>Author Dashboard</h1>
        <nav class="navbar">
            <a href="add_article.php">Add News</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>
    <main>
        <section class="articles">
            <?php
                include 'includes/db_connection.php';
                $sql = "SELECT * FROM articles ORDER BY publication_date DESC LIMIT 10";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<article>";
                        echo "<h3><a href='article.php?id=" . $row["article_id"] . "'>" . $row["title"] . "</a></h3>";
                        echo "<p><strong>Publication Date:</strong> " . $row["publication_date"] . "</p>";
                        echo "<div class='article-content'>";
                        echo "<img src='" . $row["photo_url"] . "' alt='" . $row["title"] . "' />";
                        // echo "<p>" . $row["content"] . "</p>";
                        echo "</div>";
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
