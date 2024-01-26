<link href="css/web20.css" rel="stylesheet" type="text/css" />
<style>

a {
  text-decoration: none; /* Remove underline */
  color: inherit; /* Inherit text color from parent */
}


</style>


<?php
// Connect to the database using mysqli
$conn = mysqli_connect('localhost', 'root', '', 'order');

// Check if the database connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to fetch order details based on CUST_CODE and AGENT_CODE
function getOrderDetails($conn, $CUST_CODE, $AGENT_CODE) {
    $stmt = mysqli_prepare($conn, "SELECT * FROM orders WHERE CUST_CODE = ? AND AGENT_CODE = ?");
    mysqli_stmt_bind_param($stmt, "ss", $CUST_CODE, $AGENT_CODE);
    mysqli_stmt_execute($stmt);

    // Bind result variables
    mysqli_stmt_bind_result($stmt, $ORD_NUM, $ORD_AMOUNT, $ADVANCE_AMOUNT, $ORD_DATE, $o_CUST_CODE, $o_AGENT_CODE, $ORD_DESCRIPTION);

    // Fetch order details
    $result = mysqli_stmt_fetch($stmt);

    // Close the statement
    mysqli_stmt_close($stmt);

    return $result ? compact('ORD_NUM', 'ORD_AMOUNT', 'ADVANCE_AMOUNT', 'ORD_DATE', 'o_CUST_CODE', 'o_AGENT_CODE', 'ORD_DESCRIPTION') : null;
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if CUST_CODE and AGENT_CODE are set in the form
    if (isset($_POST['CUST_CODE']) && isset($_POST['AGENT_CODE'])) {
        // Sanitize and validate parameters
        $CUST_CODE = mysqli_real_escape_string($conn, $_POST['CUST_CODE']);
        $AGENT_CODE = mysqli_real_escape_string($conn, $_POST['AGENT_CODE']);

        // Fetch order details
        $orderDetails = getOrderDetails($conn, $CUST_CODE, $AGENT_CODE);

        // Display order details
        if ($orderDetails) {
            // Output the fetched data
            echo "ORD_NUM: " . $orderDetails['ORD_NUM'] . "<br>";
            echo "ORD_AMOUNT: " . $orderDetails['ORD_AMOUNT'] . "<br>";
            echo "ADVANCE_AMOUNT: " . $orderDetails['ADVANCE_AMOUNT'] . "<br>";
            echo "ORD_DATE: " . $orderDetails['ORD_DATE'] . "<br>";
            echo "ORD_DESCRIPTION: " . $orderDetails['ORD_DESCRIPTION'] . "<br>";
        } else {
            echo "No results found";
        }
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Order Details</title>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="CUST_CODE">Customer Code:</label>
        <input type="text" name="CUST_CODE" required>

        <label for="AGENT_CODE">Agent Code:</label>
        <input type="text" name="AGENT_CODE" required>

        <button type="submit">View Order Details</button>
    </form>
</body>
</html>
