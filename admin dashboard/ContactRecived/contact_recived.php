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
    }

    .top-add-btn {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    /* Hover effect */
    .my-button:hover {
        background-color: #480876;
        color: #fff;
    }


    .card--container{ 
        margin-inline: 10px;
        /* width: fit-content; */
    }
</style>
</head>





<body>
    <?php
    // include 'connection.php';
    $connection = mysqli_connect('localhost', 'root', '', 'journey');
    $query = "select * from contact";
    $run = mysqli_query($connection, $query);
    ?>

    <div class="card--container" id="contact_received">
        <div class="top-add-btn">
            <h3 class="main--title"> Contact Received</h3>
            <!-- <a href="http://localhost/packages1/packages/packages/" class="my-button">Add</a> -->
        </div>
        <div class="card--wrapper">
            <div class="outerbody">
                <div class="card--header">
                    <table border="1" cellspacing="0" cellpadding="0">
                        <tr class="heading">
                            <th>id</th>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>City</th>
                            <th>Message</th>
                        </tr>


                        <?php

                        if ($num = mysqli_num_rows($run) > 0) {
                            while ($result = mysqli_fetch_assoc($run)) {
                                echo "  
                            <tr class='data'>    
                               <td>" . $result['id'] . "</td>    
                               <td>" . $result['name'] . "</td>  
                               <td>" . $result['phone'] . "</td> 
                               <td>" . $result['email'] . "</td>
                               <td>" . $result['city'] . "</td>  
                               <td>" . $result['message'] . "</td> 
                        
                         ";
                            }
                        }
                        ?>


                    </table>
                </div>
                <!-- <i class="icon">Rs</i> -->
            </div>
            <!-- <span class="card-detail">*** **** 3433</span> -->
        </div>

    </div>
</body>

</html>