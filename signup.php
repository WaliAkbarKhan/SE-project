<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
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
        /* #signupFormContainer {
            max-height: 30px;
        } */
        .signup-form {
            background-color: rgba(0, 0, 0, 0.6); /*Semi-transparent dark background */
            border-radius: 10px;
            padding: 30px;
            box-shadow: 15px 15px 20px rgba(0, 0, 0, 0.5);
            color: #ffffff; /* Form text color */
            margin: auto; /* Center the form */
            margin-top: 50px; /* Adjust the top margin as needed */
        }

        .signup-form h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #ffffff; /* Heading color */
        }
        .form-group {
            margin-bottom: 10px; /* Reduced from whatever it currently is */
        } 
        .form-group label {
            /* font-weight: bold; */
            color: #ffffff; /* Label color */
        }

        .form-control {
            border-radius: 5px;
        }

        .submit-btn {
            margin-top: 40px;
            font-size: 20px;
            border-radius: 5px;
        }
        .signin-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #ffffff; /* Link color */
        }
        #error {
            display: flex;
            flex-direction: column;
            padding-top: 50px;
            align-items: center; /* This will center the child elements (form-container and error-message) */
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
            max-width: 600px; /* same as form-container width */
            text-align: center;
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
    <div class="container" id="signupFormContainer">
        <div class="row justify-content-center"  >
            <div class="col-md-6" >
                <form class="signup-form" action="signupcheck.php" method="post">
                    <h2>Sign Up</h2>
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>


                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>

                    <div class="form-group">
                        <label for="lab">Choose Lab</label>
                        <select class="form-control" id="lab" name="lab" required>
                            <option value="Security Testing">Security Testing</option>
                            <option value="Secured IoT Devices">Secured IoT Devices</option>
                            <option value="Blockchain Security">Blockchain Security</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="password" name="password" required
                            pattern="(?=.*\d)(?=.*[A-Z]).{6,10}"
                            title="Password must be between 6 to 10 characters, include at least one uppercase letter and one number."
                            maxlength="10">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('password')">
                                    <i id="password-eye" class="fa fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>                         
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('confirm_password')">
                                    <i id="confirm-password-eye" class="fa fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block submit-btn">Sign Up</button>
                    <a href="signin.php" class="signin-link">Already have an account? Sign In</a>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('signupForm').addEventListener('submit', function (event) {
            var password = document.getElementById('password').value;
            var errorMessage = '';
            if (!/(?=.*\d)(?=.*[A-Z]).{6,10}/.test(password)) {
                errorMessage += 'Password must be between 6 to 10 characters and include at least one uppercase letter and one number.\n';
            }
            // Add any other checks here
    
            if (errorMessage.length > 0) {
                event.preventDefault(); // Stop form submission
                document.getElementById('errorContainer').innerText = errorMessage;
            }
        });
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

    <!-- Link to Bootstrap and jQuery JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

