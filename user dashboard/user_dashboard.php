<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="user_dashboard.css">
</head>
<body>
  


    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h4 class="text-center">User Dashboard</h4>
            </div>

            <button type="button" id="sidebar-Collapse1" style ="margin-left : 15px;" >
            <i class="fa-solid fa-left-long"></i>
            </button>

            <ul class="list-unstyled components">

                <div class="nav-item dropdown mt-3 ms-2" >
                    <li class="nav-item name  dropdown-trigger">
                         <a href="../CAR/home.php">Dashboard </a>
                    </li>
                    <li class="nav-item name  dropdown-trigger">
                         <a href="?page=currentbooking">Current Bookings</a>
                    </li>
                    <li class="nav-item name  dropdown-trigger">
                        <a href="?page=upcomingbooking">Upcoming bookings </a>
                    </li>
                    <li class="nav-item name  dropdown-trigger">
                        <a href="?page=booking">All Bookings </a>
                    </li>
                    <li class="nav-item name  dropdown-trigger">
                        <a href="?page=cancelledbooking">Cancelled Bookings</a>
                    </li>
                    <li class="nav-item name  dropdown-trigger">
                        <a href="">Applied Coupans </a>
                    </li>
                    <li class="nav-item name  dropdown-trigger">
                        <a href="?page=updateprofile">Update Profile</a>
                    </li>
                    <li class="nav-item name logout dropdown-trigger">
                        <a href="../CAR/logout.php">Logout </a>
                        <?php
                        //  unset($_SESSION['fullName']);
                        // session_unset();
                        ?> 


                    </li>             
                </div>       
            </ul>  
        </nav>
    


        <div id="content"> 

            <nav class="navbar navbar-expand-lg  nav-grey">
                    <button type="button" id="sidebar-Collapse2" class="btn btn-info ms-2">
                        <i class="fas fa-align-left"></i>
                    </button>
           

                     <a href="?page=profile">
                        <div onclick="f1('user--info')" id="click" class="user--info"   id="user--info">
                            <img src="profile.png" alt="" height ="50px" width = "50px">
                        </div>
                    </a>
            </nav>
            <main class="content1">

            <br>
            <br>
            <?php
             
                //  $page = isset($_GET['page']) ? $_GET['page'] : 'comartisticwallwiring';

                 $page = isset($_GET['page']) ? $_GET['page'] : 'profile';

                 $folders = ['update profile','profile','current booking','upcoming booking','All Book','cancelled booking'];
                 

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