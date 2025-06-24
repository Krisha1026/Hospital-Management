<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Lab Results - Care Compass</title>
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
        .upload {
            background-color: #4CAF50;
            color: white;
        }
        .update {
            background-color: #f39c12;
            color: white;
        }
        .delete {
            background-color: #e74c3c;
            color: white;
        }
        .upload-form {
            margin-top: 20px;
        }
        .upload-form input[type="file"] {
            margin-bottom: 10px;
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

        <h1>Manage Lab Results</h1>
        <p>Upload or update test reports for patients.</p>

        <!-- Table to display lab results -->
        <table>
            <thead>
                <tr>
                    <th>Lab Result ID</th>
                    <th>Patient Name</th>
                    <th>Test Name</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example Lab Result Data -->
                <tr>
                    <td>001</td>
                    <td>John </td>
                    <td>Blood Test</td>
                    <td>2025-01-25</td>
                    <td>Pending</td>
                    <td class="action-buttons">
                        <button class="upload" onclick="uploadLabResult(1)">Upload</button>
                        <button class="update" onclick="updateLabResult(1)">Update</button>
                        <button class="delete" onclick="deleteLabResult(1)">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>002</td>
                    <td>Harry</td>
                    <td>X-Ray</td>
                    <td>2025-01-03</td>
                    <td>Completed</td>
                    <td class="action-buttons">
                        <button class="upload" onclick="uploadLabResult(2)">Upload</button>
                        <button class="update" onclick="updateLabResult(2)">Update</button>
                        <button class="delete" onclick="deleteLabResult(2)">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>003</td>
                    <td>MRI</td>
                    <td>X-Ray</td>
                    <td>2024-11-03</td>
                    <td>Completed</td>
                    <td class="action-buttons">
                        <button class="upload" onclick="uploadLabResult(3)">Upload</button>
                        <button class="update" onclick="updateLabResult(3)">Update</button>
                        <button class="delete" onclick="deleteLabResult(3)">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>004</td>
                    <td>Virat</td>
                    <td>CT Scan</td>
                    <td>2024-11-23</td>
                    <td>Completed</td>
                    <td class="action-buttons">
                        <button class="upload" onclick="uploadLabResult(4)">Upload</button>
                        <button class="update" onclick="updateLabResult(4)">Update</button>
                        <button class="delete" onclick="deleteLabResult(4)">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>005</td>
                    <td>Imesha</td>
                    <td>Anti-CCP Test</td>
                    <td>2024-10-03</td>
                    <td>Completed</td>
                    <td class="action-buttons">
                        <button class="upload" onclick="uploadLabResult(5)">Upload</button>
                        <button class="update" onclick="updateLabResult(5)">Update</button>
                        <button class="delete" onclick="deleteLabResult(5)">Delete</button>
                    </td>
                </tr>
               
            </tbody>
        </table>

        <!-- Form for uploading lab results -->
        <div class="upload-form">
            <h3>Upload Lab Result</h3>
            <br>
            <form id="uploadForm" onsubmit="handleUpload(event)">
                <input type="file" id="labResultFile" name="labResultFile" required>
                <button type="submit" class="upload">Upload File</button>
            </form>
        </div>
    </div>

    <script>
        // JavaScript functions for handling actions
        function uploadLabResult(id) {
            alert(`Upload lab result for ID ${id}.`);
            
        }

        function updateLabResult(id) {
            const newFile = prompt("Enter the path or upload a new file:");
            if (newFile) {
                alert(`Lab result ${id} updated with new file: ${newFile}.`);
                
            }
        }

        function deleteLabResult(id) {
            if (confirm(`Are you sure you want to delete lab result ${id}?`)) {
                alert(`Lab result ${id} deleted.`);
                
            }
        }

        function handleUpload(event) {
            event.preventDefault();
            const fileInput = document.getElementById('labResultFile');
            const file = fileInput.files[0];
            if (file) {
                alert(`File "${file.name}" uploaded successfully.`);
                
            } else {
                alert("Please select a file to upload.");
            }
        }

        // Function to go back
        function goBack() {
            window.history.back();
        }

    </script>
</body>
</html>