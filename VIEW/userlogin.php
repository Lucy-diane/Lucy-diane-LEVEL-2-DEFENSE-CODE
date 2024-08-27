<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1.5s ease-in-out;
            width: 400px; 
        }
        
        /* Image Animation */
        .cg img {
            animation: zoomIn 1.5s ease-in-out;
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
       /*.text-center{
        border: 10px;
        padding: 40px;
        border-radius: 10px;
       }*/

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
    
      </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="cg">
            <div class="text-center mb-4">
                <img src="22.jpeg" alt="Picture">
            </div>
            <form class="text-center">
                <h1>Login</h1>
                <label for="Name">Name:</label>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Name">
                </div>
                <label for="Password">Password:</label>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
                <div class="my-2">OR</div>
                <button type="button" class="btn btn-primary btn-block"><a href="userregistration.php">Register</button>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
