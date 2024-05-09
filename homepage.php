<?php
session_start(); // Start the session

include('navbar.php'); ?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Bank Dashboard</title>
    <style>
        body {
            background-color: #708090;
            color: white;
            margin: 2rem;
        }

        .dropdownmenu {
            background-color: #4C6E99;
            color: white;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .dropdownmenu ul {
            padding: 0;
            margin: 0;
        }

        .dropdownmenu li {
            display: inline-block;
            margin: 1rem 2rem;
            position: relative;
        }

        .dropdownmenu a {
            text-decoration: none;
            color: white;
        }

        .dropdownmenu a:hover {
            color: #ddd; /* Optional hover effect */
        }

        .submenu {
            display: none;
            position: absolute;
            background-color: #4C6E99;
            width: 200px;
        }

        .dropdownmenu li:hover .submenu {
            display: block;
        }

        .submenu li {
            margin: 0;
        }
    </style>
</head>

<body>

<!-- Bootstrap Bundle with Popper.js -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+Zhe6m/8aP6PmfZe+qwGNI8Y+8gs2otPLI3z9So" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k4xzm1KRvY+8uhaR0SJo3w5L6kq1uWQgD2aQnlD7KxBQuF+9Kb4VymwItXqCKqpG" crossorigin="anonymous">
</script>
</body>

<br>
<br>
<br>

<h2>Hello <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?></h2></div>


<hr>

<br>


<h3> Personal accounts </h3>

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

// get account name and balance for the logged-in user
$username = $_SESSION['username'];
$get_account_info_query = "SELECT accountname, balance FROM checkinginfo WHERE customer_id = (SELECT customer_id FROM customers WHERE username = '$username')";
$get_account_info_result = mysqli_query($conn, $get_account_info_query);

// Display account name and balance
if(mysqli_num_rows($get_account_info_result) > 0) {
    while($row = mysqli_fetch_assoc($get_account_info_result)) {
        $accountname = $row['accountname'];
        $balance = $row['balance'];
        echo "<h3><a href='#'>$accountname:</a> $$balance</h3>";
    }
} else {
    echo "<h3>No accounts found.</h3>";
}

mysqli_close($conn);
?>


<hr>




</html>