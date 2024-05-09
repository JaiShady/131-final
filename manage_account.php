<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous">

    <style>
        body {
            background-color: #212529 !important;
            color: white;
            padding-top: 0px; /* Increase spacing between navbar and content */
        }

        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .atm-title {
            color: white;
            text-align: center;
            margin-top: 30px; /* Adjust spacing between navbar and title */
            margin-bottom: 20px; /* Add margin at the bottom */
        }

        .borderexample {
            border-width: 3px;
            border-style: solid;
            border-color: black;
            border-radius: 10px; /* Maintain rounded corners */
        }

        .card-body {
            text-align: center;
        }

        .btn-primary {
            background-color: #4c6e99;
        }
    </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="container">
    <h1 class="atm-title">Manage Accounts</h1> <!-- Modified title styling -->
    <div class="row">
        <div class="col-sm-6">
            <div class="card borderexample">
                <div class="card-body">
                    <h5 class="card-title">Open An Account</h5> <!-- Updated button text -->
                    <p class="card-text">Choose an account that fits your needs. Open an account today.</p>
                    <a href="checking.php" class="btn btn-primary">Open An Account</a> <!-- Updated button text -->
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card borderexample">
                <div class="card-body">
                    <h5 class="card-title">Close An Account</h5> <!-- Updated button text -->
                    <p class="card-text">OH NO! We are sad to see you go.</p>
                    <a href="close_checking.php" class="btn btn-primary">Close An Account</a> <!-- Updated button text -->
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>



