<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Your CSS styles here */
        table {
            width: 100%;
            background-color: #f2e6ff;
            border-collapse: collapse;
        }

        .heading {
            background-color: #180047;
        }

        .heading th {
            padding: 10px 0;
            color: #fff;
        }

        .data {
            text-align: left;
            color: black;
        }

        .data td {
            padding: 15px 0;
            padding-left: 15px;
        }

        #btn {
            text-decoration: none;
            color: #fff;
            background-color: #480876;
            padding: 5px 10px;
            border-radius: 3px;
            margin-right: 10px;
            text-align: center;
        }

        #btn:hover {
            background-color: #c0392b;
        }

        .card--container {
            margin-inline: 10px;
            /* width: fit-content; */
        }
    </style>
</head>

<body>
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

    // Move all bookings from booking_information to upcoming_booking table
    $query = "INSERT INTO upcoming_booking (Cname, Cemail, Cmobile, pick_location, drop_location, date, pick_time, vehicle_name, distance, price_per_km)
          SELECT Cname, Cemail, Cmobile, pick_location, drop_location, date, pick_time, vehicle_name, distance, price_per_km
          FROM booking_information";

    if ($conn->query($query) === TRUE) {
        // Optionally, delete the moved bookings from the booking_information table
        $deleteQuery = "TRUNCATE TABLE booking_information";

        if ($conn->query($deleteQuery) === TRUE) {
            echo "All bookings moved successfully from booking_information to upcoming_booking table.";
        } else {
            echo "Error deleting moved bookings from booking_information table: " . $conn->error;
        }
    } else {
        echo "Error moving bookings: " . $conn->error;
    }

    // Move today's upcoming bookings from upcoming_booking to current_booking table
    $today = date('Y-m-d');

    // Check if there are upcoming bookings for today in upcoming_booking table
    $query = "SELECT * FROM upcoming_booking WHERE date = '$today'";
    $run = mysqli_query($conn, $query);

    if ($run && mysqli_num_rows($run) > 0) {
        // Insert today's upcoming bookings into current_booking table
        $insertQuery = "INSERT INTO current_booking (Cname,Cemail,Cmobile,pick_location, drop_location, date, pick_time, vehicle_name, distance, price_per_km)
                        SELECT Cname,Cemail,Cmobile,pick_location, drop_location, date, pick_time, vehicle_name, distance, price_per_km
                        FROM upcoming_booking
                        WHERE date = '$today'";

        if ($conn->query($insertQuery) === TRUE) {
            // Delete today's upcoming bookings from upcoming_booking table
            $deleteQuery = "DELETE FROM upcoming_booking WHERE date = '$today'";

            if ($conn->query($deleteQuery) === TRUE) {
                echo "Today's upcoming bookings moved to current bookings successfully.";
            } else {
                echo "Error deleting today's upcoming bookings: " . $conn->error;
            }
        } else {
            echo "Error moving today's upcoming bookings: " . $conn->error;
        }
    } else {
        echo "No upcoming bookings found for today in upcoming_booking table.";
    }

    // Retrieve data from upcoming_booking table
    $query_upcoming = "SELECT * FROM upcoming_booking";
    $run_upcoming = mysqli_query($conn, $query_upcoming);
    ?>

    <h3 class="main--title">Upcoming bookings</h3>
    <div class="card--wrapper">
        <div class="outerbody">
            <div class="card--header">
                <table border="1" cellspacing="0" cellpadding="10">
                    <tr class="heading">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile No</th>
                        <th>pickup</th>
                        <th>Drop</th>
                        <th>Date</th>
                        <th>Picktime</th>
                        <th>Vehicle name</th>
                        <th>Distance</th>
                        <th>Price per km</th>
                        <th>Operation</th>
                    </tr>

                    <?php
                    if ($run_upcoming && mysqli_num_rows($run_upcoming) > 0) {
                        while ($result_upcoming = mysqli_fetch_assoc($run_upcoming)) {
                            echo "<tr class='data'>    
                                  <td>" . $result_upcoming['Cname'] . "</td> 
                                  <td>" . $result_upcoming['Cemail'] . "</td> 
                                  <td>" . $result_upcoming['Cmobile'] . "</td> 
                                  <td>" . $result_upcoming['pick_location'] . "</td> 
                                  <td>" . $result_upcoming['drop_location'] . "</td> 
                                  <td>" . $result_upcoming['date'] . "</td> 
                                  <td>" . $result_upcoming['pick_time'] . "</td> 
                                  <td>" . $result_upcoming['vehicle_name'] . "</td> 
                                  <td>" . $result_upcoming['distance'] . "</td> 
                                  <td>" . $result_upcoming['price_per_km'] . "</td> 
                                  <td><button type='button' id='btn' onclick='cancelBooking(" . $result_upcoming['id'] . ")'>Cancel</button></td> 
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='11'>No upcoming bookings found</td></tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

    <!-- JavaScript for cancelBooking function -->
    <script>
        function cancelBooking(id) {
            if (confirm("Are you sure you want to shortlist this candidate?")) {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        location.reload();
                    }
                };
                xhr.open("GET", "upcoming booking/up_cancel_book.php?id=" + id, true);
                xhr.send();
            }
        }
    </script>
</body>

</html>