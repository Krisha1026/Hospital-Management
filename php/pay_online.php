<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "care_compass"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_name = $_POST['patient_name'];
    $email = $_POST['email'];
    $service_type = $_POST['service_type'];
    $amount = $_POST['amount'];
    $payment_method = $_POST['payment_method'];


    // Insert payment into the database
    $sql = "INSERT INTO payments (patient_name, email, service_type, amount, payment_method)
            VALUES ('$patient_name', '$email', '$service_type', $amount, '$payment_method')";

    if ($conn->query($sql) === TRUE) {
        $success_message = "Payment of $amount LKR successfully received from $patient_name via $payment_method!";
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
    <title>Pay Online - Care Compass Hospitals</title>
    <link rel="website icon" type="png" href="../images/Care Compass logo.png">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../styles/general.css">
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
            width: 40%;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0px 0px 10px 0px #aaa;
            border-radius: 5px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            font-weight: bold;
            margin-top: 10px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #0056b3;
            color: white;
            border: none;
            border-radius: 5px;
            margin-top: 15px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background: #007bff;
        }

        .message {
            text-align: center;
            font-weight: bold;
            color: green;
            margin-top: 10px;
        }



        .back-button{
            width: 10%;
        }

    </style>
</head>
<body>


 <!-- Back button -->
  <a href="../index.html">
    <button class="back-button" onclick="goBack()">Back to Home</button>
  </a>
 

    <div class="container">
        <h2>Make a Payment</h2>

        <?php if (isset($success_message)) { echo "<p class='message'>$success_message</p>"; } ?>

        <form action="" method="POST">
            <label for="patient_name">Patient Name:</label>
            <input type="text" id="patient_name" name="patient_name" placeholder="Enter your full name" required>

            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email address"  required>

            <label for="service_type">Service Type:</label>
            <select id="service_type" name="service_type" required>
                <option value="" disabled selected>Select the service type</option>
                <!-- Lab & Medical Tests -->
                <optgroup label="Lab & Medical Tests">
                    <option value="General Medicine Package">General Medicine Package - 4500 LKR</option>
                    <option value="Microbiology Package">Microbiology Package - 5000 LKR</option>
                    <option value="Radiology Package">Radiology Package - 5000 LKR</option>
                    <option value="Genetic Testing Package">Genetic Testing Package - 7000 LKR</option>
                    <option value="Infectious Disease Testing Package">Infectious Disease Testing Package - 5000 LKR</option>
                </optgroup>
                <!-- Medical Treatments -->
                <optgroup label="Medical Treatments">
                    <option value="General Medicine Package">General Medicine Package - 4000 LKR</option>
                    <option value="Cardiology Package">Cardiology Package - 5000 LKR</option>
                    <option value="Pediatrics Package">Pediatrics Package - 3000 LKR</option>
                    <option value="Orthopedics Package">Orthopedics Package - 6000 LKR</option>
                    <option value="Neurology Package">Neurology Package - 7000 LKR</option>
                    <option value="Minimally Invasive Surgery Package">Minimally Invasive Surgery Package - 8000 LKR</option>
                    <option value="Organ Transplants Package">Organ Transplants Package - 15000 LKR</option>
                    <option value="Oncology Surgery Package">Oncology Surgery Package - 12000 LKR</option>
                    <option value="Spine Surgery Package">Spine Surgery Package - 10000 LKR</option>
                </optgroup>
                <!-- Specialty Services -->
                <optgroup label="Specialty Services">
                    <option value="Oncology Package">Oncology Package - 12000 LKR</option>
                    <option value="Endocrinology Package">Endocrinology Package - 4000 LKR</option>
                    <option value="Gastroenterology Package">Gastroenterology Package - 6000 LKR</option>
                    <option value="Dermatology Package">Dermatology Package - 7000 LKR</option>
                    <option value="Nephrology Package">Nephrology Package - 8000 LKR</option>
                    <option value="Rheumatology Package">Rheumatology Package - 4500 LKR</option>
                    <option value="ENT Package">ENT Package - 7500 LKR</option>
                    <option value="Pulmonology Package">Pulmonology Package - 5500 LKR</option>
                </optgroup>
            </select>

            <label for="amount">Amount (LKR):</label>
            <input type="number" id="amount" name="amount"  placeholder="Enter the amount" required>

            <label for="payment_method">Payment Method:</label>
            <select id="payment_method" name="payment_method" required>
                <option value="" disabled selected>Select a payment method</option>
                <option value="Credit Card">Credit Card</option>
                <option value="Debit Card">Debit Card</option>
                <option value="Bank Transfer">Bank Transfer</option>
            </select>

            <button type="submit">Proceed to Pay</button>
        </form>
    </div>




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
            <p>2025 Created By KRISHANTHINI . All Rights Reserved.</p>
        </div>
    </footer>


<script>
    // Function to go back
    function goBack() {
            window.history.back();
        }
</script>

</body>
</html>

