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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>ATM Interface</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0; /* Light gray background */
            margin: 0;
            padding: 0;
            color: white; /* White text color */
            transform: scale(1.05); /* Slightly increased scale */
        }

        .atm-container {
            max-width: 420px; /* Increased container width */
            margin: 20px auto;
            background-color: #212529; /* Dark box color */
            border: 1px solid #212529; /* Dark border color */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            text-align: center;
            border-radius: 10px; /* Rounded corners */
        }

        .atm-title {
            font-size: 32px; /* Increased font size */
            margin-bottom: 20px; /* Increased margin */
        }

        .account-info {
            font-size: 26px; /* Increased font size */
            font-weight: bold;
            margin-bottom: 20px; /* Increased margin */
        }

        .account-details {
            font-size: 22px; /* Increased font size */
            margin-bottom: 20px; /* Increased margin */
        }

        .options {
            text-align: left;
        }

        .option {
            font-size: 26px; /* Increased font size */
            margin-bottom: 20px; /* Increased margin */
        }

        .quick-cash {
            font-size: 32px; /* Increased font size */
            font-weight: bold;
        }

        .btn-primary {
            background-color: #4c6e99; /* Button color */
            border-color: #4c6e99; /* Button border color */
            margin: 10px; /* Increased button margin */
            border-radius: 5px; /* Rounded button corners */
        }

        .btn-primary:hover {
            background-color: #667b9e; /* Darker background color on hover */
            border-color: #667b9e; /* Darker border color on hover */
        }
    </style>
</head>

<body>

<div class="atm-container">

    <div class="atm-title"> BANK OF "" ATM</div>
    <div class="account-info"> <h2>Hello <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?></h2></div>


    <div id="accordion">

        <?php
        // Display account information dynamically
        if(mysqli_num_rows($get_account_info_result) > 0) {
            while($row = mysqli_fetch_assoc($get_account_info_result)) {
                $accountname = $row['accountname'];
                $balance = $row['balance'];
                $credit_card_number = $row['credit_card_number'];
                $account_number = $row['account_number'];
                $pin = $row['pin'];
                ?>

                <div class="card">
                    <div class="card-header" id="heading<?php echo $accountname . $account_number; ?>">
                        <h5 class="mb-0">
                            <span class="account-name"><?php echo $accountname; ?></span><br>
                            Balance: $<?php echo $balance; ?>
                        </h5>
                        <button class="btn btn-link" data-bs-toggle="collapse"
                                data-bs-target="#collapse<?php echo $accountname . $account_number; ?>" aria-expanded="false"
                                aria-controls="collapse<?php echo $accountname . $account_number; ?>">
                            View Details
                        </button>
                    </div>
                    <div id="collapse<?php echo $accountname . $account_number; ?>" class="collapse"
                         aria-labelledby="heading<?php echo $accountname . $account_number; ?>" data-bs-parent="#accordion">
                        <div class="card-body">
                            <div class="account-details">
                                Credit Card Number: <?php echo $credit_card_number; ?><br>
                                Account Number: <?php echo $account_number; ?><br>
                                PIN: <?php echo $pin; ?><br>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
            }
        } else {
            echo "<h3>No accounts found.</h3>";
        }
        ?>
    </div>

    <a href="deposit.php" class="btn btn-primary">Deposit</a>
    <a href="withdraw.php" class="btn btn-primary">Withdraw</a>
    <a href="transfer.php" class="btn btn-primary">Transfer</a>
    <br>
    <br>
    <hr>
    <br>
    <a href="atm_login.php" class="btn btn-primary">Logout</a>

</div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>

<?php 
mysqli_close($conn);
?>
