<?php

// Database connection
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

// Handle appointment booking
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_name = $_POST['name'];
    $email = $_POST['email'];
    $doctor = $_POST['doctor'];
    $date = $_POST['date'];
    


    // Insert appointment into the database
    $sql = "INSERT INTO appointments (patient_name, email, doctor, appointment_date)
            VALUES ('$patient_name', '$email', '$doctor', '$date')";


    if ($conn->query($sql) === TRUE) {
        // Redirect to payment page with details
        header("Location: pay_online.php?patient_name=$patient_name&email=$email&amount=5000"); // Example amount
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment- Care Compass</title>
    <link rel="website icon" type="png" href="../images/Care Compass logo.png">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../styles/general.css">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">



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
        input, textarea, button  {
            margin: 10px 0;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #0056b3;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #007bff;
        }

        
        .message {

            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            text-align: center;

            }

            .success {
            background-color: #d4edda;
            color: #155724;

            }

            .error {
            background-color: #f8d7da;
            color: #721c24;

            }

    </style>
    
</head>

<body>
    
     <!-- navigation section  -->
     <nav class="navbar" style="background-color:  rgb(18, 11, 78);">
        <div class="max-width">
            <div class="logo"><a href="index.html">Care Compass<span>...</span></a></div>
            <ul class="menu">
                <li><a href="../index.html" class="menu-btn">Home</a></li>
                <li><a href="..#about" class="menu-btn">About</a></li>
                <li><a href="..#services" class="menu-btn">Services</a></li>
                <li><a href="..#Facilities" class="menu-btn">Facilities</a></li>
                <li><a href="..#CareTeam" class="menu-btn">Care Team</a></li>
                <li><a href="..#contact" class="menu-btn">Contact</a></li>
                <li><a href="..#register" class="menu-btn">Register</a></li>
            </ul>
        </div>
    </nav>
    <br><br>


    <main>
    <div class="container" style="margin-bottom: 50px; margin-top: 150px;">
        <h1>Book an Appointment</h1>
        <br>
        
          
            <!-- Appointment Form -->
             

            <form action="appointments.php" method="POST">

                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

            
                <label for="doctor">Doctor:</label>
                <select id="doctor" name="doctor" required>

                    <option value="1">Dr. Smith - Cardiologist</option>
                    <option value="2">Dr. Jane - Pediatrician</option>
                    <option value="3">Dr. Dilshan - Dermatologist</option>
                    <option value="4">Dr. Madushani - Orthopedic Surgeon</option>
                    <option value="5">Dr. Harish - Neurologist</option>
                    <option value="6">Dr. Abinesh - General Practitioner</option>
                    <option value="7">Dr. Wilson - Oncologist</option>
                    <option value="8">Dr. Duwaraga - Psychiatrist</option>
                    <option value="9">Dr. Karthik - Endocrinologist</option>
                    <option value="10">Dr. Harry - Gastroenterologist</option>
                    <option value="11">Dr. Roshan - Rheumatologist</option>
                    <option value="12">Dr. Nisha - Pulmonologist</option>
                    <option value="13">Dr. Rushmika - Nephrologist</option>
                    <option value="14">Dr. Shaan - Urologist</option>
                    <option value="15">Dr. Vinoth - Ophthalmologist</option>
                    <option value="16">Dr. Evlin - ENT Specialist</option>

                </select><br>

                

                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required>

                

                <form action="pay_online.php" method="GET">
                    <button type="submit">Book Now</button>
                 </form>

                <br>

            </form>

        </div>

    </main>

    <br><br>


        <!-- Footer Section -->
        <footer style="background-color: rgb(17, 13, 54);">
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
                    <li><a href="../#about">About Us</a></li>
                    <li><a href="../#contact">Contact Us</a></li>
                    <li><a href="../#services">Services</a></li>
                    <li><a href="../#Facilities">Facilities</a></li>
                    <li><a href="../#CareTeam">Care Team</a></li>
                    <li><a href="../#reviews">Reviews</a></li>
                </ul>
            </div>

            <!-- Social Media Links -->
            <div class="footer-section social">
                <h4>Connect with Us</h4>
                <ul>
                    <li><a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i> Instagram</a></li>
                    <li><a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i> Twitter</a></li>
                    <li><a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook"></i> Facebook</a></li>
                    <li><a href="https://www.youtube.com" target="_blank"><i class="fab fa-youtube"></i> YouTube</a></li>
                </ul><br>

                <h4>Read Blogs</h4>
                <ul><li><a href="../other-pages/blog.html">Blogs</a></li></ul>
            </div>

            <!-- Contact Info -->
            <div class="footer-section contact">
                <h4>Care Compass</h4>
                <ul>
                    <li><a href="../#about">About Us</a></li>
                    <li><a href="../#contact">Contact Us</a></li>
                    <li><p><i class="fas fa-phone"></i> +94 112 345 678</p></li>
                </ul>
                <br>
                <h4>Location</h4>
                <p><i class="fas fa-map-marker-alt"></i> Colombo, Kandy, Kurunegala</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>2025 Created By Krishanthini. All Rights Reserved.</p>
        </div>
    </footer>


</body>
</html>