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
        .close-btn {
            background-color: #4C6E99;  /* Darker blue for the button */
            color: white;               /* White text for the button */
            border: none;                /* Remove default border */
            padding: 1rem 2rem;          /* Add padding for spacing */
            border-radius: 5px;          /* Rounded corners */
            font-size: 1.1rem;           /* Increase font size slightly */
            cursor: pointer;             /* Indicate clickable behavior */
        }
        .form-group {
            margin-bottom: 3rem;      /* Increased spacing (4rem) */
        }
        body {
            background-color: #212529;
            color: white;                 /* White text color */
            margin: 2rem;                 /* Add margin for spacing */
        }
    </style>
</head>
<body>
<h1><Center>Checking Account Closure</h1> <!-- Modified title styling -->
<form action="backend_close_checking.php" method="post">
    <div>
        <h3 class="form-group">Username: <input type="text" name="username"></h3>
    </div>
    <div>
        <h3 class="form-group">Account number: <input type="text" name="account_number"></h3>
    </div>
    <div>
        <h3 class="form-group"> PIN : <input type="text" name="pin"></h3>
    </div>
    <br>
    <input class="close-btn" type="submit" value="Close Account">
</form>
</body>
</html>
