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
    $full_name = $_POST['Full_Name'];
    $email = $_POST['Email'];
    $phone_number = $_POST['Phone_Number'];
    $birth_date = $_POST['Birth_Date'];

    // File upload paths
    $photo_path = "uploads/" . basename($_FILES["Upload_Photo"]["name"]);
    $license_path = "uploads/" . basename($_FILES["Upload_License"]["name"]);
    $adhar_path = "uploads/" . basename($_FILES["Upload_Adhar"]["name"]);

    // Move uploaded files to the specified folder
    move_uploaded_file($_FILES["Upload_Photo"]["tmp_name"], $photo_path);
    move_uploaded_file($_FILES["Upload_License"]["tmp_name"], $license_path);
    move_uploaded_file($_FILES["Upload_Adhar"]["tmp_name"], $adhar_path);

    // SQL query to insert data into the database
    $sql = "INSERT INTO driver (full_name, email, phone_number, birth_date, photo_path, license_path, adhar_path)
            VALUES ('$full_name', '$email', '$phone_number', '$birth_date', '$photo_path', '$license_path', '$adhar_path')";

    if ($conn->query($sql) === TRUE) {
        echo "Record added successfully";   
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
