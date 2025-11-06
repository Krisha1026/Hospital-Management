<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
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
    </style>
</head>

<body>
    <div class="container">
        
        <!-- Back button -->
        <button class="back-button" onclick="goBack()">Back to Dashboard</button>

        <h1>Manage Users</h1>
        <p>Administer patient, staff, and administrator accounts. Add new users, update information, or remove access as needed.</p>

        <label for="userSearch">Search User:</label>
        <input type="text" id="userSearch" placeholder="Enter user name...">
        
        <label for="roleFilter">Filter by Role:</label>
        <select id="roleFilter">
            <option value="all">All</option>
            <option value="administrator">Administrator</option>
            <option value="doctor">Doctor</option>
            <option value="nurse">Nurse</option>
            <option value="patient">Patient</option>
        </select>

        <button>Add New User</button>

        <table>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
            <tr>
                <td>101</td>
                <td>Niranjan</td>
                <td>Administrator</td>
                <td class="actions">
                    <button>Edit</button> 
                    <button onclick="confirmDelete(101)">Delete</button>
                </td>
            </tr>
            <tr>
                <td>102</td>
                <td>Harry</td>
                <td>Doctor</td>
                <td class="actions">
                    <button>Edit</button> 
                    <button onclick="confirmDelete(102)">Delete</button>
                </td>
            </tr>
            <tr>
                <td>103</td>
                <td>Radha</td>
                <td>Staff</td>
                <td class="actions">
                    <button>Edit</button> 
                    <button onclick="confirmDelete(103)">Delete</button>
                </td>
            </tr>
            <tr>
                <td>104</td>
                <td>Krisha</td>
                <td>Doctor</td>
                <td class="actions">
                    <button>Edit</button> 
                    <button onclick="confirmDelete(104)">Delete</button>
                </td>
            </tr>
            <tr>
                <td>105</td>
                <td>Sid</td>
                <td>Doctor</td>
                <td class="actions">
                    <button>Edit</button> 
                    <button onclick="confirmDelete(105)">Delete</button>
                </td>
            </tr>
            <tr>
                <td>106</td>
                <td>Surya</td>
                <td>Staff</td>
                <td class="actions">
                    <button>Edit</button> 
                    <button onclick="confirmDelete(106)">Delete</button>
                </td>
            </tr>
        </table>
    </div>

 

    <script>
        // Function to confirm deletion
        function confirmDelete(userId) {
            if (confirm("Are you sure you want to delete this user?")) {
                
                alert("User " + userId + " deleted successfully!");
            }
        }

        // Function to go back
        function goBack() {
            window.history.back();
        }
    </script>

</body>

</html>
