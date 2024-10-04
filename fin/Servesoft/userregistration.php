<?php
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
$success_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $surname = $conn->real_escape_string($_POST['surname']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Basic validation
    if (empty($name) || empty($surname) || empty($email) || empty($password) || empty($confirm_password)) {
        $error_message = "All fields are required.";
    } elseif ($password !== $confirm_password) {
        $error_message = "Passwords do not match.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format.";
    } else {
        // Check if email already exists
        $check_email = $conn->query("SELECT * FROM User WHERE Email='$email'");
        if ($check_email->num_rows > 0) {
            $error_message = "Email already exists.";
        } else {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert user into database
            $sql = "INSERT INTO User (Name, Phone_Number, Email, Password, Role_id) 
                    VALUES ('$name $surname', '', '$email', '$hashed_password', 2)";
            
            if ($conn->query($sql) === TRUE) {
                $user_id = $conn->insert_id;
                
                // Create an account for the user
                $conn->query("INSERT INTO Account (User_id) VALUES ($user_id)");
                
                $success_message = "Registration successful!";
            } else {
                $error_message = "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link href="ul.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
</head>
<body>
<div class="background-image">
  <div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="cg"> 
      <div class="text-center mb-4">
        <img src="reg20.jpeg" alt="Picture">
      </div>  
      <form class="text-center" method="post"> 
        <h1>Sign Up</h1>
        <?php
        if (!empty($error_message)) {
            echo "<div class='alert alert-danger'>$error_message</div>";
        }
        if (!empty($success_message)) {
            echo "<div class='alert alert-success'>$success_message</div>";
        }
        ?>
        <div class="form-group">
          <label for="name">Username:</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
        </div>
        <div class="form-group">
          <label for="surname">Surname:</label>
          <input type="text" class="form-control" id="surname" name="surname" placeholder="Surname" required>
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
          <label for="password">New Password:</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>
        <div class="form-group">
          <label for="confirm_password">Confirm New Password:</label>
          <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm password" required>
        </div>
        <div class="button-container">
          <button type="submit" class="btn btn-primary btn-block">Sign up</button>
        </div>
      </form>
    </div>
  </div>
</div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>