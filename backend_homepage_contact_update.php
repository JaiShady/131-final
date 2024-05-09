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



// Retrieve form data
$customer_id = $_POST['customer_id'];
$username = $_POST['username'];
$password = $_POST['password'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$address = $_POST['address'];
$city = $_POST['city'];
$zip = $_POST['zip'];
$DriverL = $_POST['DriverL'];
$SSN = $_POST['SSN'];

// SQL update query
$sql = "UPDATE customers SET 
        username = '$username',
        password = '$password',
        first_name = '$first_name',
        last_name = '$last_name',
        address = '$address',
        city = '$city',
        zip = '$zip',
        DriverL = '$DriverL',
        SSN = '$SSN'
        WHERE customer_id = $customer_id";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    echo "<a href='homepage.php'>Back to homepage </a>";

} else {
    echo "Error updating record: " . $conn->error;
        echo "<a href='homepage.php'>Back to homepage </a>";

}

// Close database connection
$conn->close();
?>
