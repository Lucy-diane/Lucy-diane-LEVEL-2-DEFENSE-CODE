<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="ul.css" rel="stylesheet">
    <style>
        .container {
            animation: fadeInScale 1s ease-in-out;
        }
        @keyframes fadeInScale {
            0% {
                opacity: 0;
                transform: scale(0.8);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        /* Card Styling */
        .cg {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1.5s ease-in-out;
            width: 100%;
            max-width: 400px; /* Ensure the form doesn't get too wide */
        }
        
        /* Image Animation */
        .cg img {
            animation: zoomIn 1.5s ease-in-out;
            max-width: 100%; /* Make image responsive */
            height: auto;
        }
        @keyframes zoomIn {
            0% {
                opacity: 0;
                transform: scale(0.5);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        /* Heading Animation */
        h1 {
            animation: slideInFromTop 1s ease-in-out;
        }
        @keyframes slideInFromTop {
            0% {
                opacity: 0;
                transform: translateY(-50px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .btn-primary {
            transition: background-color 0.3s ease, transform 0.2s ease-in-out;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
        .btn-primary:active {
            transform: scale(0.95);
        }
        .btn-secondary:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
        .btn-secondary:active {
            transform: scale(0.95);
        }
    
      </style>
</head>
<body>
<div class="background-image">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="cg"> 
            <div class="text-center mb-4">
                <img src="22.jpeg" alt="Picture">
            </div>  
            <form class="text-center">
                <h1>Registration</h1>
                <div class="form-group">
                    <label for="Name">Username:</label>
                    <input type="text" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="Surname">Surname:</label>
                    <input type="text" class="form-control" placeholder="Surname">
                </div>
                <div class="form-group">
                    <label for="Email">Email:</label>
                    <input type="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="Password">Password:</label>
                    <input type="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="Confirm Password">Confirm Password:</label>
                    <input type="password" class="form-control" placeholder="Confirm password">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Register</button>
                <div class="my-2">OR</div>
                <button type="button" class="btn btn-primary btn-block"><a href="userlogin.php">Log in</button>
            </form>
        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
