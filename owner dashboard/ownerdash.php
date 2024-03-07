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

<?php
include 'connection.php';  
$query = "select * from vehicle";  
$run = mysqli_query($connection,$query);  
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="ownerdash.css">
</head>

<body>
   
    <div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li class="active" onclick="f1('user--info')" id="click">
                <a href="#"><span>Dashboard </span></a>
            </li>
            <li onclick="f1('vehicle_item')" id="click">
                <a href="#"><span> Manage Vehicles </span></a>
            </li>
            <li onclick="f1('driver_item')" id="click">
                <a href="#"><span> Manage Drivers </span></a>
            </li>
            <li onclick="f1('payment_item')" id="click">
                <a href="#"><span> Payment received </span></a>
            </li>
            
            <li onclick="f1('update_item')" id="click">
                <a href="#"><span> Update Profile </span></a>
            </li>
            
            <li onclick="f1('logout_item')" id="click">
                <a href="#"><span> Logout</span></a>
            </li>

            <!-- <li onclick="f1('user--info')" id="click">
                <a href="#"><span>  </span></a>
            </li> -->

        </ul>
    </div>

    <div class="main--content">
        <div class="header--wrapper">
            <div class="header--title">
                <span>Owner</span>
                <h2>Dashboard</h2>
            </div>


            <!-- *********profile info******** -->

            <div onclick="f1('user--info')" id="click" class="user--info"   id="user--info">
                <img src="profile.png" alt="" >
            </div>
        </div>

        <div class="card--container" id="user--info">
            <h3 class="profile--title">Profile</h3>
            <div class="card--wrapper">
                <div class="profile--card">
                    <div class="card--header">
                        <div class="amount">
                            <img src="profile.png" alt="">
                            <span class="title">Name:-  <?php echo $Name ; ?> </span><br>
                            <span class="title">Phone no:-<?php echo $Phoneno; ?></span><br>
                            <span class="title">Email:-<?php echo $Email ; ?></span><br>
                          
                            <span class="amount--value"></span>
                        </div>
                        
                    </div>
                    
                </div>

            </div>
        </div>



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

        

        <div class="card--container" id="vehicle_item">
            <h3 class="main--title">Manage vehicles</h3>
            <div class="card--wrapper">
                <div class="outerbody">
                    <div class="card--header">
                     
                      <table border="1" cellspacing="0" cellpadding="10"> 
                         
                            <tr class="heading">  
                                 <th>Vehicle Name</th>  
                                 <th>Vehicle category</th>  
                                 <th>Vehicle number</th> 
                                 <th>Price per km</th>
                                 <th>Type</th>
                                 <th>Car image</th>
                                 <th>PUC</th>
                                 <th>Insurance</th>
                                 <th>Operations</th>
                                 <th>Operations</th>
                                 
                            </tr>
  


            <?php   
              
                if ($num = mysqli_num_rows($run)>0) {  
                    while ($result = mysqli_fetch_assoc($run)) {  
                        echo "  
                            <tr class='data'>    
                               <td>".$result['vehicle_name']."</td>    
                               <td>".$result['vehicle_category']."</td>  
                               <td>".$result['vehicle_number']."</td> 
                               <td>".$result['price_per_km']."</td> 
                               <td>".$result['type']."</td>
                               <td>".$result['image_path']."</td>
                               <td>".$result['puc_path']."</td>
                               <td>".$result['insurance_path']."</td>
                               <td><a href='delete.php?id=".$result['id']."' id='btn' onclick='myFunction()'>Delete</a></td>
                               <td><a href='update.php?id=".$result['id']."' id='btn'>Update</a></td>
                               


                               
                        
                         ";  
                    }  
                } 

                
               
            ?>   

            
            <script>
                    function myFunction() {
                        var txt;
                        if (confirm("Press a button!")) {
                        txt = "You pressed OK!";
                        } else {
                        txt = "You pressed Cancel!";
                        }
                        document.getElementById("demo").innerHTML = txt;
                }
            </script>

<p id="demo"></p>
                         </table>
                           
                          
                         <a href="vehicle.php" class="my-button">Add</a>   
                            
                    </div>
                </div>
            </div>
                    </div>
 <div></div> -->



        <div class="card--container" id="driver_item">
            <h3 class="main--title">Your Upcoming Bookings</h3>
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



        <div class="card--container" id="payment_item">
            <h3 class="main--title">Your Previous Bookings</h3>
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
       
       

<?php
 
 $con = mysqli_connect("localhost", "root", "", "journey");
 if (!$conn) {
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
                                value="<?php echo $row['ownerName']; ?>"></span><br>
                        <span class="title"><input type="number" name="number" placeholder="Update Phone no."
                                value="<?php echo $row['ownerPhoneNo']; ?>"></span><br>
                        <span class="title"><input type="email" name="email" placeholder="Update Email"
                                value="<?php echo $row['ownerEmail']; ?>"></span><br>
                        <!-- <span class="title"><input type="text" name="address" placeholder="Update Address" value="<?php echo $row['']; ?>"></span><br> -->
                        <!-- Submit button to trigger the update -->
                        <input type="submit" id="button" name="submit" value="Update Details">
                    </div>
                </div>
            </div>
        </div>
    </div>

        
        

    <script>
        
        function f1(divId) {
            document.querySelectorAll('.card--container').forEach(div => {
                div.style.display = "none";
            });
            document.getElementById(divId).style.display = "block";
        }

       

    </script>
</body>

</html>