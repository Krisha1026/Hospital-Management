<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "care_compass"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error_message = ""; // Initialize error message variable

// Handle registration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; 
    $confirm_password = $_POST['confirm_password'];
    $role = $_POST['role'];
    $contact = $_POST['contact'];

    // Password match check
    if ($password !== $confirm_password) {
        $error_message = "Passwords do not match!";
    } else {
        // Hash the password before storing it
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert data into the database
        $sql = "INSERT INTO register (username,email, password, role, contact) VALUES ('$username', '$email','$hashed_password', '$role', '$contact')";

        if ($conn->query($sql) === TRUE) {
            // Redirect to login page with details
            header("Location: login.php?username=$username&role=$role");
            exit();
        } else {
            $error_message = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Care Compass</title>
    <link rel="icon" href="../images/Care Compass logo.png" type="image/png">
    <link rel="stylesheet" href="../styles/general.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            background-image: url(../images/general-medicine.jpg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
          
        }

        .container {
            width: 50%;
            margin: auto;
            padding: 20px;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin-top: 50px;
            
        }

        h1, h2, form p {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin: 10px 0 5px;
        }

        input, textarea, select, button {
            margin: 10px 0;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: rgb(10, 129, 129);
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: rgb(17, 187, 187);
        }

        .message {
            text-align: center;
            font-weight: bold;
            color: red;
            margin-top: 10px;
        }


        
        
    </style>

</head>
<body>

<div class="container" style="margin-bottom: 50px; margin-top: 50px;">
    <h1>Register - Care Compass Hospitals</h1>
     
    <?php if (!empty($error_message)) { echo "<p class='message'>$error_message</p>"; } ?>

    <form action="register.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="Enter your username" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter your Email Address" required>


        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>

        <label for="confirm_password">Re-Enter Your Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" placeholder="Re-Enter your password" required>

        <label for="role">Role:</label>
        <select id="role" name="role" required>
            <option value="" disabled selected>Select Your Role</option>
            <option value="admin">Admin</option>
            <option value="staff">Staff</option>
            <option value="patient">Patient</option>
        </select>

        <label for="contact">Contact Information:</label>
        <textarea id="contact" name="contact" rows="3" placeholder="Enter your address" required></textarea>

        <button type="submit">Register</button>
        <br>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </form>
</div>

<!-- footer section start -->
<footer>
    <div class="footer-container">
        <div class="footer-section about">
            <h3>Care Compass Hospitals</h3>
            <p>Care Compass Hospitals - Compassionate care, advanced treatments, and your well-being first. Stay updated on health tips and services!</p>
        </div>

        <div class="footer-section links">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="../index.html">Home</a></li>
                <li><a href="..#about">About Us</a></li>
                <li><a href="..#contact">Contact Us</a></li>
                <li><a href="..#services">Services</a></li>
                <li><a href="..#Facilities">Facilities</a></li>
                <li><a href="..#CareTeam">Care Team</a></li>
            </ul>
        </div>

        <div class="footer-section social">
            <h4>Connect with Us</h4>
            <ul>
                <li><a href="https://www.instagram.com" target="_blank">Instagram</a></li>
                <li><a href="https://twitter.com" target="_blank">Twitter</a></li>
                <li><a href="https://www.facebook.com" target="_blank">Facebook</a></li>
                <li><a href="https://www.youtube.com" target="_blank">YouTube</a></li>
            </ul>
        </div>

        <div class="footer-section contact">
            <h4>Contact Us</h4>
            <ul>
                <li><a href="..#about">About Us</a></li>
                <li><a href="..#contact">Contact Us</a></li>
                <li><p>+94 112 345 678</p></li>
            </ul>

            <h4>Location</h4>
            <p>Colombo, Kandy, Kurunegala</p>
        </div>
    </div>

    <div class="footer-bottom">
        <p>2025 Created By Krishanthini . All Rights Reserved.</p>
    </div>
</footer>

</body>
</html>
