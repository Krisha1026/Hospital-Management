<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Appointments - Care Compass</title>
    <link rel="website icon" type="png" href="../images/Care Compass logo.png">
    <link rel="stylesheet" href="../styles/panel.css">
    <link rel="stylesheet" href="../styles/general.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            background-image: url(../images/hospital.jpg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        
        .container {
            width: 80%;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .action-buttons {
            display: flex;
            gap: 10px;
        }
        .action-buttons button {
            padding: 5px 10px;
            border: none;
            cursor: pointer;
            border-radius: 3px;
        }
        .approve {
            background-color: #4CAF50;
            color: white;
        }
        .modify {
            background-color: #f39c12;
            color: white;
        }
        .delete {
            background-color: #e74c3c;
            color: white;
        }

        .back-button{
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .back-button:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>
    <!-- Navigation section  -->
    <nav class="navbar" style="background-color: rgb(18, 11, 78);">
        <div class="max-width">
            <div class="logo"><a href="index.html">Care Compass<span>...</span></a></div>
            <ul class="menu">
                <li><a href="../index.html" class="menu-btn">Home</a></li>
                <li><a href="..#about" class="menu-btn">About</a></li>
                <li><a href="..#services" class="menu-btn">Services</a></li>
                <li><a href="..#facilities" class="menu-btn">Facilities</a></li>
                <li><a href="..#CareTeam" class="menu-btn">Care Team</a></li>
                <li><a href="..#contact" class="menu-btn">Contact</a></li>
                <li><a href="../php/register.php" class="menu-btn">Register</a></li>
            </ul>
        </div>
    </nav>
    <br><br>

    <!-- Main -->

    <div class="container">
        
             <!-- Back button -->
        <button class="back-button" onclick="goBack()">Back</button>
        
        <h1>Manage Appointments</h1>
        <p>Approve or modify patient schedules.</p>

        <!-- Table to display appointments -->
        <table>
            <thead>
                <tr>
                    <th>Appointment ID</th>
                    <th>Patient Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example Appointment Data -->
                <tr>
                    <td>001</td>
                    <td>Harish</td>
                    <td>2025-01-25</td>
                    <td>10:00 AM</td>
                    <td>Pending</td>
                    <td class="action-buttons">
                        <button class="approve" onclick="approveAppointment(1)">Approve</button>
                        <button class="modify" onclick="modifyAppointment(1)">Modify</button>
                        <button class="delete" onclick="deleteAppointment(1)">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>002</td>
                    <td>Swetha</td>
                    <td>2025-01-26</td>
                    <td>02:00 PM</td>
                    <td>Approved</td>
                    <td class="action-buttons">
                        <button class="approve" onclick="approveAppointment(2)">Approve</button>
                        <button class="modify" onclick="modifyAppointment(2)">Modify</button>
                        <button class="delete" onclick="deleteAppointment(2)">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>003</td>
                    <td>Jane </td>
                    <td>2025-02-26</td>
                    <td>04:00 PM</td>
                    <td>Approved</td>
                    <td class="action-buttons">
                        <button class="approve" onclick="approveAppointment(3)">Approve</button>
                        <button class="modify" onclick="modifyAppointment(3)">Modify</button>
                        <button class="delete" onclick="deleteAppointment(3)">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>004</td>
                    <td>Geerthana</td>
                    <td>2025-02-27</td>
                    <td>10:00 AM</td>
                    <td>Approved</td>
                    <td class="action-buttons">
                        <button class="approve" onclick="approveAppointment(4)">Approve</button>
                        <button class="modify" onclick="modifyAppointment(4)">Modify</button>
                        <button class="delete" onclick="deleteAppointment(4)">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>005</td>
                    <td>Dhoni</td>
                    <td>2025-03-26</td>
                    <td>07:00 AM</td>
                    <td>Approved</td>
                    <td class="action-buttons">
                        <button class="approve" onclick="approveAppointment(5)">Approve</button>
                        <button class="modify" onclick="modifyAppointment(5)">Modify</button>
                        <button class="delete" onclick="deleteAppointment(5)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        // JavaScript functions for handling actions
        function approveAppointment(id) {
            alert(`Appointment ${id} approved.`);
            
        }

        function modifyAppointment(id) {
            const newDate = prompt("Enter new date (YYYY-MM-DD):");
            const newTime = prompt("Enter new time (HH:MM AM/PM):");
            if (newDate && newTime) {
                alert(`Appointment ${id} modified to ${newDate} at ${newTime}.`);
                
            }
        }

        function deleteAppointment(id) {
            if (confirm(`Are you sure you want to delete appointment ${id}?`)) {
                alert(`Appointment ${id} deleted.`);
                
            }
        }

        // Function to go back
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>