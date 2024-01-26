<link href="css/web20.css" rel="stylesheet" type="text/css" />
<style>

a {
  text-decoration: none; /* Remove underline */
  color: inherit; /* Inherit text color from parent */
}

/* Style for the button link */
.button-link {
  display: inline-block; /* Make it a block-level element */
  padding: 10px 20px; /* Adjust padding as needed */
  background-color: #3498db; /* Set background color */
  color: #fff; /* Set text color */
  border: 1px solid #2980b9; /* Add a border */
  border-radius: 5px; /* Add border-radius for rounded corners */
  transition: background-color 0.3s ease; /* Add a smooth transition for background color */
}

/* Hover effect */
.button-link:hover {
  background-color: #2980b9; /* Change background color on hover */
}

.styled-heading {
  background-color: #3498db; /* Set the background color */
  color: #fff; /* Set the text color */
  padding: 10px; /* Add padding for spacing */
  border-radius: 5px; /* Add border-radius for rounded corners */
}
}


</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Style the button */
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            border: 1px solid #3498db;
            color: #3498db;
            border-radius: 5px;
        }

        /* Add hover effect */
        .button:hover {
            background-color: #3498db;
            color: #fff;
        }

        /* Align the button to the right */
        .align-right {
            text-align: right;
        }
    </style>
</head>
<body>
  <div class="align-right">
        <a href="agent.php" class="button">BACK</a>
    </div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/x-icon" href="assets/background/cart.jpg">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <style>
        body {
            background-image: url("assets/background/BACK1.png");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .navbar-brand img {
            height: 40px; /* Adjust the height as needed */
            width: auto; /* Preserve aspect ratio */
        }
    </style>
</head>


<?php
$servername = "localhost"; // Your MySQL server address
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "order"; // Name of the database

// Create a connection to the MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the HTML form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $agent_code = $_POST['AGENT_CODE'];
    $agent_name = $_POST['AGENT_NAME'];
    $WORKING_AREA = $_POST['WORKING_AREA'];
    $COMMISSION = $_POST['COMMISSION'];
    $PHONE_NO = $_POST['PHONE_NO'];
    $COUNTRY = $_POST['COUNTRY'];

    echo "AGENT_CODE: " . $agent_code . "<br>";
    echo "AGENT_NAME: " . $agent_name . "<br>";
    echo "WORKING_AREA: " . $WORKING_AREA . "<br>";
    echo "COMMISSION: " . $COMMISSION . "<br>";
    echo "PHONE_NO: " . $PHONE_NO . "<br>";
    echo "COUNTRY: " . $COUNTRY . "<br><br>";

    // Update agent details in the 'agents' table
    $sql = "UPDATE agents SET AGENT_NAME = '$agent_name', WORKING_AREA = '$WORKING_AREA', COMMISSION = '$COMMISSION', PHONE_NO = '$PHONE_NO', COUNTRY = '$COUNTRY' WHERE AGENT_CODE = '$agent_code'";
    $result = mysqli_query($conn, $sql);

    // Check if the update was successful
    if ($result) {
        echo "Agent details updated successfully.";
    } else {
        echo "Error updating agent details: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}

// Close the database connection
$conn->close();
?>