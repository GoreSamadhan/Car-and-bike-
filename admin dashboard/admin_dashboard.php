<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="admin_dashboard.css">
</head>
<body>
  


    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h4 class="text-center">Admin Dashboard</h4>
            </div>

            <button type="button" id="sidebar-Collapse1" style ="margin-left : 15px;" >
            <i class="fa-solid fa-left-long"></i>
            </button>

            <ul class="list-unstyled components">

                <div class="nav-item dropdown mt-3 ms-2" >
                    <li class="nav-item name  dropdown-trigger">
                         <a href="?page=manage_user">Manage Users</a>
                    </li>
                    <li class="nav-item name  dropdown-trigger">
                        <a href="?page=manage_owner">Manage Owners</a>
                    </li>
                    <li class="nav-item name  dropdown-trigger">
                        <a href="?page=total_vehicle">Total vehicles</a>
                    </li>
                    <li class="nav-item name  dropdown-trigger">
                        <a href="?page=total_driver"> Total Drivers</a>
                    </li>
                    <li class="nav-item name logout dropdown-trigger">
                        <a href="?page=total_booking">Total Bookings </a>
                    </li>             
                    <li class="nav-item name logout dropdown-trigger">
                        <a href="?page=manage_package">Manage Packages </a>
                    </li>             
                    <!-- <li class="nav-item name logout dropdown-trigger">
                        <a href="?page=manage_offers">Manage Offers  </a>
                    </li>              -->
                    <li class="nav-item name logout dropdown-trigger">
                        <a href="?page=contact_recived">Contact Received </a>
                    </li>             
                    <li class="nav-item name logout dropdown-trigger">
                        <a href="?page=approvals">Approvals </a>
                    </li>             
                    <li class="nav-item name logout dropdown-trigger">
                        <a href="?page=feedback_recived"> Feedback Received </a>
                    </li>             
                    <li class="nav-item name logout dropdown-trigger">
                        <a href="?page=payment_details"> Payment Details </a>
                    </li>             
                    <li class="nav-item name logout dropdown-trigger">
                        <a href="">Logout </a>
                    </li>             
                </div>       
            </ul>  
        </nav>
    


        <div id="content"> 

            <nav class="navbar navbar-expand-lg  nav-grey">
                    <button type="button" id="sidebar-Collapse2" class="btn btn-info ms-2">
                        <i class="fas fa-align-left"></i>
                    </button>

                    <div onclick="f1('user--info')" id="click" class="user--info"   id="user--info">
                        <img src="profile.png" alt="" height ="50px"; width = "50px">
                    </div>
            </nav>

            <main class="content1">

            <br>
            <br>
            <?php
             
                 $page = isset($_GET['page']) ? $_GET['page'] : 'comartisticwallwiring';

                 $folders = ['ManageUser','ManageOwner','TotalVehical','TotalDrivers','TotalBookings','managePackage','ManageOffers','ContactRecived','Approvals','FeedbackRecived','PaymentsDetails'];

                 foreach ($folders as $folder) {
                    $filePath = "$folder/$page.php";
                    if (file_exists($filePath)) {
                        include($filePath);
                        break; 
                    }
                }
                
            ?>
            </main>

        </div>
    </div>

   
  


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>



    <script>
        $(document).ready(function () {
            $('#sidebar-Collapse1').on('click', function () {
                $('.slider').toggleClass('with-sidebar', $('#sidebar').hasClass('active'));
                $('#sidebar').toggleClass('active');
                $('#content').toggleClass('active');

               
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#sidebar-Collapse2').on('click', function () {
                $('.slider').toggleClass('with-sidebar', $('#sidebar').hasClass('active'));
                $('#sidebar').toggleClass('active');
                $('#content').toggleClass('active');
            });
        });
    </script>

 



</body>
</html>