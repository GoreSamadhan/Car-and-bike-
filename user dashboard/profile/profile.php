
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "journey";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$selectQuery = "SELECT fullName, email, phoneNumber FROM registration_form";
$result = $conn->query($selectQuery);

if ($result->num_rows > 0) {
    // Output data of each row
    $row = $result->fetch_assoc();
    $Name = $row['fullName'];
    $Phoneno = $row['email'];
    $Email = $row['phoneNumber'];

    

} else {
    echo "0 results";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    
    
       .card--container{
    background: #fff;
    padding: 3rem;
    border-radius: 10px;
    height: 20%;
    width: 30%;
    background: #F2E6FF;
    margin-left: 40px;
    
           
       
} 

    

.card--wrapper{
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;

    
}
.main--title{
    color: rgba(113, 99, 186, 255);
    padding-bottom: 10px;
    font-size: 15px;

}
.prev--card{
    background: rgb(229, 223, 223);
    border-radius: 10px;
    padding: 1.2rem;
    width: 290px;
    height: 275px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    /* transition: all 0.5s ease-in-out; */
    display: none;


}
.card--header{
    display:flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;

}

.amount{
    display: flex;
    flex-direction: column;


}
.amount input{
    width: 100%;
    border-radius: 4px;
    height: 25px;
}
.title{
    font-size: 20px;
    font-weight: 200;
    padding: 4px;
    font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    
    
}
    

    .outerbody{
    width: 100%;  
    height: 70vh;  
    background-color: #ebe9e9;  
    position: relative;  
    font-family: 'verdana',sans-serif;
    
}  
</style>
</head>
<body>
<div class="card--container" id="user--info">

<h3 class="profile--title">Profile</h3>
<div class="card--wrapper">
    <div class="profile--card">
        <div class="card--header">
            <div class="amount">
                <img src="profile.png" alt="" height="70px" width="70px">
                <span class="title" id="fullName">Name :-
                    <?php echo $row['fullName']; ?>
                </span><br>
                <span class="title">Phone no.:-
                    <?php echo $row['phoneNumber']; ?>
                </span><br>
                <span class="title">Email :-
                    <?php echo $row['email']; ?>
                </span><br>
                
                
            </div>

        </div>

    </div>

</div>
</div>
</body>
</html>