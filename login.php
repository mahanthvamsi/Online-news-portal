<?php
include 'includes/db_connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $user['role'];

            if ($user['role'] == 'author') {
                header("Location: author.php");
            } else {
                header("Location: articles.php");
            }
            exit();
        } else {

            echo "Invalid password.";
        }
    } else {

        echo "User not found.";
    }
}


$actualPassword = 'chicken65'; 
$hashedPassword = '$2y$10$Up0byl2zD1NEUTCCdeFuveQ31Jefn4Y4AMgByafEuPBDPc.BxBrbC'; 


$hashedActualPassword = password_hash($actualPassword, PASSWORD_DEFAULT);

// if (password_verify($actualPassword, $hashedPassword)) {
//     echo "The hashed password matches the actual password.";
// } else {
//     echo "The hashed password does not match the actual password.";
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Newspaper</title>
    <link rel="stylesheet" href="lstyle.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <header>
        <h1>Login</h1>
    </header>
    <main>
        <section class="login-section">
            <h2>Login</h2>
            <form action="login.php" method="post" class="login-form">
                <div class="form-group">
                    <label for="username">Username:</label><br>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label><br>
                    <input type="password" id="password" name="password" required>
                    <input type="checkbox" onclick="togglePasswordVisibility('password')">Show Password
                </div>
                <div class="form-group">
                    <input type="submit" value="Login">
                </div>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Newspaper Website</p>
    </footer>

    <script>
        function togglePasswordVisibility(inputId) {
            var passwordInput = document.getElementById(inputId);
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>
</body>
</html>

