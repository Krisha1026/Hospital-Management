<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Reports & Analytics</title>
    <link rel="website icon" type="png" href="../images/Care Compass logo.png">
    <style>
        /* General styles */
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
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        p {
            color: #666;
            margin-bottom: 20px;
        }

        /* Filter section */
        .filter-section {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .filter-section label {
            font-weight: bold;
            color: #555;
        }

        .filter-section select {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        .filter-section button {
            padding: 8px 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .filter-section button:hover {
            background-color: #0056b3;
        }

        /* Generate report button */
        button[onclick="generateReport()"] {
            padding: 10px 20px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-bottom: 20px;
        }

        button[onclick="generateReport()"]:hover {
            background-color: #218838;
        }

        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td button {
            padding: 5px 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        td button:hover {
            background-color: #218838;
        }

        /* Summary section */
        .summary {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .summary h2 {
            color: #333;
            margin-bottom: 10px;
        }

        .summary p {
            color: #555;
            margin: 5px 0;
        }

        .summary p strong {
            color: #333;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-right: 10px;
        }

        button:hover {
            background-color: #0056b3;
        }


    
    </style>
</head>
<body>
    <div class="container">
        
        <!-- Back button -->
        <button class="back-button" onclick="goBack()">Back to Dashboard</button>

        <h1>Access Reports & Analytics</h1>
        <p>Generate and analyze reports to track operational performance and user activity.</p>
        
        <!-- Filter section -->
        <div class="filter-section">
            <label for="report-type">Filter by Report Type:</label>
            <select id="report-type">
                <option value="all">All Reports</option>
                <option value="user-activity">User Activity</option>
                <option value="service-utilization">Service Utilization</option>
                <option value="financial">Financial Reports</option>
                <option value="feedback">Patient Feedback</option>
            </select>
            <button onclick="filterReports()">Apply Filter</button>
        </div>
        
        <!-- Generate report button -->
        <button onclick="generateReport()">Generate New Report</button>
        
        <!-- Reports table -->
        <table>
            <tr>
                <th>Report ID</th>
                <th>Report Name</th>
                <th>Date Generated</th>
                <th>Download</th>
            </tr>
            <tr>
                <td>301</td>
                <td>Monthly User Activity</td>
                <td>2025-02-01</td>
                <td><button>Download</button></td>
            </tr>
            <tr>
                <td>302</td>
                <td>Service Utilization Report</td>
                <td>2025-02-10</td>
                <td><button>Download</button></td>
            </tr>
            <tr>
                <td>303</td>
                <td>Quarterly Financial Report</td>
                <td>2025-01-15</td>
                <td><button>Download</button></td>
            </tr>
            <tr>
                <td>304</td>
                <td>Patient Feedback Analysis</td>
                <td>2025-02-05</td>
                <td><button>Download</button></td>
            </tr>
        </table>

        <!-- Summary section -->
        <div class="summary">
            <h2>Report Summary</h2>
            <p><strong>Total Reports Generated:</strong> 4</p>
            <p><strong>Most Recent Report:</strong> Patient Feedback Analysis (2025-02-15)</p>
            <p><strong>Most Downloaded Report:</strong> Monthly User Activity</p>
        </div>
    </div>

    <script>
        function generateReport() {
            alert("New report generation feature coming soon!");
        }
        function filterReports() {
            alert("Filtering feature under development!");
        }

        // Function to go back
        function goBack() {
            window.history.back();
        }

       
    </script>
</body>
</html>