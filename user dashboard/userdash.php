<!-- ********* php connectivity********* -->
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "journey";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if (!$con) {
    die("Connection failed:");
}

?>

<!-- <?php
// require_once('config');
$query = "SELECT * FROM registration_form WHERE userID";
$name = $row['fullName'];
$result = mysqli_query($con, $query);

if (!$result) {
    die('Error: ' . mysqli_error($con));
}

$query1 = "UPDATE registration_form SET name=' '  WHERE name='$name'";
?> -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="userdash.css">
    <script src="https://kit.fontawesome.com/d93b19ad7a.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="db.php"> -->
</head>

<body>
    <div class="sidebar">
        <div class="logo"></div>
        <ul class="menu" id="navbar1">
            <li class="active" onclick="f1('user--info')">
                <a href="#"><span>Dashboard </span></a>
            </li>
            <li onclick="f1('current_item')">
                <a href="#"> <span> Current Bookings </span></a>
            </li>
            <li onclick="f1('upcoming_item')">
                <a href="#"><span> Upcoming Bookings </span></a>
            </li>
            <li onclick="f1('previous_item')">
                <a href="#"><span> Previous Bookings </span></a>
            </li>
            <li onclick="f1('cancelled_item')">
                <a href="#"><span> Cancelled Bookings</span></a>
            </li>
            <li class="image" onclick="f1('update_item')">
                <a href="#"><span> Update Profile </span></a>
            </li>
            <li onclick="f1('applied_item')">
                <a href="#"><span> Applied Coupans </span></a>
            </li>
            <li onclick="f1('logout_item')">
                <a href="#"><span> Logout</span></a>
            </li>
        </ul>
    </div>

    <div class="main--content">
        <div class="header--wrapper">
            <div class="header--title">
                <input type="checkbox" id="check">
                <label for="check" class="bar"><i class="fa-solid fa-bars" onclick="toggleNavbar()"></i></label>
                <h2>Dashboard</h2>
            </div>

            <!-- Profile info -->
            <div onclick="f1('user--info')" class="user--info">
                <img src="profile.png" alt="">
            </div>
        </div>



        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            ?>

            <div class="card--container" id="user--info">

                <h3 class="profile--title">Profile</h3>
                <div class="card--wrapper">
                    <div class="profile--card">
                        <div class="card--header">
                            <div class="amount">
                                <img src="profile.png" alt="">
                                <span class="title" id="fullName">Name :-
                                    <?php echo $row['fullName']; ?>
                                </span><br>
                                <span class="title">Phone no.:-
                                    <?php echo $row['phoneNumber']; ?>
                                </span><br>
                                <span class="title">Email :-
                                    <?php echo $row['email']; ?>
                                </span><br>
                                <span class="title">Birth Date:-
                                    <?php echo $row['birthDate']; ?>
                                </span><br>
                                <span class="amount--value"></span>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
            <?php
        }
        ?>


        <!-- <*************Update Code*******************> -->
        <?php

        // Database connection
        // $con = mysqli_connect("localhost", "root", "", "journey");
        // if (!$con) {
        //     die("Connection failed: " . mysqli_connect_error());
        // }
        
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            // Get the values from the form
            $newName = $_POST['name'];
            $newNumber = $_POST['number'];
            $newEmail = $_POST['email'];


            // Update the database with the new values
            $updateQuery = "UPDATE registration_form SET fullName='$newName', phoneNumber='$newNumber', email='$newEmail' "; // Replace [User ID] with the actual user ID
        
            $updateResult = mysqli_query($con, $updateQuery);

            if (!$updateResult) {
                die('Error updating profile: ' . mysqli_error($con));
            }
        }

        // Fetch the user data
        $query = "SELECT * FROM registration_form "; // Replace [User ID] with the actual user ID
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
                                <span class="title">Name:-<input type="text" name="name" "
                                        value=" <?php echo $row['fullName']; ?>"></span><br>
                                <span class="title">Phone No:-<input type="text" name="number" required
                                        pattern="^\d{10}$" value="<?php echo $row['phoneNumber']; ?>"></span><br>
                                <span class="title">Email:-<input type="email" name="email" "
                                        value=" <?php echo $row['email']; ?>"></span><br>
                                <!-- <span class="title"><input type="text" name="address" placeholder="Update Address" value="<?php echo $row['']; ?>"></span><br> -->
                                <!-- Submit button to trigger the update -->
                                <button type="submit" id="button" name="submit" value="Update Details" value="submit"
                                    onclick="hardRefresh()">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>




        <div class="card--container" id="dash_item">
            <h3 class="main--title">Dashboard</h3>
            <div class="card--wrapper">
                <div class="prev--card">
                    <div class="card--header">
                        <div class="amount">
                            <span class="title"></span><br>
                            <span class="title"></span>
                            <span class="title"></span>
                            <span class="title">You Saved</span><br>
                            <span class="amount--value">Rs 5599</span>
                        </div>
                        <!-- <i class="icon">Rs</i> -->
                    </div>

                </div>

            </div>
        </div>


        <!-- -----------------------------Current Booking-------------------- -->

        <div class="card--container" id="current_item">
            <h3 class="main--title">Yours Current Bookings</h3>
            <div class="card--wrapper">
                <div class="prev--card">
                    <div class="card--header">
                        <div class="amount">
                            <span class="title">Booking Date 12/02/2024/</span><br>
                            <span class="title">Location :- Pune to Mumbai</span>
                            <span class="title">Vehicel Name :- Swift Desire</span>
                            <span class="title">Driver Name:- Vishal abc</span><br>
                            <span class="amount--value">Amount :- Rs 500.00</span>
                        </div>

                    </div>

                </div>

            </div>
        </div>

        <div class="card--container" id="upcoming_item">
            <h3 class="main--title">Your Upcoming Bookings</h3>
            <div class="card--wrapper">
                <div class="prev--card">
                    <div class="card--header">
                        <div class="amount">
                            <span class="title">Booking Date 12/02/2024</span><br>
                            <span class="title">Location Pune to Mumbai</span>
                            <span class="title">Vehicel Name Swift Desire</span>
                            <span class="title">Driver Name Vishal abc</span><br>
                            <span class="amount--value">Amount :- Rs 500.00</span>
                        </div>
                        <!-- <i class="icon">Rs</i> -->
                    </div>
                    <!-- <span class="card-detail">*** **** 3433</span> -->
                </div>

            </div>
        </div>
    </div>



    <div class="card--container" id="previous_item">
        <h3 class="main--title">Your Previous Bookings</h3>
        <div class="card--wrapper">
            <div class="prev--card">
                <div class="card--header">
                    <div class="amount">
                        <span class="title">Booking Date 12/12/2023</span><br>
                        <span class="title">Location Pune to Mumbai</span>
                        <span class="title">Vehicel Name Swift Desire</span>
                        <span class="title">Driver Name Vishal abc</span><br>
                        <span class="amount--value">Rs 500.00</span>
                    </div>
                    <!-- <i class="icon">Rs</i> -->
                </div>
                <!-- <span class="card-detail">*** **** 3433</span> -->
            </div>

        </div>
    </div>
    <div class="card--container" id="cancelled_item">
        <h3 class="main--title">Your Cancelled Bookings</h3>
        <div class="card--wrapper">
            <div class="prev--card">
                <div class="card--header">
                    <div class="amount">
                        <span class="title">Booking Date 18/01/2024</span><br>
                        <span class="title">Location Pune to lonavala</span>
                        <span class="title">Vehicel Name Swift Desire</span>
                        <span class="title"></span><br>
                        <span class="amount--value"></span>
                    </div>
                    <!-- <i class="icon">Rs</i> -->
                </div>
                <!-- <span class="card-detail">*** **** 3433</span> -->
            </div>

        </div>
    </div>




    <div class="card--container " id="applied_item">
        <h3 class="main--title">Your Applied Coupan</h3>
        <div class="card--wrapper">
            <div class="prev--card">
                <div class="card--header">
                    <div class="amount">
                        <span class="title">Booking Date dd/mm//yy</span><br>
                        <span class="title">Location Pune to Mumbai</span>
                        <span class="title">Vehicel Name Swift Desire</span>
                        <span class="title">Driver Name Vishal abc</span><br>
                        <span class="amount--value">Rs 500.00</span>
                    </div>
                    <!-- <i class="icon">Rs</i> -->
                </div>
                <!-- <span class="card-detail">*** **** 3433</span> -->
            </div>

        </div>
    </div>



    </div>


    <script>
        document.getElementById("user--info").style.display = "block";
        function f1(divId) {
            document.querySelectorAll('.card--container').forEach(div => {
                div.style.display = "none";
            });
            document.getElementById(divId).style.display = "block";
        }

        function hardRefresh() {
            document.getElementById("myForm").submit();
            location.reload(); // Reload the page
        }


    </script>
    <script>
        function openbar() {
            var menu = document.querySelector(".menu");
            menu.style.right = "0%";
        }
        function openebar() {
            var menu = document.querySelector(".menu");
            menu.style.left = "-100%";
        }
    </script>
    <!-- JavaScript for toggling navigation bar -->
    <script>
        function toggleNavbar() {
            console.log("Hello");
            // Get the navigation bar element (assuming the class is used for the navbar)
            var navbar1 = document.getElementById('navbar1');

            // Toggle the display property
            if (navbar1.style.display === 'none' || navbar1.style.display === '') {
                navbar1.style.display = 'block';
            } else {
                navbar1.style.display = 'none';
            }
        }

        function f1(id) {
            // Function logic for f1
            console.log("Function f1 called with ID: " + id);
        }
    </script>
    <style>
        /* Add your styles here */
        .nav-bar {
            display: none;
        }
    </style>


</body>

</html>