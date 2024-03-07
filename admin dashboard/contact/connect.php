<?php


// if(isset('submit'))
// {
    
// }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $email = $_POST['email'] ?? '';
    $city = $_POST['city'] ?? '';
    $message = $_POST['message'] ?? '';

    // connection 
    $conn = new mysqli('localhost', 'root', '', 'journey');
    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO contact(name, phone, email, city, message) VALUES (?, ?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("sssss", $name, $phone, $email, $city, $message);
            $stmt->execute();
            $stmt->close();
            $conn->close();
            echo "<script>alert('Successful. We will be in touch with you soon.');</script>";
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    }
}
?>
