<?php
include 'connection.php';

// Fetch data from feedback table
$query = "SELECT * FROM `feedback`";
$result = mysqli_query($connection, $query);

if ($result) {
    // Check if there are rows in the result
    if (mysqli_num_rows($result) > 0) {
        // Fetch and display data
        while ($row = mysqli_fetch_assoc($result)) {
            echo "ID: " . $row['fid'] . "<br>";
            echo "Name: " . $row['fName'] . "<br>";
            echo "Email: " . $row['fPhoneNo']. "<br>";
            echo "Message: " . $row['feedback'] . "<br>";
           
        }
    } else {
        echo "No records found in the feedback table.";
    }

    // Free result set
    mysqli_free_result($result);
} else {
    echo "Error: " . mysqli_error($connection);
}

// Close the connection
mysqli_close($connection);
?>
