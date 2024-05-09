<?php
session_start(); // Start the session
include('navbar.php');
?>

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

// Fetch account information for the logged-in user
$username = $_SESSION['username'];
$get_account_info_query = "SELECT * FROM checkinginfo WHERE customer_id = (SELECT customer_id FROM customers WHERE username = '$username')";
$get_account_info_result = mysqli_query($conn, $get_account_info_query);

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>account overview</title>
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

        <div class="atm-title"> Account Overview</div>
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
        <button class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $accountname . $account_number; ?>" aria-expanded="false" aria-controls="collapse<?php echo $accountname . $account_number; ?>">
            View Details
        </button>
    </div>
    <div id="collapse<?php echo $accountname . $account_number; ?>" class="collapse" aria-labelledby="heading<?php echo $accountname . $account_number; ?>" data-bs-parent="#accordion">
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

  
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>

<?php 
mysqli_close($conn);
?>
