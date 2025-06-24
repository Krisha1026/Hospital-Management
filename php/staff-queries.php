<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respond to Queries - Care Compass</title>
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
        .respond {
            background-color: #4CAF50;
            color: white;
        }
        .delete {
            background-color: #e74c3c;
            color: white;
        }
        .query-details {
            margin-top: 20px;
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
        }
        .query-details h3 {
            margin-top: 0;
        }
        .response-form {
            margin-top: 20px;
        }
        .response-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }
        .response-form button {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 3px;
        }

        .back-button {
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
    <!-- Navigation section -->
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

        <h1>Respond to Queries</h1>
        <p>Handle patient inquiries.</p>

        <!-- Table to display queries -->
        <table>
            <thead>
                <tr>
                    <th>Query ID</th>
                    <th>Patient Name</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example Query Data -->
                <tr data-id="1">
                    <td>001</td>
                    <td>Krisha</td>
                    <td>2025-02-25</td>
                    <td>Pending</td>
                    <td class="action-buttons">
                        <button class="respond" onclick="viewQuery(1)">Respond</button>
                        <button class="delete" onclick="deleteQuery(1)">Delete</button>
                    </td>
                </tr>
                <tr data-id="2">
                    <td>002</td>
                    <td>Smith</td>
                    <td>2025-01-26</td>
                    <td>Responded</td>
                    <td class="action-buttons">
                        <button class="respond" onclick="viewQuery(2)">Respond</button>
                        <button class="delete" onclick="deleteQuery(2)">Delete</button>
                    </td>
                </tr>
                <tr data-id="3">
                    <td>003</td>
                    <td>Srikanth</td>
                    <td>2025-01-25</td>
                    <td>Responded</td>
                    <td class="action-buttons">
                        <button class="respond" onclick="viewQuery(3)">Respond</button>
                        <button class="delete" onclick="deleteQuery(3)">Delete</button>
                    </td>
                </tr>
                <tr data-id="4">
                    <td>004</td>
                    <td>Ram</td>
                    <td>2025-01-24</td>
                    <td>Responded</td>
                    <td class="action-buttons">
                        <button class="respond" onclick="viewQuery(4)">Respond</button>
                        <button class="delete" onclick="deleteQuery(4)">Delete</button>
                    </td>
                </tr>
                <tr data-id="5">
                    <td>005</td>
                    <td>Lora</td>
                    <td>2025-01-20</td>
                    <td>Responded</td>
                    <td class="action-buttons">
                        <button class="respond" onclick="viewQuery(5)">Respond</button>
                        <button class="delete" onclick="deleteQuery(5)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>



        <!-- Query Details Section -->
        <div id="queryDetails" class="query-details" style="display: none;">
            <h3>Query Details</h3>
            <p><strong>Patient Name:</strong> <span id="queryPatientName"></span></p>
            <p><strong>Date:</strong> <span id="queryDate"></span></p>
            <p><strong>Query:</strong> <span id="queryText"></span></p>
        </div>

        <!-- Response Form -->
        <div id="responseForm" class="response-form" style="display: none;">
            <h3>Respond to Query</h3>
            <form onsubmit="handleResponse(event)">
                <textarea id="responseText" rows="5" placeholder="Enter your response..."></textarea>
                <button type="submit">Submit Response</button>
            </form>
        </div>
    </div>

    <script>
        // JavaScript functions for handling actions
        function viewQuery(id) {

            // Example query data .......................................

            const queryData = {
                1: { patientName: "Krisha", date: "2025-02-25", query: "What are the visiting hours?" },
                2: { patientName: "Smith", date: "2025-01-26", query: "Can I reschedule my appointment?" },
                3: { patientName: "Srikanth", date: "2025-01-25", query: "What services do you offer?" },
                4: { patientName: "Ram", date: "2025-01-24", query: "How do I book a consultation?" },
                5: { patientName: "Lora", date: "2025-01-20", query: "Do you provide emergency services?" },
            };

            // Check if the query ID exists in the data
            if (queryData[id]) {
                // Display query details
                document.getElementById('queryPatientName').textContent = queryData[id].patientName;
                document.getElementById('queryDate').textContent = queryData[id].date;
                document.getElementById('queryText').textContent = queryData[id].query;
                document.getElementById('queryDetails').style.display = 'block';

                // Show response form
                document.getElementById('responseForm').style.display = 'block';
            } else {
                alert("Query not found.");
            }
        }

        function deleteQuery(id) {
            if (confirm(`Are you sure you want to delete query ${id}?`)) {
                alert(`Query ${id} deleted.`);

                // Optionally, remove the row from the table
                const row = document.querySelector(`tr[data-id="${id}"]`);
                if (row) {
                    row.remove();
                }
            }
        }

        function handleResponse(event) {
            event.preventDefault();
            const responseText = document.getElementById('responseText').value;

            if (responseText) {
                // Submit the response .................
                alert(`Response submitted: ${responseText}`);

                // Clear the textarea
                document.getElementById('responseText').value = '';

                // Hide the response form after submission
                document.getElementById('responseForm').style.display = 'none';
            } else {
                alert("Please enter a response.");
            }
        }

        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>