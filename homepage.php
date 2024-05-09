<?php
 session_start(); // Start the session

 include('php/backend_navbar.php'); ?>

<html>

<head>
    <title>Bank Dashboard</title>

    <style>

body {
            background: lightgray;
        }



        .borderexample {
            border-width: 3px;
            border-style: solid;
            border-color: black;
            background-color: lightblue;
        }


        .dropdownmenu ul {
            list-style: none;
            width: 100%;
            text-align: center; /* Center the parent menu */
            padding: 0;
        }

        .dropdownmenu li {
            display: inline-block; /* Display as inline-block */
            position: relative;
        }

        .dropdownmenu a {
            background: #30a6e6;
            color: white;
            display: block;
            font-weight: bold;
            font-size: 13px;
            font-family: 'Poppins', 'sans-serif';
            padding: 15px 55px;
            text-align: center;
            text-decoration: none;
            transition: all 0.25s ease;
        }

        .dropdownmenu li:hover a {
            background: #34495e;
        }

        .dropdownmenu ul.submenu {
            position: absolute;
            left: 50%;
            top: 100%;
            transform: translateX(-50%);
            opacity: 0;
            visibility: hidden;
            list-style: none;
            width: 100%;
            transition: opacity 0.25s ease;
            z-index: 1;
        }

        .dropdownmenu li:hover ul.submenu {
            opacity: 1;
            visibility: visible;
        }

        .dropdownmenu ul.submenu li {
            width: 100%;
        }

        .dropdownmenu ul.submenu a {
            padding: 10px 15px;
        }

        .dropdownmenu ul.submenu a:hover {
            background: #df3b0f;
        }
    </style>
</head>

<body>


<br>



    <nav class="dropdownmenu">
        <ul>
            <li>
                <a href="#">Accounts</a>
                 <ul class="submenu">
                     <li><a href="account_overview.php">Account overview</a></li>
                    <li><a href="#">Transaction History</a></li>
                    <li><a href="manage_account.php"> manage account </a></li>

                 </ul>
            </li>

            <li>
                <a href="#">Transactions</a>
                <ul class="submenu">
                    <li><a href="transfer.php">transfer</a></li>
                    <li><a href="withdraw.php">withdraw</a></li>
                    <li><a href="deposit.php">deposit</a></li>
                </ul>
            </li>

            <li>
                <a href="#">Profile and Settings</a>
                <ul class="submenu">
                    <li><a href="#">Contact Information</a></li>
                    <li><a href="#">Security</a></li>
                    <li><a href="manage_profile.php">Manage Profile</a></li>
                </ul>
            </li>
        </ul>
    </nav>
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