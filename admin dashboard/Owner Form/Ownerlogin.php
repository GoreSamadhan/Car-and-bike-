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
    $ownerEmail = $_POST['ownerEmail'];
    $ownerPassword = $_POST['ownerPassword'];

    $query = "SELECT * FROM ownerregistration WHERE ownerEmail = '$ownerEmail' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            if ($user_data['ownerPassword'] == $ownerPassword) {
            echo "<script>";
            echo "window.location.href='home.php'"; // Redirect to Owners dashboard
            echo"</script>";
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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Login Form in HTML CSS</title>
    <link rel="stylesheet" href="../Owner/Ownerlogin.css" />
</head>

<body>
    <div class="outer-div">
        <section class="container">
            <header class="lg-heading">Sign In</header>
            <div class="container-form">
                <form action="Ownerlogin.php" method="POST" class="form">
                    <div class="input-box">
                        <label>Email Address</label>
                        <input type="text" placeholder="Enter email address" name="ownerEmail" required />
                    </div>

                    <div class="input-box">
                        <label>Password</label>
                        <input type="password" placeholder="Password" name="ownerPassword" required />
                    </div>

                    <button type="submit">Sign In</button>
                    <p class="Sign">If you don’t have an account, register<br>You can Register here! <a
                            href="OwnerRegistration.php" class="Login">Register</a></p>
                </form>
                <div class="form-img">
                    <img src="../Owner/images/Login.png" alt="login">
                </div>
            </div>
        </section>
    </div>

</body>

</html>