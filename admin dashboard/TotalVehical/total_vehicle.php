<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

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
            /* background-color: #c0392b; */
            background-color: #c0392b;

        }

        .card--container {
            margin-inline: 10px;
            /* width: fit-content; */
        }

        /* .card--container {
            margin: 20px;
            padding: 25px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: fit-content;
            display:;
            
            
        }

        .main--title {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .card--wrapper {
            display: flex;
            flex-wrap: wrap;
        }

        .prev--card {
            width: 300px;
            margin: 10px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .card--header {
            display: flex;
            flex-direction: column;
        }

        .amount {
            margin-bottom: 10px;
        }

        .amount input[type="text"],
        .amount input[type="number"],
        .amount input[type="email"] {
            width: 100%;
            margin-bottom: 5px;
            padding: 5px;
        } */
    </style>

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

    //$conn->close();
    ?>

    <?php
    //include 'connection.php';  
    $query = "SELECT * FROM vehicle ";
    // $query = "(SELECT * FROM vehicle)
    // UNION
    // (SELECT * FROM adminvehicle)";
    $run = mysqli_query($conn, $query);

    ?>





    <h3 class="main--title">Total vehicles</h3>
    <div class="card--wrapper">
        <div class="outerbody">
            <div class="card--header">

                <table border="1" cellspacing="0" cellpadding="10">

                    <tr class="heading">
                        <th>Owner Name</th>
                        <th>Vehicle Name</th>
                        <th>Vehicle category</th>
                        <th>Vehicle number</th>
                        <th>Price/km</th>
                        <th>Type</th>
                        <th>Car image</th>
                        <th>PUC</th>
                        <th>Insurance</th>
                        <!-- <th>Operations</th>
                            <th>Operations</th> -->
                    </tr>



                    <?php

                    if ($num = mysqli_num_rows($run) > 0) {
                        while ($result = mysqli_fetch_assoc($run)) {
                            echo "  
                                <tr class='data'>    
                                <td>" . $result['owner_name'] . "</td>   
                                <td>" . $result['vehicle_name'] . "</td>    
                                <td>" . $result['vehicle_category'] . "</td>  
                                <td>" . $result['vehicle_number'] . "</td> 
                                <td>" . $result['price_per_km'] . "</td> 
                                <td>" . $result['type'] . "</td>
                                <td><a href='../owner dashboard/vehicle/" . $result['image_path'] . "' id='btn' >View</a></td>
                                <td><a href='../owner dashboard/vehicle/" . $result['puc_path'] . "' id='btn' >View</a></td>
                                <td><a href='../owner dashboard/vehicle/" . $result['insurance_path'] . "' id='btn' >View</a></td>
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

                <!-- <div class="btn-add">
                        <a href="owner dashboard/vehicle.php" class="my-button">Add</a>
                    </div> -->
            </div>
        </div>

        <br><br>
        <!-- <div class="card--container" id="total_vehicle">
                    <h3 class="main--title">Total Vehicles</h3>
            
                    <div class="amount">
                        <table border="1">
                            <tr>
                                <td>Booking Date:</td>
                                <td>dd/mm//yy</td>
                            </tr>
                            <tr>
                                <td>Location:</td>
                                <td>Pune to Mumbai</td>
                            </tr>
                            <tr>
                                <td>Vehicle Name:</td>
                                <td>Swift Desire</td>
                            </tr>
                            <tr>
                                <td>Driver Name:</td>
                                <td>Vishal abc</td>
                            </tr>
                            <tr>
                                <td>Amount:</td>
                                <td>Rs 500.00</td>
                            </tr>        
                        </table>

                    </div>
                </div> -->
    </div>
</body>

</html>