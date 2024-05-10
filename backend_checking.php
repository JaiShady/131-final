<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Account Creation Result</title>
    <style>
        body {
            background-color: #212529;
            color: white;
            font-family: Arial, sans-serif;
            font-weight: bold; /* Set default font weight to bold */
            text-align: center;
            line-height: 1.5;
            padding-top: 50px; /* Add some padding to center content vertically */
        }

        .good-message, .error-message {
            font-size: 36px; /* Increase font size */
            margin-bottom: 30px; /* Add margin for vertical spacing */
        }

        img {
            display: block;
            margin: 0 auto; /* Center GIF horizontally */
            margin-bottom: 20px; /* Add some space below the GIF */
        }

        a {
            color: #4c6e99; /* Change link color */
        }
    </style>
</head>
<body>

<?php
// Create connection
$conn = mysqli_connect("localhost", "root", "", "users");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// get customer_id based on the provided username
$username = $_POST['username'];
$get_customer_id_query = "SELECT customer_id FROM customers WHERE username = '$username'";
$get_customer_id_result = mysqli_query($conn, $get_customer_id_query);

if(mysqli_num_rows($get_customer_id_result) > 0) {
    $row = mysqli_fetch_assoc($get_customer_id_result);
    $customer_id = $row['customer_id'];

    $accountname = $_POST['accountname'];
    $balance = $_POST['balance'];
    $pin = $_POST['pin'];

    // Insert checking account information into the database
    $creditCardNumber = generateCreditCardNumber();
    $accountNumber = generateAccountNumber();

    $sql = "INSERT INTO checkinginfo (customer_id, accountname, balance, pin, credit_card_number, account_number)
            VALUES ('$customer_id', '$accountname', '$balance', '$pin', '$creditCardNumber', '$accountNumber')";

    if (mysqli_query($conn, $sql)) {
        echo "<div class='good-message'>SUCCESS: New record created successfully. <br> Account Number: $accountNumber <br> <img src='giphy2.gif' alt='Success GIF'></div>";
        echo "<a href='homepage.php'>CLICK HERE for homepage</a>";
    } else {
        echo "<div class='error-message'>Error: " . $sql . "<br>" . mysqli_error($conn) . "</div>";
        echo "<a href='index.php'>Redirecting to registration</a>";
    }
} else {
    echo "<div class='error-message'>Error: Username not found.</div>";
}

mysqli_close($conn);

function generateCreditCardNumber() {
    return mt_rand(1000000000000000, 9999999999999999);
}

function generateAccountNumber() {
    return mt_rand(1000000000, 9999999999);
}
?>
