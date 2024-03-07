<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$database = "journey";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ownerName = $_POST["ownerName"];
    $ownerEmail = $_POST["ownerEmail"];
    $ownerPhoneNo = $_POST["ownerPhoneNo"];
    $ownerDocu = $_POST["ownerDocu"];
    // Handle file upload
    $ownerDocuImg = uploadFile();

    $ownerPassword = $_POST["ownerPassword"];

    // Hash the password before storing it in the database
    $hashedPassword = password_hash($ownerPassword, PASSWORD_DEFAULT);

    // Insert data into the database
    $sql = "INSERT INTO ownerregistration (ownerName, ownerEmail, ownerPhoneNo, ownerDocu, ownerDocuImg, ownerPassword) VALUES ('$ownerName', '$ownerEmail', '$ownerPhoneNo', '$ownerDocu', '$ownerDocuImg', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
 

function uploadFile()
{
    $targetDirectory = "uploads/";

    // Check if "ownerDocuImg" key exists and is not null in $_FILES
    if (isset($_FILES["ownerDocuImg"]) && is_array($_FILES["ownerDocuImg"])) {

        $targetFile = $targetDirectory . basename($_FILES["ownerDocuImg"]["name"]);
        $uploadOk = 1;

        // Check if file was uploaded successfully
        if (!isset($_FILES["ownerDocuImg"]["error"]) || is_array($_FILES["ownerDocuImg"]["error"])) {
            die("Invalid parameters.");
        }

        // Check for file upload errors
        switch ($_FILES["ownerDocuImg"]["error"]) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                die("No file sent.");
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                die("Exceeded file size limit.");
            default:
                die("Unknown errors.");
        }

        // Check if file already exists
        if (file_exists($targetFile)) {
            die("Sorry, file already exists.");
        }

        // Check file size
        if ($_FILES["ownerDocuImg"]["size"] > 500000) {
            die("Sorry, your file is too large.");
        }

        // Allow certain file formats
        $allowedFormats = array("jpg", "jpeg", "png", "webp");
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        if (!in_array($imageFileType, $allowedFormats)) {
            die("Sorry, only JPG, JPEG, PNG, and WEBP files are allowed.");
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            die("Sorry, your file was not uploaded.");
        } else {
            // Move the uploaded file to the target directory
            if (move_uploaded_file($_FILES["ownerDocuImg"]["tmp_name"], $targetFile)) {
                return $targetFile; // Return the file path to store in the database
            } else {
                die("Sorry, there was an error uploading your file.");
            }
        }
    } else {
        die("Invalid parameters.");
    }
}
