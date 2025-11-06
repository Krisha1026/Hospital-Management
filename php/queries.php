<?php
session_start();


$host = 'localhost'; 
$dbname = 'care_compass'; 
$username = 'root'; 
$password = ''; 


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

// Function to execute a query with parameters
function executeQuery($query, $params = []) {
    $conn = connectToDatabase();

    try {
        $stmt = $conn->prepare($query);
        $stmt->execute($params);
        return $stmt;
    } catch (PDOException $e) {
        die("Query execution failed: " . $e->getMessage());
    }
}

// Function to insert data into the database
function insertData($table, $data) {
    $columns = implode(", ", array_keys($data));
    $values = ":" . implode(", :", array_keys($data));
    $query = "INSERT INTO $table ($columns) VALUES ($values)";

    executeQuery($query, $data);
    return true;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $query_type = trim($_POST['query_type']);
    $message = trim($_POST['message']);

    // Validate input
    if (empty($name) || empty($email) || empty($query_type) || empty($message)) {
        $error_message = "All fields are required!";
    } else {
        // Prepare data for insertion
        $data = [
            'name' => $name,
            'email' => $email,
            'query_type' => $query_type,
            'message' => $message
        ];

        // Insert data into the database
        if (insertData('queries', $data)) {
            $success_message = "Your query has been submitted successfully!";
        } else {
            $error_message = "Failed to submit your query. Please try again.";
        }
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Query - Care Compass Hospitals</title>
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
        input, select, textarea {
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
        .error {
            text-align: center;
            font-weight: bold;
            color: red;
            margin-top: 10px;
        }

        .btn { 
            display: inline-block; 
            padding: 10px 15px; 
            background: #0056b3; 
            color: white; 
            text-decoration: none;
            border-radius: 5px; 
            margin-top: 15px;
            text-align:center;
        }

        .btn:hover { 
            background: #007bff; 
        }

    </style>
</head>
<body>

    <div class="container">
        <h2>Submit Your Query</h2>

        <?php if (isset($success_message)) { echo "<p class='message'>$success_message</p>"; } ?>
        <?php if (isset($error_message)) { echo "<p class='error'>$error_message</p>"; } ?>

        <form action="" method="POST">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="query_type">Query Type:</label>
            <select id="query_type" name="query_type" required>
                <option value="medical_service">Medical Service</option>
                <option value="medical_test">Medical Test</option>
            </select>

            <label for="message">Your Query:</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <button type="submit">Submit</button>

            
           
        </form>
        <a href="../other-pages/patient.html" class="btn">Back to Dashboard</a>

        
    </div>

    

</body>
</html>

