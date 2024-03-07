<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
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
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "journey";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT * FROM cancelled_booking";

    $run = mysqli_query($conn, $query);
    ?>
    <h3 class="main--title">Cancelled Bookings</h3>
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
                        <!-- <th>Operation</th> -->
                    </tr>

                    <?php
                    if (mysqli_num_rows($run) > 0) {
                        while ($result = mysqli_fetch_assoc($run)) {
                            echo "<tr class='data' id='row_" . $result['id'] . "'>    
                                
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
                        echo "<tr><td colspan='10'>No record found</td></tr>";
                    }
                    ?>
                </table>
              
                </script>
            </div>
        </div>
        <br><br>
    </div>
</body>

</html>
