<?php
session_start();

// Database connection
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "SERVE_SOFT";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['Name']);
    $password = $_POST['Password'];

    // Fetch user from database
    $sql = "SELECT User_id, Name, Password, Role_id FROM User WHERE Name = '$name'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['Password'])) {
            // Password is correct, start a new session
            $_SESSION['user_id'] = $user['User_id'];
            $_SESSION['user_name'] = $user['Name'];
            $_SESSION['role_id'] = $user['Role_id'];

            // Redirect to appropriate page based on role
            if ($user['Role_id'] == 1) {
                header("Location: admin_dashboard.php");
            } else {
                header("Location: user_dashboard.php");
            }
            exit();
        } else {
            $error_message = "Invalid username or password";
        }
    } else {
        $error_message = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="ul.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="cg">
            <div class="text-center mb-4">
                <img src="reg20.jpeg" alt="Picture">
            </div>
            <form class="text-center" method="post">
                <h1>Welcome back!</h1>
                <?php
                if (!empty($error_message)) {
                    echo "<div class='alert alert-danger'>$error_message</div>";
                }
                ?>
                <label for="Name">Name:</label>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Name" id="Name" name="Name" required>
                </div>
                <label for="Password">Password:</label>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" id="Password" name="Password" required>
                </div>
                <div class="button-container">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </div>
         
                <div class="text-center mt-3">
                    <p>Don't have an account? 
                        <a href="userregistration.html" class="signup-btn">Sign Up</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>