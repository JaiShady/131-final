

<?php
session_start(); // Start the session

include('navbar.php'); ?>



<!DOCTYPE html>
<html lang="en">
<head>
    
    
    
    <meta charset="UTF-8">
    <title>Check Deposit (Camera)</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js"></script>
    <style>
        #camera-container {
            width: 700px;
            height: 394px;
            border: 2px solid black; /* Increase border thickness */
             /* Add padding to create space for border */
        }

        #camera-container video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
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
            color: black;                 /* White text color */
            margin: 2rem;                 /* Add margin for spacing */
        }
        
        
        
        
    </style>
</head>
<body>
<div id="camera-container"></div>
<button id="capture-button">Capture Check</button>
<canvas id="captured-img" style="display: none;"></canvas>
<div id="check-info">
    
   
        
    <br>
    <form action="backend-camera-deposit.php" method="post">

        <h3 class="form-group">Username: <input type="text" name="username"></h3>
        <h3 class="form-group">account_number: <input type="text" name="account_number"></h3>
        <h3 class="form-group">balance: <input type="text" name="address"></h3>
        
        <br>

        <input class="register-btn" type="submit" value="Submit">
    </form>
    

    
    
    
<script src="camera.js"></script>  </body>
</html>


