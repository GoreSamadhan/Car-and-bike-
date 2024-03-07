<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Today's Bookings</title>
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
            cursor: pointer;
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

    // Move today's data from booking_information to current_booking table
    $today = date('Y-m-d');
    $query_today = "INSERT INTO current_booking (Cname, Cemail, Cmobile, pick_location, drop_location, date, pick_time, vehicle_name, distance, price_per_km)
                    SELECT Cname, Cemail, Cmobile, pick_location, drop_location, date, pick_time, vehicle_name, distance, price_per_km
                    FROM booking_information
                    WHERE date = '$today'";

    if ($conn->query($query_today) === TRUE) {
        // Optionally, delete the moved data from booking_information table
        $deleteQuery = "DELETE FROM booking_information WHERE date = '$today'";

        if ($conn->query($deleteQuery) === TRUE) {
            echo "Today's bookings moved successfully to current_booking table.";
        } else {
            echo "Error deleting today's bookings from booking_information table: " . $conn->error;
        }
    } else {
        echo "Error moving today's bookings: " . $conn->error;
    }

    // Move past date data from current_booking to all_booking table
    $query_past = "INSERT INTO all_booking (Cname, Cemail, Cmobile, pick_location, drop_location, date, pick_time, vehicle_name, distance, price_per_km)
                   SELECT Cname, Cemail, Cmobile, pick_location, drop_location, date, pick_time, vehicle_name, distance, price_per_km
                   FROM current_booking
                   WHERE date < '$today'";

    if ($conn->query($query_past) === TRUE) {
        // Optionally, delete the moved data from current_booking table
        $deleteQuery = "DELETE FROM current_booking WHERE date < '$today'";

        if ($conn->query($deleteQuery) === TRUE) {
            echo "Past date bookings moved successfully to all_booking table.";
        } else {
            echo "Error deleting past date bookings from current_booking table: " . $conn->error;
        }
    } else {
        echo "Error moving past date bookings: " . $conn->error;
    }

    // Retrieve data from current_booking table for today's bookings
    $query_current = "SELECT * FROM current_booking WHERE date = '$today'";
    $run_current = mysqli_query($conn, $query_current);
    ?>

    <h3 class="main--title">Today's Bookings</h3>
    <div class="card--wrapper">
        <div class="outerbody">
            <div class="card--header">
                <table border="1" cellspacing="0" cellpadding="10">
                    <tr class="heading">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Pickup</th>
                        <th>Drop</th>
                        <th>Date</th>
                        <th>Picktime</th>
                        <th>Vehicle name</th>
                        <th>Distance</th>
                        <th>Price per km</th>
                        <th>Action</th>
                    </tr>

                    <?php
                    if ($run_current && mysqli_num_rows($run_current) > 0) {
                        while ($result_current = mysqli_fetch_assoc($run_current)) {
                            echo "<tr class='data'>    
                                  <td>" . $result_current['Cname'] . "</td> 
                                  <td>" . $result_current['Cemail'] . "</td> 
                                  <td>" . $result_current['Cmobile'] . "</td> 
                                  <td>" . $result_current['pick_location'] . "</td> 
                                  <td>" . $result_current['drop_location'] . "</td> 
                                  <td>" . $result_current['date'] . "</td> 
                                  <td>" . $result_current['pick_time'] . "</td> 
                                  <td>" . $result_current['vehicle_name'] . "</td> 
                                  <td>" . $result_current['distance'] . "</td> 
                                  <td>" . $result_current['price_per_km'] . "</td> 
                                  <td><button type='button' id='btn' onclick='cancelBooking(" . $result_current['id'] . ")'>Cancel</button></td> 
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='11'>No bookings found for today</td></tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

    <!-- JavaScript for cancelBooking function -->
    <script>
        function cancelBooking(id) {
            if (confirm("Are you sure you want to cancel this booking?")) {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        location.reload();
                    }
                };
                xhr.open("GET", "current booking/cu_cancel_book.php?id=" + id, true);
                xhr.send();
            }
        }
    </script>
</body>

</html>