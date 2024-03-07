<?php
$servername = "localhost";
$username = "root";
$ownerPassword = "";
$dbname = "journey";

$conn = new mysqli($servername, $username, $ownerPassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $birthDate = $_POST['birthDate'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validate ownerPasswords match
    if ($password !== $confirmPassword) {
        echo "Error: ownerPasswords do not match.";
        $conn->close();
        exit;
    }

    // Use prepared statements to prevent SQL injection
    $query = $conn->prepare("INSERT INTO registration_form (fullName, email, phoneNumber, birthDate,gender, password, confirmPassword) 
                              VALUES (?, ?, ?, ?, ?, ?,?)");

    $query->bind_param("sssssss", $fullName, $email, $phoneNumber, $birthDate, $gender, $password, $confirmPassword);

    if ($query->execute()) {
        echo "New record inserted successfully";
        echo "<script>";
        echo "window.location.href='Userlogin.php'";
        echo"</script>";
    } else {
        echo "Error: " . $query->error;
    }

    $query->close();
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Registration Form in HTML CSS</title>
    <link rel="stylesheet" href="../User/Registration.css">
    <style>
    </style>
</head>
<body>

    <div class="outer-div">
        <section class="container">
            <header class="lg-heading">Sign Up</header>
            <div class="container-form">
                <div class="form-img">
                    <img src="../User/Image/Registration2.png" alt="reg-img">
                </div>

                    <form action="UserRegistration.php" class="form" method="POST">
        
                    <div class="input-box">
                            <label>User Name</label>
                            <input type="text" placeholder="Enter Full name" name="fullName" required />
                        </div>
                
                        <div class="input-box">
                            <label>Enter Email</label>
                            <input type="text" placeholder="Enter Email" name="email" required />
                        </div>

                        <div class="column column1">
                            <div class="input-box">
                                <label>Mobile Number</label>
                                <input type="tel" placeholder="Enter Mobile No" name="phoneNumber" pattern="[0-9]{10}"
                                    title="Enter a valid 10-digit phone number"   required />
                            </div>
                            <div class="input-box">
                                <label>Birth Date</label>
                                <input type="date" placeholder="Enter Birth Date" name="birthDate" required />
                            </div>
                        </div>

                        <div class="column radio">
                            <input type="radio" id="Male" name="gender" value="Male">
                            <label for="html">Male</label>
                            <input type="radio" id="Female" name="gender" value="Female">
                            <label for="css">Female</label>
                        </div>
                        <div class="input-box">
                            <label>Password</label>
                            <input type="Password" placeholder="Enter Password" name="password" id="password"
                                required />
                        </div>
                        <div class="input-box">
                            <label>Confirm Password</label>
                            <input type="Password" placeholder="Confirm Password" name="confirmPassword" required />
                        </div>

                        <button type="submit">Submit</button>
                        <button type="reset">Cancel</button>
                        <p class="Sign">Already have an account? <a href="Userlogin.php" class="Login">Login</a></p>
                    </form>

                </div>
        </section>
    </div>

</body>

</html>
