<?php
session_start(); // Start the session
include('navbar.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<style>
    body {
        background: lightgray;
    }

    .borderexample {
        border-width: 3px;
        border-style: solid;
        color: white !important;
        background-color: #183C67 !important;
        text-align: center;
        padding: 10px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .card-title, .card-text {
        text-align: center;
    }

    /* Center the buttons horizontally within the card */
    .card-body {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column; /* Align items vertically */
        height: 100%; /* Ensure full height for flex alignment */
    }
</style>

<title>Manage Accounts</title>
</head>

<body>
<div class="container mt-4">
    <div class="borderexample">
        <h1>Manage Accounts</h1>
    </div>

    <div class="row mt-4">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Open An Account</h5>
                    <p class="card-text"></p>
                    <a href="checking.php" class="btn btn-primary">Checking</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Close An Account</h5>
                    <p class="card-text"></p>
                    <a href="close_checking.php" class="btn btn-primary">Close An Account</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Center the "Delete Profile" card -->
    <div class="row mt-4">
        <div class="col-sm-12 d-flex justify-content-center align-items-center">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Delete Profile</h5>
                    <p class="card-text"></p>
                    <a href="manage_profile.php" class="btn btn-primary">Delete Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
