<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Bank Dashboard</title>
    <style>
        .navbar-dark {
            background-color: #183C67 !important;
        }

        .navbar-nav .nav-link {
            color: white !important;
        }

        .dropdown-menu {
            background-color: #183C67;
        }

        .dropdown-menu a {
            color: white !important;
        }

        /* Display dropdown menus on hover and set background color */
        .nav-item.dropdown:hover .dropdown-menu {
            display: block;
            background-color: #183C67;
        }

        /* Change color of subheader links on hover */
        .dropdown-menu a:hover {
            color: #0F2C4F !important; /* Slightly darker blue */
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="homepage.php">Bank Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink1" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Accounts
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
                        <li><a class="dropdown-item" href="checking.php">Create Account</a></li>
                        <li><a class="dropdown-item" href="manage_account.php">Manage Accounts</a></li>
                        <li><a class="dropdown-item" href="account_overview.php">Account Overview</a></li>
                        <li><a class="dropdown-item" href="homepage_Treport.php">Transaction History</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink2" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Transactions
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                        <li><a class="dropdown-item" href="transfer.php">Transfer</a></li>
                        <li><a class="dropdown-item" href="withdraw.php">Withdraw</a></li>
                        <li><a class="dropdown-item" href="deposit.php">Deposit</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Admin.php">Employee Portal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="atm_login.php">ATM</a>
                </li>
            </ul>
            <div class="ml-auto"> <!-- Logout button pushed to the far right -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Bootstrap Bundle with Popper.js -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+Zhe6m/8aP6PmfZe+qwGNI8Y+8gs2otPLI3z9So" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k4xzm1KRvY+8uhaR0SJo3w5L6kq1uWQgD2aQnlD7KxBQuF+9Kb4VymwItXqCKqpG" crossorigin="anonymous">
</script>
</body>

</html>
