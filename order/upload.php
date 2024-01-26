<?php
session_start();

include('db_connect.php');

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newFilename = $_POST['newFilename'];

    if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {
        // get details of the uploaded file
        $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        $fileName = $_FILES['uploadedFile']['name'];
        $fileSize = $_FILES['uploadedFile']['size'];
        $fileType = $_FILES['uploadedFile']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // sanitize file-name
        $newFileName = $newFilename . '.' . $fileExtension;

        // check if file has one of the allowed extensions
        $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'xlsx', 'xls', 'docx', 'doc', 'pdf');

        if (in_array($fileExtension, $allowedfileExtensions)) {
            // directory in which the uploaded file will be moved
            $uploadFileDir = 'uploaded_files/';
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $message ='File is successfully uploaded.<br />' . $newFileName . '<br />' . $dest_path . '<br />';

                $sql = "INSERT INTO fileupload (PATH, FILENAME) VALUES (?, ?)";

                // Prepare the SQL statement
                $stmt = $mysqli->prepare($sql);

                // Bind parameters
                $stmt->bind_param("ss", $dest_path, $newFileName);

                // Execute the query
                if ($stmt->execute()) {
                    $message .= "Record inserted successfully.";
                    // Set a session variable for success message
                    $_SESSION['success_message'] = "File successfully uploaded!";
                } else {
                    $message .= "Error: " . $stmt->error;
                }

                // Close the statement
                $stmt->close();
            } else {
                $message = 'There was some error moving the file to the upload directory. Please make sure the upload directory is writable by the web server.';
            }
        } else {
            $message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
        }
    } else {
        $message = 'There is some error in the file upload. Please check the following error.<br>';
        $message .= 'Error:' . $_FILES['uploadedFile']['error'];
    }

    $mysqli->close();
}

$_SESSION['message'] = $message;

// Redirect to fileupload.php after processing
header("Location: fileupload.php");
exit; // Ensure no further code execution after redirection
?>
