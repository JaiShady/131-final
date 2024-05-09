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

// Store  account data in an array
$accounts = array();
if(mysqli_num_rows($get_account_info_result) > 0) {
    while($row = mysqli_fetch_assoc($get_account_info_result)) {
        $accounts[] = $row;
    }
}

?>

<html lang="en">
<head>
 <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>ATM Interface</title>
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
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            text-align: center;
        }

        .atm-title {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .account-info {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .account-details {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .options {
            text-align: left;
        }

        .option {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .quick-cash {
            font-size: 24px;
            font-weight: bold;
        }
</style>
</head>
<body>
    <div class="atm-container">
        <div class="atm-title">Transfer Funds</div>
        <div class="account-info"> <h2>Hello <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?></h2></div>

        <form action="backend_atm_transfer.php" method="post">
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
                            <label class="form-check-label" for="source_account_<?php echo $accountname; ?>">
                                <?php echo $accountname; ?>
                            </label>
                        </div>
                <?php 
                    }
                } else {
                    echo "<p>No accounts found</p>";
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
                            <label class="form-check-label" for="destination_account_<?php echo $accountname; ?>">
                                <?php echo $accountname; ?>
                            </label>
                        </div>
                <?php 
                    }
                } else {
                    echo "<p>No accounts found</p>";
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

</body>
</html>

<?php 
mysqli_close($conn); // Close database connection
?>
