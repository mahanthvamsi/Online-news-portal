<!DOCTYPE html>
<html>
<head>
    <title>Newspaper - Category</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
        <h1>Newspaper - Category</h1>
    </header>
    <nav>
        <!-- Add navigation links if needed -->
    </nav>
    <main>
        <section>
            <?php
            // Include database connection script
            include 'includes/db_connection.php';
            
            // Check if category ID is set
            if(isset($_GET['id'])) {
                $category_id = $_GET['id'];
                
                // Fetch articles belonging to the specified category
                $sql = "SELECT * FROM articles WHERE category_id = $category_id";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    echo "<h2>Articles in this category</h2>";
                    // Output data of each article
                    while($row = $result->fetch_assoc()) {
                        echo "<article>";
                        echo "<h3><a href='article.php?id=" . $row["article_id"] . "'>" . $row["title"] . "</a></h3>";
                        echo "<p>" . $row["content"] . "</p>";
                        echo "<p>Published on: " . $row["publication_date"] . "</p>";
                        // Display other article information as needed
                        echo "</article>";
                    }
                } else {
                    echo "No articles found in this category";
                }
            } else {
                echo "Category ID not provided";
            }
            // Close database connection
            $conn->close();
            ?>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Newspaper Website</p>
    </footer>
</body>
</html>
