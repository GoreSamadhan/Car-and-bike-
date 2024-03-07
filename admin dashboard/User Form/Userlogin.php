<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "journey";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM registration_form WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            if ($user_data['password'] == $password) {
                header("location: ../home.php");  // redirect to userDashboard
                exit();
            } else {
                echo "Incorrect password";
            }
        } else {
            echo "User not found";
        }
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Login Form in HTML CSS</title>
    <link rel="stylesheet" href="../User/Userlogin.css"/>
    <style>

    </style>
</head>
<body>

<div class="outer-div">
    <section class="container">
        <header>Sign In</header>
        <div class="container-form">
        <form action="Userlogin.php" method="POST" class="form">
            <div class="input-box">
                <label>Enter Your Email</label>
                <input type="text" placeholder="Enter Email" name="email" required/>
            </div>

            <div class="input-box">
                <label>Enter Your Password</label>
                <input type="password" placeholder="Password" name="password" required/>
            </div>
<br>
            <button type="submit">Sign In</button>
            <p class="Sign">If you don’t have an account<br>Create Now! <a href="UserRegistration.php" class="Login">Register</a></p>
        </form>
        <div class="form-img">
            <img src="../User/Image/registration2.png" alt="login">
        </div>
        </div>
    </section>
</div>

</body>
</html>

