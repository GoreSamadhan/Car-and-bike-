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
    $query = "select * from feedback";
    $run = mysqli_query($connection, $query);
    ?>


    <div class="card--container " id="feedback_received">
        <h3 class="main--title">Feedback Received</h3>
        <div class="card--wrapper">
            <div class="outerbody">
                <div class="card--header">
                    <table border="1" cellspacing="0" cellpadding="0">
                        <tr class="heading">
                            <th>id</th>
                            <th>name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Feedback</th>
                        </tr>

                        <tr>
                            <?php
                            while ($row = mysqli_fetch_assoc($run)) {
                                ?>
                                <td>
                                    <?php echo $row['fId']; ?>
                                </td>
                                <td>
                                    <?php echo $row['fName']; ?>
                                </td>
                                <td>
                                    <?php echo $row['fEmail']; ?>
                                </td>
                                <td>
                                    <?php echo $row['fPhoneNO']; ?>
                                </td>
                                <td>
                                    <?php echo $row['feedback']; ?>
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