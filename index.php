<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latest Articles</title>
    <link rel="stylesheet"href="style.css">
</head>
<body>
    <header>
        <h1>Latest Articles</h1>
        <nav class="navbar">
            <a href="login.php">Login</a> 
            <a href="register.php">Register</a>
        </nav>
    </header>
    <div class="splash">
        <!-- <img src="image31.png" class="fade-in"> -->
        <h1 class="fade-in">NEWSPAPER!!</h1>
    </div>
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
    <script>
    const splash = document.querySelector('.splash');
        document.addEventListener('DOMContentLoaded', (e)=>{
            setTimeout(()=>{
                splash.classList.add('display-none');
            },2000);
        })
        let imgContainer = document.querySelector(".img-container");
        setInterval(() => {
        let last = imgContainer.firstElementChild;
        last.remove();
        imgContainer.appendChild(last);
        }, 2500);
    </script>
</body>
</html>
