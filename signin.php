<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In Form</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Your custom CSS -->
    <style>
        body {
            background: url('img1.jpg') no-repeat center center fixed;
            background-size: cover; /* or 'contain' for different behavior */
            background-position: 60% 50%; /* Adjust the values as needed */
            color: #ffffff; /* Text color */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .signin-form {
            background-color: rgba(0, 0, 0, 0.6); /* Semi-transparent dark background */
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.5);
            color: #ffffff; /* Form text color */
            width: 400px; /* Adjust the width as needed */
            margin: auto; /* Center the form */
            margin-top: 100px; /* Adjust the top margin as needed */
        }

        .signin-form h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #ffffff; /* Heading color */
        }

        .form-group label {
            font-weight: bold;
            color: #ffffff; /* Label color */
        }

        .form-control {
            border-radius: 5px;
        }

        .submit-btn {
            margin-top: 20px;
            /* //font-size: 20px; */
            border-radius: 5px;
        }

        .signup-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #ffffff; /* Link color */
        }
        .error-message {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            padding: .75rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: .25rem;
            width: 100%;
            max-width: 400px; /* same as form-container width */
            text-align: center;
        }
        #error {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center; /* This will center the child elements (form-container and error-message) */
        }
    </style>
</head>
<body>
    <div id="error">
    <?php if(isset($_GET['error'])): ?>
            <div class="error-message">
                <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
    <?php endif; ?>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form class="signin-form" action="signincheck.php" method="post">
                    <h2>Sign In</h2>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="login_username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <!-- <input type="password" class="form-control" id="login_password" name="password" required> -->
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password')">
                                    <i id="password-eye" class="fa fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary btn-block submit-btn">Sign In</button>
                    <a href="signup.php" class="signup-link">Don't have an account? Sign Up</a>
                </form>
            </div>
        </div>
    </div>

    <!-- Link to Bootstrap and jQuery JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Check if there is an error message and display the error div
        var errorMessage = "<?php echo isset($_GET['error']) ? $_GET['error'] : ''; ?>";
        if(errorMessage) {
            document.querySelector('.error-message').style.display = 'block';
        }

        function togglePassword(fieldId) {
            var field = document.getElementById(fieldId);
            var eyeIcon = document.getElementById(fieldId + '-eye');
            if (field.type === "password") {
                field.type = "text";
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                field.type = "password";
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
