<!DOCTYPE html>
<html>
<head>
    <title>Article</title>
    <link rel="stylesheet" type="text/css" href="article.css">
</head>
<body>
    <header>
        <h1>Article</h1>
    </header>
    <!-- <nav class="navbar">
        <a href="login.php">Login</a> 
        <a href="register.php">Register</a>
    </nav> -->
    <main>
        <section>
            <!-- <h2>Article Details</h2> -->
            <?php
            include 'includes/db_connection.php';

            // Retrieve article details based on the ID passed through the URL
            $article_id = $_GET['id'];
            $sql = "SELECT * FROM articles WHERE article_id = $article_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<article>";
                    echo "<h3>" . $row["title"] . "</h3>";
                    echo "<p><strong>Publication Date:</strong> " . $row["publication_date"] . "</p>";
                    echo "<img src='" . $row["photo_url"] . "' alt='" . $row["title"] . "' />";
                    echo "<p>" . $row["content"] . "</p>";
                    echo "</article>";
                }
            } else {
                echo "Article not found";
            }
            ?>

        </section>
    </main>
    <footer>
        <p>&copy; 2024 Newspaper Website</p>
    </footer>
</body>
</html>
