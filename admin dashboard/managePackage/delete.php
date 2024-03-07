<?php   
//  include 'connection.php';  <?php
//connection file

$connection=mysqli_connect('localhost','root','','journey');

 if (isset($_GET['id'])) {  
      $id = $_GET['id'];  
      $query = "DELETE FROM `packages` WHERE id = '$id'";  
      $run = mysqli_query($connection,$query);  
      if ($run) {  
           header('location:../admin_dashboard.php?page=manage_package');  
      }else{  
           echo "Error: ".mysqli_error($connection);  
      } $reloadPage = true; 
 }  
    $query = "SELECT * FROM `feedback` ";
 ?>  