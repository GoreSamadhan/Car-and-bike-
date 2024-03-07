<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Bookings</title>
    <style>
        table {
            width: 100%;
            background-color: #f2e6ff;
            border-collapse: collapse;
        }

        .heading {
            background-color: #180047;
            color: #fff;
        }

        .heading th {
            padding: 10px 0;
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
    </style>
</head>

<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "journey";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query="SELECT * From all_booking";

    // $query = "SELECT bi.Cname, bi.Cemail, bi.Cmobile, tb.pick_location, tb.drop_location, tb.date, tb.pick_time, tb.vehicle_name, tb.distance, tb.price_per_km 
    // FROM booking_information bi
    // LEFT JOIN current_booking tb ON bi.Cname = bi.Cname";

    $run = mysqli_query($conn, $query);

    ?>

    <h3>Total Bookings</h3>
    <div>
        <table border="1" cellspacing="0" cellpadding="10">
            <tr class="heading">
                <th>Name</th>
                <th>Email</th>
                <th>Phone No</th>
                <th>Pickup</th>
                <th>Drop</th>
                <th>Date</th>
                <th>Pick Time</th>
                <th>Vehicle Name</th>
                <th>Distance</th>
                <th>Price per km</th>
            </tr>

            <?php
            if ($run && mysqli_num_rows($run) > 0) {
                while ($result = mysqli_fetch_assoc($run)) {
                    echo "<tr class='data'>    
                          <td>" . $result['Cname'] . "</td>    
                          <td>" . $result['Cemail'] . "</td>  
                          <td>" . $result['Cmobile'] . "</td> 
                          <td>" . $result['pick_location'] . "</td> 
                          <td>" . $result['drop_location'] . "</td> 
                          <td>" . $result['date'] . "</td> 
                          <td>" . $result['pick_time'] . "</td> 
                          <td>" . $result['vehicle_name'] . "</td> 
                          <td>" . $result['distance'] . "</td> 
                          <td>" . $result['price_per_km'] . "</td> 
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='10'>No bookings found</td></tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>
