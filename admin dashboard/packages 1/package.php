<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Package</title>
    <link rel="stylesheet" type="text/css" href="packages.css">
</head>
<body>
    <h2 style="text-align: center;">Add Package</h2>
    <form action="packagedb.php" method="post" enctype="multipart/form-data" class="addPack">

        <!--<label>Name:</label>
        <input type="text" name="name" required>-->

        <label class="location5">Package Name:</label>
        <input type="text" name="package_title"  placeholder="Package name"required>

<div class="desti">
        <div class="left">

        <label class = "location1">From</label>
        <input type="text" name="from_location"  required>
        </div>
        <div class="right">
        <label class = "location" >To</label>
        <input type="text" name="to_location"  required>
        </div>
    </div>
    <div class="desti">
        <div class="left">

        <label class ="location3">Journey Date:</label><input type="date" name="journey_date" required>
</div>
<div class="right">
            <label class ="location4">Price</label><input type="number" name="price" step="0.01"  required>
</div>
</div>
        <label class="des">Description:</label>
        <textarea name="description" placeholder="Description"required></textarea>
    
        <label class="terms">Terms & condition 1:</label>
        <textarea name="termsAndCondition1" placeholder=""></textarea>

        <label class="terms">Terms & condition 2:</label>
        <textarea name="termsAndCondition2" placeholder=""></textarea>

        <label class="terms">Terms & condition 3:</label>
        <textarea name="termsAndCondition3" placeholder=""></textarea>

        <label class="terms">Terms & condition 4:</label>
        <textarea name="termsAndCondition4" placeholder=""></textarea>

        <label class="terms">Terms & condition 5:</label>
        <textarea name="termsAndCondition5" placeholder=""></textarea>

        <label class="terms">Terms & condition 6:</label>
        <textarea name="termsAndCondition6" placeholder=""></textarea>

        <label class="terms">Terms & condition 7:</label>
        <textarea name="termsAndCondition7" placeholder=""></textarea>

        <label class="terms">Terms & condition 8:</label>
        <textarea name="termsAndCondition8" placeholder=""></textarea>

        <label class="terms">Terms & condition 9:</label>
        <textarea name="termsAndCondition9" placeholder=""></textarea>

        <label class="terms">Terms & condition 10:</label>
        <textarea name="termsAndCondition10" placeholder=""></textarea>

        <label class="terms">Coupon Code</label>
        <textarea name="coupon code" placeholder=" Coupon Code"required></textarea>

        <label>Category:</label>
        <label class="radio-inline">
            <input type="radio" name="category" value="monthly" required>Monthly </label>

        <label class="radio-inline">
            <input type="radio" name="category" value="seasonal" required> Seasonal</label><br>

        <label>Package Image</label>
        <input type="file" name="Upload_Photo" required>

        <!--<button type="submit">Add Package</button>-->
        
        <!--<input type="submit" name="submit" value="submit">-->
        <input type="submit" name="submit" value="submit">
        

    </form>
</body>
</html>
