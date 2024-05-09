<?php
session_start(); // Start the session
include('navbar.php');
?>


<?php
$conn = mysqli_connect("localhost", "root", "", "users");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
session_start();
if(!isset($_SESSION['username'])) {
    // Redirect user to login page if not logged in
    header("Location: login.php");
    exit();
}
$username = $_SESSION['username'];
$get_customer_id_query = "SELECT customer_id FROM customers WHERE username = '$username'";
$customer_id_result = mysqli_query($conn, $get_customer_id_query);
$row = mysqli_fetch_assoc($customer_id_result);
$customer_id = $row['customer_id'];

$get_transactions_query = "SELECT * FROM transactions WHERE customer_id = $customer_id";
$transactions_result = mysqli_query($conn, $get_transactions_query);

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transaction Report</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Transaction Report for <?php echo $username; ?></h2>
    <table>
        <thead>
            <tr>
                <th>Transaction ID</th>
                <th>Customer ID</th>
                <th>Date</th>
                <th>Amount</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Output transaction data in the table
            while($row = mysqli_fetch_assoc($transactions_result)) {
                echo "<tr>";
                echo "<td>".$row['transaction_id']."</td>";
                echo "<td>".$row['customer_id']."</td>";
                echo "<td>".$row['transaction_date']."</td>";
                echo "<td>".$row['amount']."</td>";
                echo "<td>".$row['description']."</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
mysqli_close($conn);
?>
