<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Bank Login</title>
    <style>
        .registration-title {
            margin-bottom: 2rem;  /* Adjust the value for desired spacing */
        }
        .register-btn {
            background-color: #4C6E99;  /* Darker blue for the button */
            color: white;               /* White text for the button */
            border: none;                /* Remove default border */
            padding: 1rem 2rem;          /* Add padding for spacing */
            border-radius: 5px;          /* Rounded corners */
            font-size: 1.1rem;           /* Increase font size slightly */
            cursor: pointer;             /* Indicate clickable behavior */
        }
        .form-group {
            margin-bottom: 2rem;      /* Increased spacing (4rem) */
        }
        body {
            background-color: #212529;
            color: white;                 /* White text color */
            margin: 2rem;                 /* Add margin for spacing */
        }
    </style>
</head>

<body>


<h1 class="registration-title"><center>Profile Registration</h1>

<form action="process.php" method="post">

    <h3 class="form-group">Username: <input type="text" name="username"></h3>
    <h3 class="form-group">Password: <input type="text" name="password"></h3>
    <h3 class="form-group">First Name: <input type="text" name="first name"></h3>
    <h3 class="form-group">Last Name: <input type="text" name="last name"></h3>
    <h3 class="form-group">Address: <input type="text" name="address"></h3>
    <h3 class="form-group">City: <input type="text" name="city"></h3>
    <h3 class="form-group">Zip Code: <input type="text" name="zip"></h3>
    <h3 class="form-group">Driver's License Number: <input type="text" name="DriverL"></h3>
    <h3 class="form-group">Social Security Number (SSN): <input type="text" name="SSN"></h3>
    <br>

    <input class="register-btn" type="submit" value="Register">
</form>

<script src="ssn-masking.js"></script>

</body>

</html>