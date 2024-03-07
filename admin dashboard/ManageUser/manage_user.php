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
        padding:5px 0;
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
        /* margin-top: 10px; */
        /* width: fit-content; */
    }
</style>


<body>
    <?php
    // include 'connection.php';  
    $connection = mysqli_connect('localhost', 'root', '', 'journey');
    $query = "select * from registration_form";
    $run = mysqli_query($connection, $query);
    ?>

    <div class="card--container" id="manage_user">
        <h3 class="main--title">Manage Users</h3>
        <div class="card--wrapper">
            <div class="outerbody">
                <div class="card--header">
                    <table border="1" cellspacing="0" cellpadding="0">
                        <tr class="heading">
                            <th>id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Birth Date</th>
                            <th>Gender</th>
                        </tr>

                        <tr>
                            <?php
                            while ($row = mysqli_fetch_assoc($run)) {
                                ?>
                                <td>
                                    <?php echo $row['userID']; ?>
                                </td>
                                <td>
                                    <?php echo $row['fullName']; ?>
                                </td>
                                <td>
                                    <?php echo $row['email']; ?>
                                </td>
                                <td>
                                    <?php echo $row['phoneNumber']; ?>
                                </td>
                                <td>
                                    <?php echo $row['birthDate']; ?>
                                </td>
                                <td>
                                    <?php echo $row['gender']; ?>
                                </td>
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