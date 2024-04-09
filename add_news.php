<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection
    include 'includes/db_connection.php';

    // Gather form data
    $title = $_POST['title'];
    $content = $_POST['content'];
    $photo_url = $_POST['photo_url'];
    $publication_date = date('Y-m-d H:i:s');

    // Prepare SQL statement
    $sql = "INSERT INTO articles (title, content, photo_url, publication_date) 
            VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $title, $content, $photo_url, $publication_date);

    // Execute SQL statement
    if ($stmt->execute()) {
        // Close statement and connection
        $stmt->close();
        $conn->close();

        // Redirect to author.php
        header("Location: author.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Redirect user back to the form if accessed directly
    header("Location: author.php");
    exit();
}
?>
