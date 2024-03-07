<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Bookings</title>
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

    // Fetch all data from all_booking table
    $query_all = "SELECT * FROM all_booking";
    $run_all = mysqli_query($conn, $query_all);
    ?>

    <h3 class="main--title">All Bookings</h3>
    <div class="card--wrapper">
        <div class="outerbody">
            <div class="card--header">
                <table border="1" cellspacing="0" cellpadding="10">
                    <tr class="heading">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th>Pickup</th>
                        <th>Drop</th>
                        <th>Date</th>
                        <th>Picktime</th>
                        <th>Vehicle name</th>
                        <th>Distance</th>
                        <th>Price per km</th>
                    </tr>

                    <?php
                    if ($run_all && mysqli_num_rows($run_all) > 0) {
                        while ($result_all = mysqli_fetch_assoc($run_all)) {
                            echo "<tr class='data'>    
                                  <td>" . $result_all['Cname'] . "</td> 
                                  <td>" . $result_all['Cemail'] . "</td> 
                                  <td>" . $result_all['Cmobile'] . "</td> 
                                  <td>" . $result_all['pick_location'] . "</td> 
                                  <td>" . $result_all['drop_location'] . "</td> 
                                  <td>" . $result_all['date'] . "</td> 
                                  <td>" . $result_all['pick_time'] . "</td> 
                                  <td>" . $result_all['vehicle_name'] . "</td> 
                                  <td>" . $result_all['distance'] . "</td> 
                                  <td>" . $result_all['price_per_km'] . "</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='10'>No bookings found</td></tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
