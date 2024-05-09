<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start(); 

if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$conn = mysqli_connect("localhost", "root", "", "users");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
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
        <div class="atm-title"> BANK OF "" ATM</div>
        <div class="account-info"> <h2>Hello <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?></h2></div>

<?php
$depositMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['account'])) {
        $depositMessage = "Please select an account to deposit into. <br>";
    } else {
        $selectedAccount = $_POST['account'];
        $depositAmount = $_POST['amount'];

        $updateBalanceQuery = "UPDATE checkinginfo SET balance = balance + $depositAmount WHERE accountname = '$selectedAccount'";

        if (mysqli_query($conn, $updateBalanceQuery)) {
            $username = $_SESSION['username'];
            $get_customer_id_query = "SELECT customer_id FROM customers WHERE username = '$username'";
            $customer_id_result = mysqli_query($conn, $get_customer_id_query);

            if (mysqli_num_rows($customer_id_result) > 0) {
                $row = mysqli_fetch_assoc($customer_id_result);
                $customerId = $row['customer_id'];

                // Insert transaction record into transactions table
                $insertTransactionQuery = "INSERT INTO transactions (customer_id, amount, description) VALUES ('$customerId', '$depositAmount', ' Website Deposit')";

                if (mysqli_query($conn, $insertTransactionQuery)) {
                    // Transaction record inserted successfully
                    $depositMessage = "Deposit of $depositAmount into $selectedAccount successful. <br>";
                } else {
                    $depositMessage = "Error inserting transaction record: " . mysqli_error($conn) . "<br>";
                }
            } else {
                $depositMessage = "Error: Failed to fetch customer ID. <br>";
            }
        } else {
            $depositMessage = "Error: " . mysqli_error($conn);
        }
    }
}

mysqli_close($conn); 
?>

<div class="card">
            <div class="card-body">
                <h5 class="card-title">Deposit Result</h5>
                <p class="card-text"><?php echo $depositMessage ?? ''; ?></p>
                <a href="deposit.php" class="btn btn-primary">Back to deposit Interface</a>
                 <br>
                <br>
                <a href="homepage.php" class="btn btn-primary">Back to homepage </a>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
