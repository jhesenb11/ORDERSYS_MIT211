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

if(isset($_GET['CUST_CODE'])) {
    $cust_code = $_GET['CUST_CODE'];

    // Fetch agent details from the 'agents' table
    $sql = "SELECT * FROM customer WHERE CUST_CODE = '$cust_code'";
    $result = mysqli_query($conn, $sql);

    // Display agent details
    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo "<h2>Customer Details</h2>";
      
    echo "CUSTOMER CODE: " . $row['CUST_CODE'] . "<br>";
	echo "CUSTOMER NAME: " . $row['CUST_NAME'] . "<br>";				
	echo "CUSTOMER CITY: " . $row['CUST_CITY'] . "<br>";
	echo "WORKING AREA: " . $row['WORKING_AREA'] . "<br>";
	echo "COUNTRY: " .$row['CUST_COUNTRY'] . "<br>";
	echo "GRADE: " . $row['GRADE'] . "<br><br>";
	echo "OPENING AMOUNT: " . $row['OPENING_AMT'] . "<br>";
	echo "RECEIVE AMOUNT: " . $row['RECEIVE_AMT'] . "<br>";
	echo "PAYMENT AMOUNT: " . $row['PAYMENT_AMT']. "<br>";
	echo "OUTSTANDING AMOUNT: " . $row['OUTSTANDING_AMT'] . "<br>";
	echo "PHONE NUMBER: " . $row['PHONE_NO'] . "<br>";
	echo "AGENT CODE: " . $row['AGENT_CODE'] . "<br><br>";
        
         } else {
        echo "Customer not found.";
    }
} else {
    echo "Invalid request.";
}

?> 