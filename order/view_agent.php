<link href="css/web20.css" rel="stylesheet" type="text/css" />
<style>

a {
  text-decoration: none; /* Remove underline */
  color: inherit; /* Inherit text color from parent */
}


</style>



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

if(isset($_GET['AGENT_CODE'])) {
    $agent_code = $_GET['AGENT_CODE'];

    // Fetch agent details from the 'agents' table
    $sql = "SELECT * FROM agents WHERE AGENT_CODE = '$agent_code'";
    $result = mysqli_query($conn, $sql);

    // Display agent details
    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "<h2>Agent Details</h2>";
        echo "Agent code: " . $row['AGENT_CODE'] . "<br>";
        echo "Agent Name: " . $row['AGENT_NAME'] . "<br>";
        echo "Working Area: " . $row['WORKING_AREA'] . "<br>";
        echo "Commission: " . $row['COMMISSION'] . "<br>";
        echo "Phone Number: " . $row['PHONE_NO'] . "<br>";
        echo "Country: " . $row['COUNTRY'] . "<br>";
         } else {
        echo "Agent not found.";
    }
} else {
    echo "Invalid request.";
}

?> 