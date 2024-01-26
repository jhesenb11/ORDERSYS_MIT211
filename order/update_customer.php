<link href="css/web20.css" rel="stylesheet" type="text/css" />
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

        /* Shared styles for buttons */
        a {
            text-decoration: none;
            color: inherit;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .button-link {
            background-color: #3498db;
            color: #fff;
            border: 1px solid #2980b9;
            transition: background-color 0.3s ease;
        }

        .button-link:hover {
            background-color: #2980b9;
        }

        /* Form styling */
        .form-container {
            container: p-3 my-3 bg-light text-dark;
        }
    </style>
</head>

<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "order";

    // Create a connection to the MySQL database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_GET['CUST_CODE'])) {
        $cust_code = $_GET['CUST_CODE'];

        $sql = "SELECT * FROM customer WHERE CUST_CODE = '$cust_code'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
    ?>
            <!-- Edit Agent Details Form -->
            <div class="container p-3 my-3 bg-light text-dark form-container">
                <h2 class="styled-heading">Edit Customer Details</h2>
                <form method="post" action="update_customer2.php">
                    <div class="form-group">
                        <label for="CUST_CODE">Customer Code</label>
                        <input type="text" class="form-control" id="CUST_CODE" name="CUST_CODE" value="<?php echo $row['CUST_CODE']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="CUST_NAME">Customer Name</label>
                        <input type="text" class="form-control" id="CUST_NAME" name="CUST_NAME" value="<?php echo $row['CUST_NAME']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="CUST_CITY">Customer City</label>
                        <input type="text" class="form-control" id="CUST_CITY" name="CUST_CITY" value="<?php echo $row['CUST_CITY']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="WORKING_AREA">Working Area</label>
                        <input type="text" class="form-control" id="WORKING_AREA" name="WORKING_AREA" value="<?php echo $row['WORKING_AREA']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="CUST_COUNTRY">Customer Country</label>
                        <input type="text" class="form-control" id="CUST_COUNTRY" name="CUST_COUNTRY" value="<?php echo $row['CUST_COUNTRY']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="GRADE">GRADE</label>
                        <input type="text" class="form-control" id="GRADE" name="GRADE" value="<?php echo $row['GRADE']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="OPENING_AMT">Opening Amount</label>
                        <input type="text" class="form-control" id="OPENING_AMT" name="OPENING_AMT" value="<?php echo $row['OPENING_AMT']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="RECEIVE_AMT">Receive Amount</label>
                        <input type="text" class="form-control" id="RECEIVE_AMT" name="RECEIVE_AMT" value="<?php echo $row['RECEIVE_AMT']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="PAYMENT_AMT">Payment Amount</label>
                        <input type="text" class="form-control" id="PAYMENT_AMT" name="PAYMENT_AMT" value="<?php echo $row['PAYMENT_AMT']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="OUTSTANDING_AMT">Outstanding Amount</label>
                        <input type="text" class="form-control" id="OUTSTANDING_AMT" name="OUTSTANDING_AMT" value="<?php echo $row['OUTSTANDING_AMT']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="PHONE_NO">Phone Number</label>
                        <input type="text" class="form-control" id="PHONE_NO" name="PHONE_NO" value="<?php echo $row['PHONE_NO']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="AGENT_CODE">Agent Code</label>
                        <input type="text" class="form-control" id="AGENT_CODE" name="AGENT_CODE" value="<?php echo $row['AGENT_CODE']; ?>" readonly>
                    </div>

                    <button type="submit"  class="btn btn-primary">Update</button>
                </form>
            </div>
    <?php
        } else {
            echo "<p>Customer not found.</p>";
        }
    } else {
        echo "<p>Invalid request.</p>";
    }
    ?>

    <!-- Back Button -->
    <div class="align-right">
        <a href="customer.php" class="button button-link">Back</a>
    </div>

    <script src="assets/bootstrap/js/jquery-3.5.1.slim.min.js"></script>
    <script src="assets/bootstrap/js/popper.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>




