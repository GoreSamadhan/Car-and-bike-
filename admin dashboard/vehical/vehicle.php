<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Vehicle Form</title>
    <link rel="stylesheet" href="vehicle.css">
</head>

<body>
<br>
<h2>Vehicle Registration Form</h2>


    <section class="form-container">
        <section class="container">
            <form action="vehicledb.php" class="vehicle-form" method="POST" enctype="multipart/form-data">
                <div class="form-section" id="section1">
                    <div class="input-box">
                        <label>Owner Name</label>
                        <input type="text" placeholder="Enter name" id="owner_name" name="owner_name" required />
                    </div>

                    <div class="input-box">
                        <label>Vehicle Name</label>
                        <input type="text" placeholder="Enter vehicle name" id="vehicle_name" name="vehicle_name" required />
                    </div>

                    <div class="input-box">
                        <label>Vehicle Category</label>
                        <input type="text" placeholder="Enter vehicle category" id="vehicle_category" name="vehicle_category" required />
                    </div>

                    <div class="input-box">
                        <label>Vehicle Number</label>
                        <input type="text" placeholder="Enter vehicle number" id="vehicle_number" name="vehicle_number" required />
                    </div>
                </div>

                <section class="form-section" id="section2">
                    <div class="column">
                        <div class="input-box">
                            <label>Vehicle Color</label>
                            <input type="text" placeholder="Enter vehicle color" id="vehicle_color" name="vehicle_color" required />
                        </div>

                        <div class="input-box">
                            <label>Manufacturing Year</label>
                            <input type="Date" id="manufacturing_year" name="manufacturing_year" required />
                        </div>
                    </div>

                    <div class="column">
                        <div class="input-box">
                            <label>Price</label>
                            <input type="text" placeholder="Enter price" id="price_per_km" name="price_per_km" required />
                        </div>

                        <div class="input-box">
                            <label>Fastag Id</label>
                            <input type="text" placeholder="Enter fastag id" id="fastag_id" name="fastag_id" required />
                        </div>
                    </div>

                   <div class="checkbox-group">
                        <div class="input-box">
                            <div class="column">
                                <label>Type</label>
                                <input type="checkbox" name="type[]" value="AC"> AC<br>
                                <input type="checkbox" name="type[]" value="Non AC"> Non AC<br>
                                <input type="checkbox" name="type[]" value="diesel"> Diesel<br>
                                <input type="checkbox" name="type[]" value="petrol"> Petrol<br>
                                <input type="checkbox" name="type[]" value="CNG"> CNG<br>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="image-section">
                    <div class="input-box">
                        <label>Upload Vehicle Image</label>
                        <input type="file" name="Upload_Image" id="Upload_Image" accept=".jpg, .png, .jpeg, .webp" required />
                    </div>

                    <div class="input-box">
                        <label>Upload PUC</label>
                        <input type="file" name="Upload_PUC" id="Upload_PUC" accept=".jpg, .png, .jpeg, .webp" required />
                    </div>

                    <div class="input-box">
                        <label>Upload Insurance</label>
                        <input type="file" name="Upload_Insurance" id="Upload_Insurance" accept=".jpg, .png, .jpeg, .webp" required />
                    </div>

                    <div class="input-box">
                        <label>Upload RC</label>
                        <input type="file" name="Upload_RC" id="Upload_RC" accept=".jpg, .png, .jpeg, .webp" required />
                    </div>

                    <div class="input-box">
                        <label>Upload Permit</label>
                        <input type="file" name="Upload_Permit" id="Upload_Permit" accept=".jpg, .png, .jpeg, .webp" required />
                    </div>
                </section>

                <button type="submit" name="submit" value="Submit">Submit</button>
            </form>
        </section>
    </section>
</body>

</html> -->
