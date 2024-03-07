
<?php

$con = mysqli_connect("localhost","root","","journey");
if (!$con) {
    die("Connection failed:");
}


?>

  <?php
// require_once('config');
$query = "SELECT * FROM registration_form";
$result = mysqli_query($con, $query);

if (!$result) {
    die('Error: ' . mysqli_error($con));
}
?>

<?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="card--container">
            <div class="profile title">
                <img src="<?php echo $row['images']; ?>" alt="" height="300">
             </div>
                <div class="profile--title"><?php echo $row['title1']; ?></div>
                <!-- <h1 class="lg-heading"><?php echo $row['']; ?></h1> -->

                <!-- <button href="detail.php?cid=" class="btn">Know More</button> -->
            </div>
        <?php
        }
        ?>