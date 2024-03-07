


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Registration Form in HTML CSS</title>
    <link rel="stylesheet" href="../Owner/Registration.css">

    <style>
    </style>
</head>

<body>

    <div class="outer-div">
        <section class="container">
            <header class="lg-heading">Sign Up</header>
            <div class="container-form">
                <div class="form-img">
                    <img src="../User/Image/Registration2.png" alt="reg-img">
                </div>
           
            <form action="OwnerRegistrationDB.php" class="form" method="POST" enctype="multipart/form-data">

                <div class="input-box">
                    <label>Owner Name</label>
                    <input type="text" placeholder="Enter Full Name" name="ownerName" required />
                </div>

                <div class="input-box">
                    <label>Email Address</label>
                    <input type="text" placeholder="Enter Email" name="ownerEmail" required />
                </div>


                <div class="input-box">
                    <label>Mobile Number</label>
                    <input type="tel" placeholder="Enter Mobile No" name="ownerPhoneNo" pattern="[0-9]{10}"
                        title="Enter a valid 10-digit phone number"   required />
                </div>

                <div class="input-box">
                    <label for="ownerDocu">Choose a Document:</label>

                    <select name="ownerDocu" id="ownerDocu">
                        <option value="aadhaarCard">Aadhaar Card</option>
                        <option value="panCard">Pan Card</option>
                        <option value="drivingLicences">Driving Licences</option>
                    </select>
                </div>
                
                <div class="input-box">
                    <input type="file" id="ownerDocuImg" name="ownerDocuImg" accept=".jpg, .png, .jpeg, .webp" value="" required/>
                </div>
                <!-- <div class="input-box">
                    <label>Upload Document Adhar/Pan/Licence</label>
                    <input type="file" name="ownerDocuImg" id="ownerDocuImg" accept=".jpg, .png, .jpeg, .webp" value="" required />
                </div> -->


                <div class="input-box">
                    <label>Password</label>
                    <input type="password" placeholder="Enter Password" name="ownerPassword" id="password" required />
                </div>
                <div class="input-box">
                    <label>Confirm Password</label>
                    <input type="password" placeholder="Confirm Password" name="confirmPassword" required />
                </div>
               
                <button type="submit">Submit</button>
                <button type="reset">Cancel</button>
                <p class="Sign">Already have an account? <a href="Ownerlogin.php" class="Login">Login</a></p>
            </form>
</div>
        </section>
    </div>

</body>

</html>
