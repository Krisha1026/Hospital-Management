<?php
session_start();


$patient_name = $_SESSION['patient'];

// Sample  records ............................
$appointments = [
    ["date" => "2025-02-25", "time" => "10:00 AM", "doctor" => "Dr. Krisha", "status" => "Confirmed"],
    ["date" => "2025-03-01", "time" => "02:00 PM", "doctor" => "Dr. Johnson", "status" => "Pending"]
];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments - Care Compass</title>
    <link rel="website icon" type="png" href="../images/Care Compass logo.png">
    <link rel="stylesheet" href="../css/styles.css">
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background-color: #f4f4f9; 
            margin: 0; 
            padding: 0;
            background-image: url("../images/emergency.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .container { 
            width: 80%; 
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

        .appointment { 
            margin-bottom: 20px; 
            padding: 10px; 
            border: 1px solid #ddd; 
            background: #fafafa; 
        }

        .appointment h3 { 
            color: #0056b3; 
        }

        .btn { 
            display: inline-block; 
            padding: 10px 15px; 
            background: #0056b3; 
            color: white; 
            text-decoration: none;
            border-radius: 5px; 
        }

        .btn:hover { 
            background: #007bff; 
        }
        
    </style>
</head>
<body>
    <div class="container">
        <h2>Appointments</h2>
        <div class="appointment">
            <h3>Upcoming Appointments</h3>
            <?php if (empty($appointments)) { ?>
                <p>No upcoming appointments.</p>
            <?php } else { ?>
                <ul>
                    <?php foreach ($appointments as $appointment) { ?>
                        <li>
                            <strong>Date:</strong> <?php echo $appointment['date']; ?>,
                            <strong>Time:</strong> <?php echo $appointment['time']; ?>,
                            <strong>Doctor:</strong> <?php echo $appointment['doctor']; ?>,
                            <strong>Status:</strong> <?php echo $appointment['status']; ?>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </div>
        <div class="appointment">
            <h3>Schedule a New Appointment</h3>
            <a href="appointments.php" class="btn">Book Now</a>
        </div>
        <a href="../other-pages/patient.html" class="btn">Back to Dashboard</a>
    </div>
</body>
</html>
