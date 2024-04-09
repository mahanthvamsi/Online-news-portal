<!DOCTYPE html>
<html>
<head>
    <title>Add News - Newspaper</title>
    <link rel="stylesheet" type="text/css" href="addStyle.css">
</head>
<body>
    <header>
        <h1>Add News</h1>
    </header>
    <nav>
    </nav>
    <main>
        <section>
            <!-- <h2>Add News</h2> -->
            <form action="add_news.php" method="post">
                <label for="title">Title:</label><br>
                <input type="text" id="title" name="title"><br>
                
                <label for="content">Content:</label><br>
                <textarea id="content" name="content"></textarea><br>
                
                <label for="photo_url">Photo URL:</label><br>
                <input type="text" id="photo_url" name="photo_url"><br><br>
                
                <input type="submit" value="Submit">
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Newspaper Website</p>
    </footer>
</body>
</html>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'includes/db_connection.php';

    $title = $_POST['title'];
    $content = $_POST['content'];
    $photo_url = $_POST['photo_url'];
    $publication_date = date('Y-m-d H:i:s');

    $sql = "INSERT INTO articles (title, content, photo_url, publication_date) 
            VALUES ('$title', '$content', '$photo_url', '$publication_date')";

    if ($conn->query($sql) === TRUE) {
        echo "New article added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
