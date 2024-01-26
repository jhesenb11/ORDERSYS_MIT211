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

    if (isset($_GET['AGENT_CODE'])) {
        $agent_code = $_GET['AGENT_CODE'];

        $sql = "SELECT * FROM agents WHERE AGENT_CODE = '$agent_code'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
    ?>
            <!-- Edit Agent Details Form -->
            <div class="container p-3 my-3 bg-light text-dark form-container">
                <h2 class="styled-heading">Edit Agent Details</h2>
                <form method="post" action="update_agent2.php">
                    <div class="form-group">
                        <label for="AGENT_CODE">Agent Code</label>
                        <input type="text" class="form-control" id="AGENT_CODE" name="AGENT_CODE" value="<?php echo $row['AGENT_CODE']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="AGENT_NAME">Agent Name</label>
                        <input type="text" class="form-control" id="AGENT_NAME" name="AGENT_NAME" value="<?php echo $row['AGENT_NAME']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="WORKING_AREA">Working Area</label>
                        <input type="text" class="form-control" id="WORKING_AREA" name="WORKING_AREA" value="<?php echo $row['WORKING_AREA']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="COMMISSION">Commission</label>
                        <input type="text" class="form-control" id="COMMISSION" name="COMMISSION" value="<?php echo $row['COMMISSION']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="PHONE_NO">Phone Number</label>
                        <input type="text" class="form-control" id="PHONE_NO" name="PHONE_NO" value="<?php echo $row['PHONE_NO']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="COUNTRY">Country</label>
                        <input type="text" class="form-control" id="COUNTRY" name="COUNTRY" value="<?php echo $row['COUNTRY']; ?>" required>
                    </div>

                    <button type="submit"  class="btn btn-primary">Update</button>
                </form>
            </div>
    <?php
        } else {
            echo "<p>Agent not found.</p>";
        }
    } else {
        echo "<p>Invalid request.</p>";
    }
    ?>

    <!-- Back Button -->
    <div class="align-right">
        <a href="agent.php" class="button button-link">Back</a>
    </div>

    <script src="assets/bootstrap/js/jquery-3.5.1.slim.min.js"></script>
    <script src="assets/bootstrap/js/popper.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>




