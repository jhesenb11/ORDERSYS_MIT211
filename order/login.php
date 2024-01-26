<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Here, you can perform your authentication logic
    // For demonstration purposes, let's assume the correct username is "admin" and password is "password"

    if ($username === "admin" && $password === "password") {
        // Authentication successful, set session variables
        $_SESSION["username"] = $username;
        $_SESSION["loggedin"] = true;

        // Redirect to a secure page
        header("Location: welcome.php");
        exit();
    } else {
        // Authentication failed, show error message
		$_SESSION["loggedinerror"] = true;
        $error = "Invalid username or password!";
		// Redirect to a secure page
        header("Location: index.php");
        exit();
    }
}
?>
