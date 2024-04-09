<!DOCTYPE html>
<html>
<head>
    <title>Newspaper - Article</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
        <h1>Newspaper - Article</h1>
    </header>
    <nav>
        <!-- Add navigation links if needed -->
    </nav>
    <main>
        <article>
            <?php
            include 'includes/db_connection.php';
            
            // Check if article ID is set
            if(isset($_GET['id'])) {
                $article_id = $_GET['id'];
                
                // Fetch article from database
                $sql = "SELECT * FROM articles WHERE article_id = $article_id";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    // Output article details
                    $row = $result->fetch_assoc();
                    echo "<h2>" . $row["title"] . "</h2>";
                    echo "<p>" . $row["content"] . "</p>";
                    echo "<p>Published on: " . $row["publication_date"] . "</p>";
                    // Display other article information as needed
                } else {
                    echo "Article not found";
                }
            } else {
                echo "Article ID not provided";
            }
            // Close database connection
            $conn->close();
            ?>
        </article>
    </main>
    <footer>
        <p>&copy; 2024 Newspaper Website</p>
    </footer>
</body>
</html>
