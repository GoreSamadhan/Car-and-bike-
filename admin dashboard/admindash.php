
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admindash.css">
</head>
<body>
    <div class="sidebar">
        <div class="logo"></div>
        <ul class="menu">
            <li class="active">
                <a href="#"><span>Dashboard </span></a>
            </li>
            <li onclick="f1('manage_user')" id="click">
                <a href="#"><span> Manage Users </span></a>
            </li>
            <li onclick="f1('manage_owner')" id="click">
                <a href="#"><span> Manage Owners </span></a>
            </li>
             <li onclick="f1('total_vehicle')" id="click">
                <a  href="#"><span> Total vehicles </span></a>
            </li>
            <li onclick="f1('total_drivers')" id="click">
                <a href="#"><span> Total Drivers</span></a>
            </li>
            <li onclick="f1('total_bookings')" id="click">
                <a href="#"><span> Total Bookings </span></a>
            </li>
            <li onclick="f1('manage_packages')" id="click">
                <a href="#"><span> Manage Packages </span></a>
            </li>
            <li onclick="f1('manage_offers')" id="click">
                <a href="#"><span> Manage Offers </span></a>
            </li>
            <li onclick="f1('contact_received')" id="click">
                <a href="#"><span> Contact Received </span></a>
            </li>
            <li onclick="f1('approvals')" id="click">
                <a href="#"><span> Approvals </span></a>
            </li>
            <li onclick="f1('feedback_received')" id="click">
                <a href="#"><span> Feedback Received </span></a>
            </li>
            <li onclick="f1('payment_details')" id="click">
                <a href="#"><span> Payment Details </span></a>
            </li>
        </ul>
    </div>

    <div class="main--content">
        <div class="header--wrapper">
            <div class="header--title">
                <span>Admin</span>
                <h2>Dashboard</h2>
            </div>
            <div class="user--info">
                <!-- <div class="search--box">
                    <i>o</i>
                    <input type="text" placeholder="Search">
                </div> -->
                <img src="profile.png" alt="">
            </div>
        </div>

        <!-- <div  class="card--container" id="dash_item" >
            <h3 class="main--title">Dashboard</h3>
            <div class="card--wrapper" >
                <div class="prev--card">
                    <div class="card--header">
                        <div class="amount">
                            <span class="title"></span><br>
                            <span class="title"></span>
                            <span class="title"></span>
                            <span class="title">You Saved</span><br>
                            <span class="amount--value">Rs 5599</span>
                        </div>                    
                    </div>
                </div>               
            </div>
        </div> -->


         <!-- <?php
            include("ManageUser/manage_user.php")
        ?>
        <?php
            include("ManageOwner/manage_owner.php")
        ?>     -->
   
        <?php
            include("managePackage/manage_package.php")
        ?>   

    <script>
        
        function f1(divId) {
        document.querySelectorAll('.card--container').forEach(div => {
            div.style.display = "none";
        });
        document.getElementById(divId).style.display = "block";
    }
        
    </script>
</body>
</html>
