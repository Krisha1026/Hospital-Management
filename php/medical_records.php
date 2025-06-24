<?php
session_start();


$patient_name = $_SESSION['patient'];

// Sample medical records ............................
$medical_history = [
    "Diabetes Type 2 - Diagnosed in 2024",
    "Hypertension - Diagnosed in 2023",
    "Allergy: Penicillin"
];

$lab_results = [
    ["date" => "2025-02-10", "test" => "Blood Sugar", "result" => "Normal"],
    ["date" => "2025-01-15", "test" => "Cholesterol", "result" => "High"]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Records - Care Compass</title>
    <link rel="website icon" type="png" href="../images/Care Compass logo.png">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../styles/general.css">
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

       
        .record {
            margin-bottom: 20px;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .record h3 {
            color: #0056b3;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .table, .table th, .table td {
            border: 1px solid #ddd;
        }

        .table th, .table td {
            padding: 8px;
            text-align: left;
        }
        
        .table th {
            background-color: #0056b3;
            color: white;
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
        

        <h2>Medical Records - <?php echo $patient_name; ?></h2>
        
        <div class="record">
            <h3>Personal Medical History</h3>
            <br>
            <ul>
                <?php foreach ($medical_history as $history) { ?>
                    <li><?php echo htmlspecialchars($history); ?></li>
                <?php } ?>
            </ul>
        </div>

        <div class="record">
            <h3>Lab Results</h3>
            <table class="table">
                <tr>
                    <th>Date</th>
                    <th>Test</th>
                    <th>Result</th>
                </tr>
                <?php foreach ($lab_results as $result) { ?>
                    <tr>
                        <td><?php echo htmlspecialchars($result['date']); ?></td>
                        <td><?php echo htmlspecialchars($result['test']); ?></td>
                        <td><?php echo htmlspecialchars($result['result']); ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        
        <a href="../other-pages/patient.html" class="btn">Back to Dashboard</a>
    </div>

    
</body>
</html>
