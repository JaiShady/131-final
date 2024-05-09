<?php
// Create connection
$conn = mysqli_connect("localhost", "root", "", "users");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data
$username = $_POST['username'];
$account_number = $_POST['account_number'];
$pin = $_POST['pin'];

// Get customer_id based on the provided username
$get_customer_id_query = "SELECT customer_id FROM customers WHERE username = ?";
$get_customer_id_stmt = mysqli_prepare($conn, $get_customer_id_query);
mysqli_stmt_bind_param($get_customer_id_stmt, "s", $username);
mysqli_stmt_execute($get_customer_id_stmt);
$get_customer_id_result = mysqli_stmt_get_result($get_customer_id_stmt);

if(mysqli_num_rows($get_customer_id_result) > 0) {
    $row = mysqli_fetch_assoc($get_customer_id_result);
    $customer_id = $row['customer_id'];

    // Check if the provided PIN matches the PIN in the database
    $check_pin_query = "SELECT * FROM checkinginfo WHERE customer_id = ? AND account_number = ? AND pin = ?";
    $check_pin_stmt = mysqli_prepare($conn, $check_pin_query);
    mysqli_stmt_bind_param($check_pin_stmt, "iis", $customer_id, $account_number, $pin);
    mysqli_stmt_execute($check_pin_stmt);
    $check_pin_result = mysqli_stmt_get_result($check_pin_stmt);

    if(mysqli_num_rows($check_pin_result) > 0) {
        // Check account balance
        $get_balance_query = "SELECT balance FROM checkinginfo WHERE customer_id = ? AND account_number = ?";
        $get_balance_stmt = mysqli_prepare($conn, $get_balance_query);
        mysqli_stmt_bind_param($get_balance_stmt, "ii", $customer_id, $account_number);
        mysqli_stmt_execute($get_balance_stmt);
        $balance_result = mysqli_stmt_get_result($get_balance_stmt);
        $balance_row = mysqli_fetch_assoc($balance_result);
        $balance = $balance_row['balance'];

        if ($balance == 0.00) {
            // Close account
            $close_account_query = "DELETE FROM checkinginfo WHERE customer_id = ? AND account_number = ?";
            $close_account_stmt = mysqli_prepare($conn, $close_account_query);
            mysqli_stmt_bind_param($close_account_stmt, "ii", $customer_id, $account_number);
            
            if (mysqli_stmt_execute($close_account_stmt)) {
                echo "<div class='success-message'>SUCCESS: Account closed successfully.</div>";
                echo "<a href='homepage.php'>Back to homepage</a>";
            } else {
                echo "<div class='error-message'>Error: " . mysqli_error($conn) . "</div>";
                echo "<a href='homepage.php'>Back to homepage</a>";
            }
        } elseif ($balance < 0) {
            // Redirect to deposit
            echo "<div class='error-message'>Error: balance cannot be negative for the account.</div>";
        echo "<a href='homepage.php'>Back to homepage <br> </a>";
        echo "<a href='deposit.php'>to deposits</a>";

        } else {
            // Redirect to transfer
            echo "<div class='error-message'>Error: balance must be empty .</div>";
        echo "<a href='homepage.php'>Back to homepage</a> <br>";
        echo "<a href='deposit.php'>to deposits</a> <br>";
        echo "<a href='transfer.php'>to deposits</a>";

        }
    } else {
        echo "<div class='error-message'>Error: Incorrect PIN for the provided account.</div>";
        echo "<a href='homepage.php'>Back to homepage</a>";
    }
} else {
    echo "<div class='error-message'>Error: Username not found.</div>";
    echo "<a href='homepage.php'>Back to homepage</a>";
}

mysqli_close($conn);
?>


