<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
            text-align:center;
        }

        p {
            color: #666;
            margin-bottom: 20px;
        }

        /* Search and filter styles */
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
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

        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
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

        .actions button {
            margin-right: 5px;
            padding: 5px 10px;
            font-size: 14px;
        }

        .actions button:last-child {
            margin-right: 0;
        }

        /* Delete button specific style */
        .actions button[onclick*="confirmDelete"] {
            background-color: #dc3545;
        }

        .actions button[onclick*="confirmDelete"]:hover {
            background-color: #c82333;
        }

        /* Download button specific style */
        .download-button {
            background-color: #28a745;
        }

        .download-button:hover {
            background-color: #218838;
        }

        /* Button group for website content */
        .button-group {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .button-group button {
            flex: 1 1 auto;
        }
    </style>
</head>

<body>
    <!-- Access Reports & Analytics -->
    <div class="container">
        
        <!-- Back button -->
        <button class="back-button" onclick="goBack()">Back to Dashboard</button>

        <h1>Access Reports & Analytics</h1>
        <p>Generate and analyze reports to track operational performance and user activity.</p>
        
        <label for="reportSearch">Search Report:</label>
        <input type="text" id="reportSearch" placeholder="Enter report name...">
        
        <label for="reportFilter">Filter by:</label>
        <select id="reportFilter">
            <option value="all">All</option>
            <option value="user_activity">User Activity</option>
            <option value="service_utilization">Service Utilization</option>
            <option value="financial">Financial Reports</option>
        </select>
        
        <button>Generate New Report</button>
        
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
                <td><button class="download-button">Download</button></td>
            </tr>
            <tr>
                <td>302</td>
                <td>Service Utilization Report</td>
                <td>2025-02-10</td>
                <td><button class="download-button">Download</button></td>
            </tr>
            <tr>
                <td>303</td>
                <td>Financial Performance</td>
                <td>2025-02-15</td>
                <td><button class="download-button">Download</button></td>
            </tr>
        </table>
    </div>

    <!-- Service Management -->
    <div class="container">
        <h1>Service Management</h1>
        <p>Update and manage hospital services, facilities, and doctor profiles.</p>
        
        <label for="serviceSearch">Search Service:</label>
        <input type="text" id="serviceSearch" placeholder="Enter service name...">
        
        <button>Add New Service</button>
        
        <table>
            <tr>
                <th>Service ID</th>
                <th>Service Name</th>
                <th>Description</th>
                <th>Assigned Doctor</th>
                <th>Actions</th>
            </tr>
            <tr>
                <td>201</td>
                <td>Emergency Care</td>
                <td>24/7 emergency medical assistance</td>
                <td>Dr. Smith</td>
                <td class="actions">
                    <button>Edit</button> 
                    <button onclick="confirmDelete(201)">Delete</button>
                </td>
            </tr>
            <tr>
                <td>202</td>
                <td>Pediatrics</td>
                <td>Comprehensive child healthcare services</td>
                <td>Dr. Johnson</td>
                <td class="actions">
                    <button>Edit</button> 
                    <button onclick="confirmDelete(202)">Delete</button>
                </td>
            </tr>
            <tr>
                <td>203</td>
                <td>Cardiology</td>
                <td>Heart disease diagnosis and treatment</td>
                <td>Dr. Brown</td>
                <td class="actions">
                    <button>Edit</button> 
                    <button onclick="confirmDelete(203)">Delete</button>
                </td>
            </tr>
        </table>
    </div>

    <!-- Update Website Content -->
    <div class="container">
        <h1>Update Website Content</h1>
        <p>Modify the website's text, images, and layout to ensure up-to-date and accurate information.</p>
        
        <div class="button-group">
            <button>Edit Homepage</button>
            <button>Edit About Page</button>
            <button>Edit Services Page</button>
            <button>Edit Contact Page</button>
            <button>Preview Changes</button>
        </div>
    </div>

    

    <script>
        // Function to confirm deletion
        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete this item?")) {
                alert("Item " + id + " deleted successfully!");
            }
        }

        // Function to go back
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>