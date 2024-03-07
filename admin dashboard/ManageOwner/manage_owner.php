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

    td {
        padding: 5px 0px;
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

    /* Hover effect */
    .my-button:hover {
        background-color: #480876;
        color: #fff;
    }

    .card--container {
        margin-inline: 10px;
        /* width: fit-content; */
    }
</style>


<body>
    <?php
    // include 'connection.php'; 
    $connection = mysqli_connect('localhost', 'root', '', 'journey');
    $query = "select * from ownerregistration";
    $run = mysqli_query($connection, $query);
    ?>

    <div class="card--container" id="manage_owner">
        <h3 class="main--title">Manage Owners</h3>
        <div class="card--wrapper">
            <div class="outerbody">
                <div class="card--header">
                    <table border="1" cellspacing="0" cellpadding="0">
                        <tr class="heading">
                            <th>id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Document</th>
                            <th>Image</th>
                        </tr>

                        <tr>
                            <?php
                            while ($row = mysqli_fetch_assoc($run)) {
                                ?>
                                <td>
                                    <?php echo $row['id']; ?>
                                </td>
                                <td>
                                    <?php echo $row['ownerName']; ?>
                                </td>
                                <td>
                                    <?php echo $row['ownerEmail']; ?>
                                </td>
                                <td>
                                    <?php echo $row['ownerPhoneNo']; ?>
                                </td>
                                <td>
                                    <?php echo $row['ownerDocu']; ?>
                                </td>

                                <td><a href="../CAR/Owner/<?php echo $row['ownerDocuImg']; ?>"  id='btn' >View</a></td>

                                


                            </tr>
                            <?php
                            }

                            ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
