<?php
session_start();

// Database connection details
$host = 'localhost'; 
$dbname = 'care_compass'; 
$username = 'root'; 
$password = ''; 


// Function to establish a database connection
function connectToDatabase() {
    global $host, $dbname, $username, $password;

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
}

// Function to cancel an appointment
function cancelAppointment($appointment_id) {
    $conn = connectToDatabase();

    
    // Check if appointment exists
    $stmt = $conn->prepare("SELECT * FROM appointments WHERE id = ?");
    $stmt->execute([$appointment_id]);
    
    if ($stmt->rowCount() > 0) {
        // Delete the appointment
        $deleteStmt = $conn->prepare("DELETE FROM appointments WHERE id = ?");
        $deleteStmt->execute([$appointment_id]);
        return "Appointment successfully cancelled.";
    } else {
        return "Appointment not found.";
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $appointment_id = trim($_POST['appointment_id']);

    if (empty($appointment_id)) {
        $error_message = "Please enter your Appointment ID.";
    } else {
        $result_message = cancelAppointment($appointment_id);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancel Appointment - Care Compass Hospitals</title>
    <link rel="website icon" type="png" href="../images/Care Compass logo.png">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            background-image: url("../images/emergency.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .container {
            width: 50%;
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
        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
            margin-top: 15px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background: #c82333;
        }
        .message {
            text-align: center;
            font-weight: bold;
            color: green;
            margin-top: 10px;
        }
        .error {
            text-align: center;
            font-weight: bold;
            color: red;
            margin-top: 10px;
        }
        .btn { 
            display: inline-block; 
            padding: 10px 15px; 
            background: #007bff; 
            color: white; 
            text-decoration: none;
            border-radius: 5px; 
            text-align: center;
            margin-top: 15px;
        }
        .btn:hover { 
            background: #0056b3; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Cancel Your Appointment</h2>

        <?php if (isset($result_message)) { echo "<p class='message'>$result_message</p>"; } ?>
        <?php if (isset($error_message)) { echo "<p class='error'>$error_message</p>"; } ?>

        <form action="" method="POST">
            <label for="appointment_id">Appointment ID:</label>
            <input type="text" id="appointment_id" name="appointment_id" required>
            <button type="submit">Cancel Appointment</button>
        </form>

        <a href="../other-pages/patient.html" class="btn">Back to Dashboard</a>
    </div>
</body>
</html>
