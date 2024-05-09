<?php 
session_start(); 

// Check if user is logged in
if(!isset($_SESSION['username'])) {
    // Redirect user to login page if not logged in
    header("Location: login.php");
    exit();
}

// Establish database connection
$conn = mysqli_connect("localhost", "root", "", "users");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// get account information for the logged-in user
$username = $_SESSION['username'];
$get_account_info_query = "SELECT * FROM checkinginfo WHERE customer_id = (SELECT customer_id FROM customers WHERE username = '$username')";
$get_account_info_result = mysqli_query($conn, $get_account_info_query);

// Store account data in an array
$accounts = array();
if(mysqli_num_rows($get_account_info_result) > 0) {
    while($row = mysqli_fetch_assoc($get_account_info_result)) {
        $accounts[] = $row;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>transfer Interface</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .atm-container {
            max-width: 400px;
            margin: 20px auto;
            background-color: #212529; /* Color changed to #212529 */
            border: 1px solid #ccc;
            border-radius: 0.5rem; /* Rounded corners */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            padding: 30px; /* Increased padding */
            text-align: center;
            color: #fff; /* Text color changed to white */
        }

        .atm-title {
            font-size: 30px; /* Increased font size */
            margin-bottom: 20px; /* Increased margin */
        }

        .account-info {
            font-size: 22px; /* Increased font size */
            font-weight: bold;
            margin-bottom: 20px; /* Increased margin */
        }

        .account-details {
            font-size: 20px; /* Increased font size */
            margin-bottom: 20px; /* Increased margin */
        }

        .options {
            text-align: left;
        }

        .option {
            font-size: 22px; /* Increased font size */
            margin-bottom: 20px; /* Increased margin */
        }

        .quick-cash {
            font-size: 30px; /* Increased font size */
            font-weight: bold;
        }

        .form-check-label {
            font-size: 18px; /* Increased font size */
        }

        .form-control {
            font-size: 18px; /* Increased font size */
        }

        .btn {
            font-size: 20px; /* Increased font size */
            padding: 10px 20px; /* Increased padding */
            background-color: #4c6e99; /* Set button color to #4c6e99 */
        }
    </style>
</head>
<body>
<div class="atm-container">
    <div class="atm-title">Transfer Funds</div>
    <div class="account-info fw-bold">Hello <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?></div>

    <form action="backend_transfer.php" method="post">
        <div class="mb-3">
            <label for="source_account" class="form-label">Select Source Account:</label>
            <?php
            // Display account options dynamically
            if(!empty($accounts)) {
                foreach($accounts as $account) {
                    $accountname = $account['accountname'];
                    ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="source_account" id="source_account_<?php echo $accountname; ?>" value="<?php echo $accountname; ?>">
                        <label class="form-check-label text-white" for="source_account_<?php echo $accountname; ?>">
                            <?php echo $accountname; ?>
                        </label>
                    </div>
                    <?php
                }
            } else {
                echo "<p class='text-white'>No accounts found</p>";
            }
            ?>
        </div>
        <div class="mb-3">
            <label for="destination_account" class="form-label">Select Destination Account:</label>
            <?php
            // Display account options dynamically
            if(!empty($accounts)) {
                foreach($accounts as $account) {
                    $accountname = $account['accountname'];
                    ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="destination_account" id="destination_account_<?php echo $accountname; ?>" value="<?php echo $accountname; ?>">
                        <label class="form-check-label text-white" for="destination_account_<?php echo $accountname; ?>">
                            <?php echo $accountname; ?>
                        </label>
                    </div>
                    <?php
                }
            } else {
                echo "<p class='text-white'>No accounts found</p>";
            }
            ?>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Enter Amount to Transfer:</label>
            <input type="number" class="form-control" id="amount" name="amount" min="0.01" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Transfer</button>
    </form>
</div>

<!-- Add your scripts here -->
</body>
</html>

<?php 
mysqli_close($conn); // Close database connection
?>
