<?php
$conn = mysqli_connect("localhost", "root", "", "journey");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Get the values from the form
    $id = $_POST['id'];
    $newName = $_POST['name'];
    $newColor = $_POST['color'];
    $newPrice = $_POST['price'];
    $newType = isset($_POST['type']) ? implode(",", $_POST['type']) : ''; // Convert array to comma-separated string
    $newImage = ''; // Initialize variable for image path

    // Handle image uploads
    $uploadErrors = [];
    $uploadDir = "../vehicle/"; // Specify the directory where you want to store uploaded images

    // Function to handle file uploads
    function uploadFile($file, $targetDir)
    {
        $targetFile = $targetDir . basename($file["name"]);
        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            return $targetFile;
        } else {
            return false;
        }
    }

    // Upload main image
    if (isset($_FILES["Upload_car"]) && $_FILES["Upload_car"]["error"] == 0) {
        $newImage = uploadFile($_FILES["Upload_car"], $uploadDir);
        if (!$newImage) {
            $uploadErrors[] = "Error uploading main image.";
        }
    }

    // Upload PUC image
    if (isset($_FILES["Upload_puc"]) && $_FILES["Upload_puc"]["error"] == 0) {
        $newPUC = uploadFile($_FILES["Upload_puc"], $uploadDir);
        if (!$newPUC) {
            $uploadErrors[] = "Error uploading PUC image.";
        }
    }

    // Upload insurance image
    if (isset($_FILES["Upload_insurance"]) && $_FILES["Upload_insurance"]["error"] == 0) {
        $newInsurance = uploadFile($_FILES["Upload_insurance"], $uploadDir);
        if (!$newInsurance) {
            $uploadErrors[] = "Error uploading insurance image.";
        }
    }

    // Update the database with the new values
    $updateQuery = "UPDATE vehicle SET vehicle_name='$newName', vehicle_color='$newColor', price_per_km='$newPrice', type='$newType'";

    // Append image paths update if new images were uploaded
    if (!empty($newImage)) {
        $updateQuery .= ", image_path='$newImage'";
    }
    if (!empty($newPUC)) {
        $updateQuery .= ", puc_path='$newPUC'";
    }
    if (!empty($newInsurance)) {
        $updateQuery .= ", insurance_path='$newInsurance'";
    }

    $updateQuery .= " WHERE id = '$id'";

    $updateResult = mysqli_query($conn, $updateQuery);

    if (!$updateResult) {
        die('Error updating vehicle details: ' . mysqli_error($conn));
    }
}

// Fetch the user data
$idToUpdate = isset($_GET['id']) ? $_GET['id'] : null;
$query = "SELECT vehicle_name, vehicle_color, price_per_km, type FROM vehicle WHERE id= '$idToUpdate'";
$result = mysqli_query($conn, $query);

if (!$result) {
    die('Error fetching vehicle data: ' . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);
?>
<html>

<body>
    <!-- HTML form for vehicle details update -->
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="card--container" id="update_item">
            <h3 class="profile--title">Update vehicle details</h3>
            <div class="card--wrapper">
                <div class="update--card">
                    <div class="card--header">
                        <div class="amount">
                            <!-- Input fields to update vehicle details -->
                            <input type="hidden" name="id" value="<?php echo $idToUpdate; ?>">
                            <span class="title"><input type="text" name="name" placeholder="Update Name"
                                    value="<?php echo $row['vehicle_name']; ?>"></span><br><br>
                            <span class="title"><input type="text" name="color" placeholder="Update color"
                                    value="<?php echo $row['vehicle_color']; ?>"></span><br><br>
                            <span class="title"><input type="number" name="price" placeholder="Update price per km."
                                    value="<?php echo $row['price_per_km']; ?>"></span><br><br>
                            <span class="title">
                                Update type:<br>
                                <input type="checkbox" name="type[]" value="AC" <?php if (strpos($row['type'], 'AC') !== false)
                                    echo 'checked'; ?>> AC<br>
                                <input type="checkbox" name="type[]" value="Non AC" <?php if (strpos($row['type'], 'Non AC') !== false)
                                    echo 'checked'; ?>> Non AC<br>
                                <input type="checkbox" name="type[]" value="diesel" <?php if (strpos($row['type'], 'diesel') !== false)
                                    echo 'checked'; ?>> Diesel<br>
                                <input type="checkbox" name="type[]" value="petrol" <?php if (strpos($row['type'], 'petrol') !== false)
                                    echo 'checked'; ?>> Petrol<br>
                                <input type="checkbox" name="type[]" value="CNG" <?php if (strpos($row['type'], 'CNG') !== false)
                                    echo 'checked'; ?>> CNG
                            </span><br><br>
                            <span class="title">
                                Upload new image: <input type="file" name="Upload_car" id="Upload_car"
                                    accept=".jpg, .png, .jpeg, .webp">
                            </span><br><br>

                            <span class="title">
                                Upload new PUC image: <input type="file" name="Upload_puc" id="Upload_puc"
                                    accept=".jpg, .png, .jpeg, .webp">
                            </span><br><br>

                            <span class="title">
                                Upload new insurance image: <input type="file" name="Upload_insurance"
                                    id="Upload_insurance" accept=".jpg, .png, .jpeg, .webp">
                            </span><br><br>
                            <!-- Submit button to trigger the update -->
                            <input type="submit" id="button" name="submit" value="Update Details">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>