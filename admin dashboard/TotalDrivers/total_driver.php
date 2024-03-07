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
            background-color: #c0392b;

        }

        .card--container {
            margin-inline: 10px;
            /* width: fit-content; */
        }


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
   $query = "SELECT * FROM driver ";
    
    $run = mysqli_query($conn, $query);

    ?>

    <h3 class="main--title">Total Drivers</h3>
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
                          <td><a href='../owner dashboard/Driver/" . $result['photo_path'] . "' id='btn' >View</a></td>
                          <td><a href='../owner dashboard/Driver/" . $result['license_path'] . "' id='btn' >View</a></td>

                          </tr>";
                        }
                    }
                    ?>


                    <!-- <script>
                        function myFunction() {
                            var txt;
                            if (confirm("Press a button!")) {
                                txt = "You pressed OK!";
                            } else {
                                txt = "You pressed Cancel!";
                            }
                            document.getElementById("demo").innerHTML = txt;
                        }
                    </script> -->

                </table>

               
            </div>
        </div>

        <br><br>
        
    </div>
</body>

</html>