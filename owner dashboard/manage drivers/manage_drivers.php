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
            padding: 10px 10px;
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
            background-color: #e74c3c;
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
            position: absolute;
            top: 120px;
            right: 15px;
        }

        /* Hover effect */
        .my-button:hover {
            background-color: #480876;
            color: #fff;
        }

        .btn-add {
            margin-top: 50px;
            margin-bottom: 50px;
            text-align: center;
        }

        .card--container {
            margin-inline: 10px;
            /* width: fit-content;  */
        }
    </style>

    <?php
    include 'connection.php';
    $query = "select * from driver";
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
    } else {
        echo "";
    }

    $conn->close();
    ?>



    <div class="card--container" id="vehicle_item">
        <div class="top-add-btn">
        <h3 class="main--title">Manage drivers</h3>
            <a href="Driver/Driver.php" class="my-button">Add</a>

        </div>

       
        
        <div class="card--wrapper">
            <div class="outerbody">
                <div class="card--header">

                    <table border="1" cellspacing="0" cellpadding="10">

                        <tr class="heading">
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone no</th>
                            <th>Photo</th>
                            <th>License</th>



                        </tr>

                        <?php
                        if ($num = mysqli_num_rows($run) > 0) {
                            while ($result = mysqli_fetch_assoc($run)) {
                                echo "<tr class='data'>    
                          <td>" . $result['full_name'] . "</td>    
                          <td>" . $result['email'] . "</td>  
                          <td>" . $result['phone_number'] . "</td> 
                          <td><a href='./Driver/" . $result['photo_path'] . "' id='btn' >View</a></td>
                          <td><a href='./Driver/" . $result['license_path'] . "' id='btn' >View</a></td>

                          </tr>";
                            }
                        }
                        ?>

                    </table>


                </div>
            </div>
        </div>
    </div>
</body>


</html>