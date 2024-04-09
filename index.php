<!DOCTYPE html>
<html>
<head>
    <title>Newspaper - Latest Articles</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <h1>Latest Articles</h1>
    </header>
    <nav class="navbar">
        <a href="login.php">Login</a> 
        <a href="register.php">Register</a>
</nav>
    <main>
        <section>
            <h2>Latest Articles</h2>
            <?php
            include 'includes/db_connection.php';
            $sql = "SELECT * FROM articles ORDER BY publication_date DESC LIMIT 10";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<article>";
                    echo "<h3>" . $row["title"] . "</h3>";
                    echo "<p><strong></strong> " . $row["publication_date"] . "</p>";
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
