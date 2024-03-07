<?php   
 include 'connection.php';  
 if (isset($_GET['id'])) {  
      $id = $_GET['id'];  
      $query = "DELETE FROM `vehicle` WHERE id = '$id'";  
      $run = mysqli_query($connection,$query);  
      if ($run) {  
           header('location:../owner_dashboard.php?page=managevehicles');  
      }else{  
           echo "Error: ".mysqli_error($connection);  
      } $reloadPage = true; 
 }  
 ?>  