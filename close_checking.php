<html>
<head>
    <title>Checking Account Creation</title>
    <style>
        h1 {
            color: darkgreen;
        }
        body {
            background-color: lightgray;
        }
        input[type=button],
        input[type=submit] {
            background-color: darkblue;
            border: none;
            color: #fff;
            padding: 15px 30px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1><center>Checking Account closure</h1>
    <form action="backend_close_checking.php" method="post">
        <h3>Username: <input type="text" name="username"></h3>
        <h3>Account number: <input type="text" name="account_number"></h3>
        <h3> PIN : <input type="text" name="pin"></h3>
        <br>
        <input type="submit" value="Close Account">
    </form>
</body>
</html>
