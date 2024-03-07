 



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Driver Form</title>
    <!---Custom CSS File--->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Zilla+Slab:wght@500&display=swap" rel="stylesheet"> -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,300&display=swap" rel="stylesheet"> -->


    <link rel="stylesheet" href="Driver.css" />
</head>

<body>
    
    <div class="outer-div">
        <div class="image">
            <img src="images/D3.png" alt="">
        </div>
        <section class="container">
            <header>Driver </header>
            <form action="Driverdb.php" class="form" method="POST" enctype="multipart/form-data">
                <div class="input-box">
                    <label>Full Name</label>
                    <input type="text" placeholder="Enter full name" id="Full_Name" name="Full_Name" required />
                </div>

                <div class="input-box">
                    <label>Email Address</label>
                    <input type="text" placeholder="Enter email address" id="Email" name="Email" required />
                </div>

                <div class="column">
                    <div class="input-box">
                        <label>Phone Number</label>
                        <input type="tel" placeholder="Enter phone number" id="Phone_Number" name="Phone_Number" required />
                    </div><br>
                    <div class="input-box">
                        <label>Birth Date</label>
                        <input type="date" placeholder="Enter birth date" id="Birth_date" name="Birth_Date" required />
                    </div>
                </div>

                <div class="input-box">
                    <label>Upload Photo</label>
                    <input type="file" name="Upload_Photo" id="Upload_Photo" accept=".jpg, .png, .jpeg, .webp" value="" required />
                </div>
                <div class="input-box">
                    <label>Upload License</label>
                    <input type="file" name="Upload_License" id="Upload_License" accept=".jpg, .png, .jpeg, .webp" value="" required />
                </div>

                <div class="input-box">
                    <label>Upload Adhar</label>
                    <input type="file" name="Upload_Adhar" id="Upload_Adhar" accept=".jpg, .png, .jpeg, .webp" value="" required />
                </div>

                <button type="submit" name="submit" value="Submit">Submit</button>
                
            </form>

            
        </section>
    </div>

</body>

</html>
