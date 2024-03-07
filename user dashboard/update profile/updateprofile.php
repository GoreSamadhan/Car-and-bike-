
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="user_dashboard.css">
    <script src="https://kit.fontawesome.com/d93b19ad7a.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="db.php"> -->
 
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
    
        <!-- <*************Update Code*******************>
        <?php
        // Database connection
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
            $updateQuery = "UPDATE registration_form SET fullName='$newName', phoneNumber='$newNumber', email='$newEmail'"; // Replace [User ID] with the actual user ID
            
            $updateResult = mysqli_query($con, $updateQuery);

            if (!$updateResult) {
                die('Error updating profile: ' . mysqli_error($con));
            }
        }

        // Fetch the user data
        $query = "SELECT * FROM registration_form"; // Replace [User ID] with the actual user ID
        $result = mysqli_query($con, $query);

        if (!$result) {
            die('Error fetching user data: ' . mysqli_error($con));
        }

        $row = mysqli_fetch_assoc($result);
        ?>

        <!-- HTML form for profile update -->
       
<body>
    <form method="POST" action="">
        <div class="card--container" id="update_item">
            <h3 class="profile--title">Update Your Profile</h3>
            <div class="card--wrapper">
                <div class="update--card">
                    <div class="card--header">
                        <div class="amount">
                            <!-- Display current values -->
                            <span class="title">Name: <input type="text" name="name" value="<?php echo $row['fullName']; ?>"></span>
                            <span class="title">Phone No: <input type="text" name="number" required pattern="^\d{10}$" value="<?php echo $row['phoneNumber']; ?>"></span>
                            <span class="title">Email: <input type="email" name="email" value="<?php echo $row['email']; ?>"></span>
                            <!-- Submit button to trigger the update -->
                            <input type="submit" id="button" name="submit" value="Update Details">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>

</body>
</html>
