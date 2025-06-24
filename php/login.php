<?php
session_start();

// Database connection..............
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "care_compass"; 

// Create connection................
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Insert login attempt into user_login table
    $login_time = date("Y-m-d H:i:s");
    $sql = "INSERT INTO user_login (username, login_time, role) VALUES ('$username', '$login_time', '$role')";


    if ($conn->query($sql) === TRUE) {
        // Dummy user authentication ..............................
        $valid_users = [
            "admin" => ["username" => "admin", "password" => "krisha123"],
            "staff" => ["username" => "staff", "password" => "krisha123"],
            "patient" => ["username" => "patient", "password" => "krisha123"]
        ];


        if (isset($valid_users[$role]) && $valid_users[$role]["username"] === $username && $valid_users[$role]["password"] === $password) {
            $_SESSION['success_message'] = "Login Successful! Redirecting to $role dashboard...";
            $_SESSION['redirect_url'] = "../other-pages/$role.html"; 
            $_SESSION['role'] = $role; 
            $_SESSION['username'] = $username; 


            // Set patient-specific session variable 
            if ($role === "patient") {
                $_SESSION['patient'] = $username; 
            }
        } else {
            $_SESSION['error_message'] = "Invalid Username or Password. Please try again!";
        }
    } else {
        $_SESSION['error_message'] = "Error recording login attempt: " . $conn->error;
    }

    header("Location: login.php");
    exit();
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="website icon" type="png" href="../images/Care Compass logo.png">
    <link rel="stylesheet" href="../css/styles.css">
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
        h2 {
            text-align: center;
            color: #333;
        }

        h1, form p{
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }
        input, textarea, button {
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
            color: green;
            margin-top: 10px;
        }

        .success { color: green; }
        .error { color: red; }

        
    </style>

    <script>
        // Redirect after showing success message
        function redirectAfterDelay(url) {
            setTimeout(function () {
                window.location.href = url;
            }, 2000); // Redirect after 2 seconds
        }
    </script>

</head>
<body>
<div class="container" style="margin-bottom: 50px; margin-top: 150px;">
<h1>Login...</h1>
<br>


 <?php
    if (isset($_SESSION['success_message'])) {
        echo "<p class='message success'>{$_SESSION['success_message']}</p>";
        echo "<script>redirectAfterDelay('{$_SESSION['redirect_url']}');</script>"; 
        unset($_SESSION['success_message']);
        unset($_SESSION['redirect_url']); 
    }
    if (isset($_SESSION['error_message'])) {
        echo "<p class='message error'>{$_SESSION['error_message']}</p>";
        unset($_SESSION['error_message']);
    }
    ?>

        <form action="login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter your  username" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your Password" required>
            
            <label for="role">Role:</label><br>
            <select id="role" name="role" required>
                <option value="" disabled selected>Select Your Role</option>
                <option value="admin">Admin</option>
                <option value="staff">Staff</option>
                <option value="patient">Patient</option>
            </select><br>
            
            <button type="submit">Login</button>
            <br>
            <p>If you Don't have an Account : <a href="register.php">Register</a></p> 
        </form>
    </div><br>
    <br>
    <br>


    <!-- footer section  -->
<footer >

<div class="footer-container">
    <!-- About Section -->
    <div class="footer-section about">
        <h3>Care Compass Hospitals</h3>
        <p>Care Compass Hospitals - Compassionate care, advanced treatments, and your well-being first. Stay updated on health tips and services!</p>
    </div>

    <!-- Quick Links -->
    <div class="footer-section links">
        <h4>Quick Links</h4>
        <ul>
            <li><a href="../index.html">Home</a></li>
            <li><a href="..#about">About Us</a></li>
            <li><a href="..#contact">Contact Us</a></li>
            <li><a href="..#services">Services</a></li>
            <li><a href="..#Facilities">Facilities</a></li>
            <li><a href="..#CareTeam">Care team</a></li>
        </ul>
    </div>

    <!-- Social Media Links -->
    <div class="footer-section social">
        <h4>Connect with Us</h4>
        <div class="social-links"></div>
        <ul>
            <li><a href="https://www.instagram.com" target="_blank">Instagram</a></li>
            <li><a href="https://twitter.com" target="_blank">Twitter</a></li>
            <li><a href="https://www.facebook.com" target="_blank">Facebook</a></li>
            <li><a href="https://www.youtube.com" target="_blank">YouTube</a></li>
        </ul>
          
        
    </div>

    <!-- Contact Info -->
    <div class="footer-section contact">
        <h4>Care Compass.......</h4>
        <ul>
            <li><a href="..#about" >About Us</a></li>
            <li><a href="..#contact" >Contact Us</a></li>
            <li><p>+94 112 345 678</p></li>
        </ul>
        <br>

        <h4>Location</h4>
        <p>Colombo,Kandy,Kurunagala</p>
        

        
    </div>

    
</div>

<div class="footer-bottom">
    <p>2025 Created By Krishanthini. All Rights Reserved.</p>
</div>