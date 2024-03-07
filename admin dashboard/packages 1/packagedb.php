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
    //$name = $_POST["name"];
    $package_title = $_POST["package_title"];
    $from_location = $_POST["from_location"];
    $to_location = $_POST["to_location"];
    $journey_date = $_POST["journey_date"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $termsAndCondition1 = $_POST["termsAndCondition1"];
    $termsAndCondition2 = $_POST["termsAndCondition2"];
    $termsAndCondition3 = $_POST["termsAndCondition3"];
    $termsAndCondition4 = $_POST["termsAndCondition4"];
    $termsAndCondition5 = $_POST["termsAndCondition5"];
    $termsAndCondition6 = $_POST["termsAndCondition6"];
    $termsAndCondition7 = $_POST["termsAndCondition7"];
    $termsAndCondition8 = $_POST["termsAndCondition8"];
    $termsAndCondition9 = $_POST["termsAndCondition9"];
    $termsAndCondition10 = $_POST["termsAndCondition10"];

    $coupon_code = $_POST["coupon_code"];

    $category = $_POST["category"];

    // File upload paths ../../CAR/Packages/
    $package_image_path = "../../CAR/Packages/uploads/" . basename($_FILES["Upload_Photo"]["name"]);
   

    // Move uploaded files to the specified folder
    move_uploaded_file($_FILES["Upload_Photo"]["tmp_name"], $package_image_path);

    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("INSERT INTO packages (package_title, from_location, to_location, journey_date, price, description,termsAndCondition1,termsAndCondition2,termsAndCondition3,termsAndCondition4,termsAndCondition5,termsAndCondition6,termsAndCondition7,termsAndCondition8,termsAndCondition9,termsAndCondition10,coupon_code,category, package_image) VALUES (  ?,?, ?, ?, ?, ?, ?, ?,?,?,?,?, ?, ?, ?,?,?,?,?)");
    $stmt->bind_param("sssssssssssssssssss", $package_title, $from_location, $to_location, $journey_date, $price, $description, $termsAndCondition1, $termsAndCondition2, $termsAndCondition3, $termsAndCondition4, $termsAndCondition5, $termsAndCondition6, $termsAndCondition7, $termsAndCondition8, $termsAndCondition9, $termsAndCondition10, $coupon_code, $category, $package_image_path);

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