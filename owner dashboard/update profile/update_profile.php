<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "journey";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$selectQuery = "SELECT ownerName, ownerEmail, ownerPhoneNo FROM ownerregistration";
$result = $conn->query($selectQuery);

if ($result->num_rows > 0) {
    // Output data of each row
    $row = $result->fetch_assoc();
    $Name = $row['ownerName'];
    $Phoneno = $row['ownerPhoneNo'];
    $Email = $row['ownerEmail'];

    

} else {
    echo "0 results";
}

$conn->close();
?>  



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
          body {
            font-family: Arial, sans-serif;
            background-color: #ebe9e9;
            margin: 0;
            padding: 0;
        }

        .card--container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile--title {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        .card--header {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            margin-bottom: 20px;
        }

        .title {
            font-size: 16px;
            margin-bottom: 10px;
            display: block;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 10px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
   
</head>
<body>


<?php
 
 $con = mysqli_connect("localhost", "root", "", "journey");
 if (!$con) {
     die("Connection failed: " . mysqli_connect_error());
 }

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Get the values from the form
    $newName = $_POST['name'];
    $newNumber = $_POST['number'];
    $newEmail = $_POST['email'];


    // Update the database with the new values
    $updateQuery = "UPDATE ownerregistration SET ownerName='$newName', ownerPhoneNo='$newNumber', ownerEmail='$newEmail' "; // Replace [User ID] with the actual user ID

    $updateResult = mysqli_query($con, $updateQuery);

    if (!$updateResult) {
        die('Error updating profile: ' . mysqli_error($con));
    }
}

// Fetch the user data
$query = "SELECT * FROM ownerregistration "; // Replace [User ID] with the actual user ID
$result = mysqli_query($con, $query);

if (!$result) {
    die('Error fetching user data: ' . mysqli_error($con));
}

$row = mysqli_fetch_assoc($result);

?>

<!-- HTML form for profile update -->
<form method="POST" action="">
    <div class="card--container" id="update_item">
        <h3 class="profile--title">Update Your Profile</h3>
        <div class="card--wrapper">
            <div class="update--card">
                <div class="card--header">
                    <div class="amount">
                        <!-- Display current values -->
                        <span class="title"><input type="text" name="name" placeholder="Update Name"
                                value="<?php echo $row['ownerName']; ?>"></span><br><br>
                        <span class="title"><input type="text" name="number" placeholder="Update Phone no."
                                value="<?php echo $row['ownerPhoneNo']; ?>"></span><br><br>
                        <span class="title"><input type="email" name="email" placeholder="Update Email"
                                value="<?php echo $row['ownerEmail']; ?>"></span><br><br>
                        <!-- <span class="title"><input type="text" name="address" placeholder="Update Address" value="<?php echo $row['']; ?>"></span><br> -->
                        <!-- Submit button to trigger the update -->
                        <input type="submit" id="button" name="submit" value="Update Details">
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <!-- <script>
        
        function f1(divId) {
            document.querySelectorAll('.card--container').forEach(div => {
                div.style.display = "none";
            });
            document.getElementById(divId).style.display = "block";
        }

       

    </script> -->
</body>

</html>