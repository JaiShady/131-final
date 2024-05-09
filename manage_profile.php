<html>
<head>
    <title>Profile Account deletion</title>
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
    <h1><center>Profile Account deletion</h1>

         <h2><center>NOTE: UPON DELETION WE WILL NOT KEEP YOUR FILES ON HAND </h2>

    <form action="backend_manage_profile.php" method="post">
        <h3>Username: <input type="text" name="username"></h3>
        <h3>Zip: <input type="text" name="zip"></h3>
        <h3> Drivers License: <input type="text" name="DriverL"></h3>
        <h3>Social Security Number: <input type="text" name="SSN"></h3>
        <br>
        <input type="submit" value="Delete Account">
    </form>
</body>
</html>
