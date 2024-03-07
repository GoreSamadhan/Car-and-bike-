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
    $owner_name = $_POST['owner_name'];
    $vehicle_name = $_POST['vehicle_name'];
    $vehicle_category = $_POST['vehicle_category'];
    $vehicle_number = $_POST['vehicle_number'];
    $vehicle_color = $_POST['vehicle_color'];
    $manufacturing_year = $_POST['manufacturing_year'];
    $price_per_km = $_POST['price_per_km'];
    $fastag_id = $_POST['fastag_id'];
    $type = implode(", ", $_POST['type']);

    // File upload paths
    $image_path = "uploads/" . basename($_FILES["Upload_Image"]["name"]);
    $puc_path = "uploads/" . basename($_FILES["Upload_PUC"]["name"]);
    $insurance_path = "uploads/" . basename($_FILES["Upload_Insurance"]["name"]);
    $rc_path = "uploads/" . basename($_FILES["Upload_RC"]["name"]);
    $permit_path = "uploads/" . basename($_FILES["Upload_Permit"]["name"]);

    // Move uploaded files to the specified folder
    move_uploaded_file($_FILES["Upload_Image"]["tmp_name"], $image_path);
    move_uploaded_file($_FILES["Upload_PUC"]["tmp_name"], $puc_path);
    move_uploaded_file($_FILES["Upload_Insurance"]["tmp_name"], $insurance_path);
    move_uploaded_file($_FILES["Upload_RC"]["tmp_name"], $rc_path);
    move_uploaded_file($_FILES["Upload_Permit"]["tmp_name"], $permit_path);

    // SQL query to insert data into the database
    $sql = "INSERT INTO vehicle (owner_name, vehicle_name, vehicle_category, vehicle_number, vehicle_color, manufacturing_year, price_per_km, fastag_id, type, image_path, puc_path, insurance_path,  rc_path, permit_path)
            VALUES ('$owner_name', '$vehicle_name', '$vehicle_category', '$vehicle_number', '$vehicle_color', '$manufacturing_year', '$price_per_km','$fastag_id', '$type', '$image_path', '$puc_path', '$insurance_path', '$rc_path', '$permit_path')";

    if ($conn->query($sql) === TRUE) {
        echo "Record added successfully";   
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
