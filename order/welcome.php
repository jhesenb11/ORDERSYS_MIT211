<?php
session_start();

// Check if the user is authenticated
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JRK Online Shopping System</title>
	<link rel="icon" type="image/x-icon" href="assets/background/BACK1.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <style>
        body {
            background-image: url("assets/background/BACK1.png");
            background-repeat: no-repeat;
            background-size: 1400px 750px;
        }

        .navbar-brand img {
            height: 40px; /* Adjust the height as needed */
            width: auto; /* Preserve aspect ratio */
        }
    </style>
</head>

<body>
   <?php
     include('header.php');
   ?>

    <script src="assets/bootstrap/js/jquery-3.5.1.slim.min.js"></script>
    <script src="assets/bootstrap/js/popper.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
