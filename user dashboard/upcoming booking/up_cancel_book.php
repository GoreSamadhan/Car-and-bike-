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

// Get the ID from the URL parameter
$id = $_GET['id'];

// Fetch the record from the apply table
$sqlSelect = "SELECT * FROM `upcoming_booking` WHERE `id` = $id";
$resultSelect = $conn->query($sqlSelect);

if ($resultSelect->num_rows > 0) {
    // Fetch the record data
    $record = $resultSelect->fetch_assoc();

    // Insert the record into the shorted table
    $sqlInsert = "INSERT INTO `cancelled_booking` VALUES (
        {$record['id']},
        '{$record['Cname']}',
        '{$record['Cemail']}',
        '{$record['Cmobile']}',
        '{$record['pick_location']}',
        '{$record['drop_location']}',
        '{$record['date']}',
        '{$record['pick_time']}',
        '{$record['vehicle_name']}',
        '{$record['distance']}',
        '{$record['price_per_km']}'
        
    )";

    if ($conn->query($sqlInsert) === TRUE) {
        // Delete the record from the apply table
        $sqlDelete = "DELETE FROM `upcoming_booking` WHERE `id` = $id";
        if ($conn->query($sqlDelete) === TRUE) {
            echo "Record cancelled successfully.";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        echo "Error inserting record into cancelled_booking table: " . $conn->error;
    }
} else {
    echo "Record not found in the apply table.";
}

// Close the connection
$conn->close();
?>
