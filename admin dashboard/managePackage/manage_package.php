<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

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
        /* background-color: #e74c3c; */
        background-color: #480876;
        padding: 5px 10px;
        border-radius: 3px;
        /* margin-right: 10px; */
        margin: auto;

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
        margin-inline: 10px;
        /* width: fit-content; */
    }
</style>

<body>
    <?php
    // include 'connection.php';  
    $connection = mysqli_connect('localhost', 'root', '', 'journey');
    $query = "select * from packages";
    $run = mysqli_query($connection, $query);
    ?>

    <div class="card--container " id="manage_packages">

        <div class="top-add-btn">
            <h3 class="main--title">Manage Packages</h3>
            <a href="packages 1\package.php" class="my-button">Add</a>
        </div>
        <div class="card--wrapper">
            <div class="outerbody">
                <div class="card--header">
                    <table border="1" cellspacing="0" cellpadding="0">
                        <tr class="heading">
                            <th>Package Name</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Price</th>
                            <th>Journey Date</th>
                            <th>Category</th>
                            <th>Package Image</th>
                            <th>Operations</th>
                        </tr>


                        <?php

                        if ($num = mysqli_num_rows($run) > 0) {
                            while ($result = mysqli_fetch_assoc($run)) {
                                echo "  
                            <tr class='data'>    
                               <td>" . $result['package_title'] . "</td>    
                               <td>" . $result['from_location'] . "</td>  
                               <td>" . $result['to_location'] . "</td>  
                               <td>" . $result['price'] . "</td> 
                               <td>" . $result['journey_date'] . "</td>
                               <td>" . $result['category'] . "</td>  
                       
                           
                               <td><a href='./packages 1/" . $result['package_image'] . "' id='btn' >View</a></td> 
                               <td><a href='managePackage/delete.php?id=" . $result['id'] . "' id='btn'>Delete</a></td> 
                        
                         ";
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

