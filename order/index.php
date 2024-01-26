<?php
session_start();

if (isset($_SESSION['loggedinerror'])) {
	
	    echo '<div class="error-message">';
        echo '<h5>Login Error</h5>';
        echo '<p>Invalid username or password. Please try again.</p>';
        echo '</div>';

        // Clear the login error flag
        unset($_SESSION['loggedinerror']);
	
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JRK ONLINE SHOPPING SYSTEM</title>
	<link rel="icon" type="image/x-icon" href="assets/background/online2.png">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">    
<style>
        body {
            background-image: url("assets/background/online2.png");
            background-repeat: no-repeat;
            background-size: 650px 650px;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
		
		.error-message {
            position: fixed;
			top: 10%;
			left: 50%;
			transform: translateX(-50%);
			background-color: #f8d7da;
			padding: 20px;
			border-radius: 5px;
			z-index: 9999;
        }
		
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">JRK ONLINE SHOPPING SYSTEM</h3>
                        <form method="POST" action="login.php">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>