<?php include('navbar.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Checking Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Styling from existing checking.css file -->
    <style>
        body {
            background-color: lightgray; /* Set light gray background */
        }
        .card {
            background-color: #212529; /* Set inner box color */
        }
        .btn {
            background-color: #4C6E99 !important; /* Set all buttons color */
        }
        .form-outline {
            margin-bottom: 1.5rem; /* Increase spacing between form and button */
        }
        .form-row {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem; /* Add margin between stacked fields */
        }
        .form-row .btn {
            margin-left: 1rem;
            margin-top: 0.5rem; /* Adjust margin-top to align with PIN field */
        }
    </style>
</head>
<body>
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                <div class="card text-white">
                    <div class="card-body p-5 text-center">
                        <h1 class="mb-4">Create Your Checking Account</h1>
                        <form method="post" action="backend_checking.php">
                            <div class="form-outline">
                                <input type="text" name="username" id="username" class="form-control form-control-lg" required>
                                <label class="form-label" for="username">Username</label>
                            </div>
                            <div class="form-outline">
                                <input type="text" name="accountname" id="accountname" class="form-control form-control-lg" required>
                                <label class="form-label" for="accountname">Account Name</label>
                            </div>
                            <div class="form-outline">
                                <input type="number" name="balance" id="balance" class="form-control form-control-lg" required min="0">
                                <label class="form-label" for="balance">Initial Balance ($)</label>
                            </div>
                            <div class="form-outline">
                                <input type="password" name="pin" id="pinInput" class="form-control form-control-lg" pattern="\d{4}" required title="PIN must be 4 digits">
                                <label class="form-label" for="pinInput">PIN (4 digits)</label>
                                <button type="button" class="btn btn-info btn-sm" id="togglePassword">Show PIN</button>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg mt-3">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="toggle-pin.js"></script>
</body>
</html>