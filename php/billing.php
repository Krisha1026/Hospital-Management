<?php

session_start();



// Placeholder for patient's billing history 
$patient_name = $_SESSION['patient'];
$billing_history = [
    ["billing_date" => "2025-02-15", "description" => "Consultation", "amount" => 1000, "status" => "Unpaid"],
    ["billing_date" => "2025-02-18", "description" => "Lab Test", "amount" => 1500, "status" => "Paid"]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing History - Care Compass</title>
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

        .billing { 
            margin-bottom: 20px; 
            padding: 10px; 
            border: 1px solid #ddd; 
            background: #fafafa; 
        }

        .billing h3 { 
            color: #0056b3; 
        }

        .btn { 
            display: inline-block;
            padding: 10px 15px;
            background:  #0056b3;
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
        <h2>Billing History</h2>
        <div class="billing">
            <h3>Billing Overview</h3>
            <?php if (empty($billing_history)) { ?>
                <p>No billing history available.</p>
            <?php } else { ?>
                <ul>
                    <?php foreach ($billing_history as $billing) { ?>
                        <li>
                            <strong>Billing Date:</strong> <?php echo $billing['billing_date']; ?>,
                            <strong>Description:</strong> <?php echo $billing['description']; ?>,
                            <strong>Amount:</strong> Rs <?php echo $billing['amount']; ?>,
                            <strong>Status:</strong> <?php echo $billing['status']; ?>
                            <?php if ($billing['status'] != 'Paid') { ?>
                                <form method="POST" action="billing.php" style="display:inline;">
                                    <input type="hidden" name="billing_id" value="<?php echo $billing['billing_date']; ?>">
                                    <a href="pay_online.php" type="submit" name="pay" class="btn"> Pay now</a>
                                </form>
                            <?php } ?>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </div>
        <div class="billing">
            <h3>Payment Options</h3>
            <a href="pay_online.php" class="btn">Proceed to Payment</a>
        </div>
        <a href="../other-pages/patient.html" class="btn">Back to Dashboard</a>
    </div>
</body>
</html>
