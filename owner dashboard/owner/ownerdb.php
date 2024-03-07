<?php


// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "journey";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Get form data
    $ownerName = $_POST["ownerName"];
    $ownerEmail = $_POST["ownerEmail"];
    $ownerPhoneNo = $_POST["ownerPhoneNo"];
    $ownerDocu = $_POST["ownerDocu"];
   
    

    // File upload paths
    $ownerDocuImg = "uploads/" . basename($_FILES["Upload_Photo"]["name"]);

    // Move uploaded files to the specified folder
    move_uploaded_file($_FILES["Upload_Photo"]["tmp_name"], $ownerDocuImg);

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("INSERT INTO ownerregistration (ownerName, ownerEmail, ownerPhoneNo, ownerDocu, ownerDocuImg) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $ownerName, $ownerEmail, $ownerPhoneNo, $ownerDocu, $ownerDocuImg);

    if ($stmt->execute()) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>



