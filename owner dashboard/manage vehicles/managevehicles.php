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
            padding: 10px 0px;
            color: #fff;
        }

        .data {
            text-align: left;
            color: black;
        }

        .data td {
            padding: 15px 15px;
            padding-left: 15px;
        }

        #btn {
            text-decoration: none;
            color: #fff;
            background-color: #480876;
            padding: 5px 20px;
            border-radius: 3px;
        }

        #btn:hover {
            background-color: #c0392b;
        }

        .my-button {
        text-decoration: none;
        color: #fff;
        background-color: #180047;
        padding: 5px 20px;
        border-radius: 3px;
        margin-top: 25px;
    }

    /* Hover effect */
    .my-button:hover {
        /* background-color: #480876; */
        background-color: #c0392b;
        color: #fff;
    }

    .top-add-btn {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .card--container{ 
        margin-inline: 15px;
        /* width: fit-content; */
    }


    </style>



    <?php
    include 'connection.php';
    $query = "select * from vehicle";
    $run = mysqli_query($connection, $query);
    ?>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "journey";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $selectQueryVehicle = "SELECT vehicle_name, vehicle_category, vehicle_color, price_per_km FROM vehicle";
    $resultVehicle = $conn->query($selectQueryVehicle);

    if ($resultVehicle->num_rows > 0) {
        // Output data of each row
        $rowVehicle = $resultVehicle->fetch_assoc();
        $Vehiclename = $rowVehicle['vehicle_name'];
        $Vehiclecategory = $rowVehicle['vehicle_category'];
        $Vehiclecolor = $rowVehicle['vehicle_color'];
        $price_per_km = $rowVehicle['price_per_km'];
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>



    <div class="card--container" id="vehicle_item">
        <div class="top-add-btn">
            <h3 class="main--title">Manage vehicles</h3>
            <a href="vehicle/vehicle.php" class="my-button">Add</a>
        </div>

        
        <div class="card--wrapper">
            <div class="outerbody">
                <div class="card--header">

                    <table border="1" cellspacing="0" cellpadding="10">

                        <tr class="heading">
                            <th>Vehicle Name</th>
                            <th>Vehicle category</th>
                            <th>Vehicle number</th>
                            <th>Price/km</th>
                            <th>Type</th>
                            <th>Car image</th>
                            <th>PUC</th>
                            <th>Insurance</th>
                            <th>Operations</th>
                            <th>Operations</th>


                        </tr>

                        <?php
                        if ($num = mysqli_num_rows($run) > 0) 
                        {
                            while ($result = mysqli_fetch_assoc($run)) 
                            {
                                echo "<tr class='data'>    
                <td>" . $result['vehicle_name'] . "</td>    
                <td>" . $result['vehicle_category'] . "</td>  
                <td>" . $result['vehicle_number'] . "</td> 
                <td>" . $result['price_per_km'] . "</td> 
                <td>" . $result['type'] . "</td>
                <td><a href='./vehicle/" . $result['image_path'] . "' id='btn' >View</a></td>
                <td><a href='./vehicle/" . $result['puc_path'] . "' id='btn' >View</a></td>
                <td><a href='./vehicle/" . $result['insurance_path'] . "' id='btn' >View</a></td>
                <td><a href='manage vehicles/delete.php?id=" . $result['id'] . "' id='btn' onclick='myFunction()'>Delete</a></td>
                <td><a href='manage vehicles/update.php?id=" . $result['id'] . "' id='btn'>Update</a></td>
                </tr>";
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
                        <a href="vehicle/vehicle.php" class="my-button">Add</a>
                    </div> -->

                </div>
            </div>
        </div>
    </div>




</body>

</html>