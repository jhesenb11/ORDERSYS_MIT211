<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        div {
            margin-bottom: 15px;
        }

        span {
            font-weight: bold;
            margin-right: 10px;
            display: block;
            margin-bottom: 5px;
        }

        input[type="file"] {
            padding: 10px;
            margin-top: 5px;
        }

        input[type="text"] {
            padding: 10px;
            width: 100%;
        }

        input[type="submit"] {
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Popup styles */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
        }

        .modal {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .close-btn {
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

    </style>
    <title>File Upload</title>
    <script>
        function showSuccessMessage() {
            // Show overlay
            document.querySelector('.overlay').style.display = 'flex';
        }

        function closeOverlay() {
            // Close overlay
            document.querySelector('.overlay').style.display = 'none';
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>File Upload Form</h2>
        <?php
        if (isset($_SESSION['message']) && $_SESSION['message']) {
            printf('<b>%s</b>', $_SESSION['message']);
            unset($_SESSION['message']);
            // Call the JavaScript function after printing the PHP message
            echo '<script>showSuccessMessage();</script>';
        }
        ?>
        <form method="POST" action="upload.php" enctype="multipart/form-data">
            <div>
                <span>Upload a File:</span>
                <input type="file" name="uploadedFile" />
            </div>
            <div>
                <span>New Filename:</span>
                <input type="text" name="newFilename" />
            </div>

            <input type="submit" name="uploadBtn" value="Upload" />
        </form>
    </div>

    <!-- Popup overlay -->
    <div class="overlay">
        <!-- Popup content -->
        <div class="modal">
            <p>File successfully uploaded!</p>
            <button class="close-btn" onclick="closeOverlay()">Close</button>
        </div>
    </div>
</body>
</html>
