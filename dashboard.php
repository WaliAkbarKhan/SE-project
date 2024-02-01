<?php
session_start(); // Start the session at the very top of dashboard.php
// ... the rest of your PHP code
if (isset($_SESSION['user_name'])) {
    $userName = $_SESSION['user_name'];
} else {
    $userName = "Guest"; // Or handle the absence of the user name as you see fit
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .details-section {
            display: none;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <nav class="sidebar">
            
            <div class="sidebar-header">
                <h2>User Dashboard</h2>
                
            </div>
            <ul class="nav-links">
                <li><a href="#homeSection" id="homeLink">Home</a></li>
                <li><a href="#personalDetails" id="personalDetailsLink">Personal Details</a></li>
                <li><a href="#educationalDetails">Educational Details</a></li>
                <li><a href="#expertiseDetails">Expertise Details</a></li>
                <li><a href="#nccsemploymentDetails">NCCS Employment Details</a></li>
                <li><a href="#otheremploymentDetails">Other Employment Details</a></li>

                
            </ul>
        </nav>
        <section class="main-content">
            <div class="logout-container">
                <button id="logoutBtn" onclick="handleLogout()">Logout</button>
                
            </div>
            <div id="homeSection" class="details-section">
                <h2>Welcome to Your Dashboard</h2>
                <p id="welcomeMessage">Hello, <span id="employeeName"><?php echo htmlspecialchars($userName); ?></span>!</p>
            </div>
        
    

            <div id="personalDetails" class="details-section">
                <h3>Personal Details</h3>
                <div id="recordsContainer"></div>

                <button id="addPersonalBtn" type="button" onclick="prepareFormForAdd()">Add Record</button>
                <button id="updatePersonalBtn" type="button" onclick="prepareFormForUpdate()">Update Record</button>

                <div id="personalForm" class="form-popup" style="display: none;">
                    <form id="personal_Form" class="form-container" method="post" onsubmit="submitForm(event, 'personal_Form')">
                        <h4>Add Personal Details:</h4>
                        <input type="text" name="name" placeholder="Full Name" required>
                        <input type="number" name="age" placeholder="Age" required>
                        <input type="date" name="dob" placeholder="Date of Birth" required>
                        <input type="email" name="email" placeholder="Email" required>
                        <button type="submit">Submit</button>
                        <button type="button" onclick="toggleForm('personalForm')">Close</button>
                    </form>
                </div>
            </div>


            
            <div id="educationalDetails" class="details-section">
                <h3>Educational Details</h3>
                <div id="educationalRecordsContainer"></div>
                <button id="addEducationalBtn" type = "button" onclick="toggleForm('educationalForm')">Add Record</button>
                <button id="updateEducationalBtn" type="button" onclick="prepareEducationalFormForUpdate()">Update Record</button>
                <div id="educationalForm" class="form-popup" style="display: none;">
                    <form id="educational_Form" class="form-container" method="post" onsubmit="submitEducationalForm(event, 'educational_Form', 'educationalDetails')">
                        <h4>Add Educational Details:</h4>
                        <div class="form-row">
                            <div class="form-item">
                                <label for="qualification">Qualification</label>
                                <select name="qualification" id="qualification" class="form-select">
                                    <option value="BS">BS</option>
                                    <option value="MS">MS</option>
                                    <option value="PHD">PhD</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-item">
                                <label for="institute">Institute</label><br>
                                <input type="text" name="institute" id="institute" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-item">
                                <label for="department">Department</label><br>
                                <input type="text" name="department" id="department" required>
                            </div>
                        </div>
                        
                        <button type="submit">Submit</button>
                        <button type="button" onclick="toggleForm('educationalForm')">Close</button>
                    </form>
                </div>
                
            </div>
            
            <div id="expertiseDetails" class="details-section">
                <h3>Expertise Details</h3>
                <button>Add Record</button>
                
            </div>

            <div id="nccsEmploymentDetails" class="details-section">
                <h3>NCCS Employment Details</h3>
                <button>Add Record</button>
                
            </div>

            <div id="otherEmploymentDetails" class="details-section">
                <h3>Other Employment Details</h3>
                <button>Add Record</button>
                
            </div>

        </section>
    </div>

    

    <script src="script.js"></script>
</body>
</html>
