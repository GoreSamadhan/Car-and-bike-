<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="contact.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">


</head>

<body>

  <div class="abs">

    <!-- <video src="./img/Road.mp4" class="vid" autoplay loop type="video/mp4"></video> -->
    <img src="./img/envelop.jpg" class="vid" alt="">
    <div class="container ">
      <h1>Contact Us</h1>
      <div class="main">

        <form action="connect.php" method="post">
          <div class="col">
            <!-- <label class="row1">Name</label> -->
            <input type="text" name="name" class="row2" id="name" required placeholder="Name">
          </div>
          <div class="col">
            <!--           
          <input type="text" id="phone" name="phone" class="row2" pattern="^\d{10}$" required title="Please enter a valid 10-digit Contact number"
            id="phone" required placeholder="Mobile Number"> 
           -->
            <input type="text" id="phone" class="row2" name="phone" required pattern="^\d{10}$" required
              placeholder="Your Mobile">

          </div>
          <div class="col">
            <!-- <label class="row1">Email</label> -->
            <input type="email" name="email" class="row2" id="email" placeholder="Email">
          </div>
          <div class="col">
            <!-- <label class="row1">City</label> -->
            <input type="text" name="city" class="row2" id="city" required placeholder="City">
          </div>
          <div class="col">
            <!-- <label class="row1">How can we help ?</label> -->
            <textarea type="text" name="message" rows="2" placeholder="How can we help ?"></textarea>
            <!-- <input type="text" type="number" class="row2" id="...." placeholder="Optional"> -->
          </div>
          <!-- <div class="btn"><button>Submit</button></div> -->
          <button class="btn btn-outline-primary" class="button">Sumbit</button>
        </form>
        <div class="info">
          <h4>Want a solution ?</h4>
          <h5>Contact with our Experts</h5>
          <div class="detail">
            <img src="" alt="">
            <h6>Phone :</h6>1234567890</p>
            <img src="" alt="">
            <h6>Email :</h6>
            <p>rental@gmail.com</p>
            <img src="" alt="">
            <h6>Website :</h6>
            <p>www.rental.com</p>
            <div class="icons">
              <i class="bi bi-instagram"></i>
              <i class="bi bi-twitter"></i>
              <i class="bi bi-facebook"></i>
              <i class="bi bi-whatsapp"></i>
              <i class="bi bi-messenger"></i>
            </div>
          </div>
        </div>
      </div>
      <br>
      <br>
      <div class="">

        <div class="cards">
          <!-- <h3>Our Prime Locations</h3> -->

          <div class="card text-center mb-3" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Pune</h5>
              <p class="card-text">Allianze House,2nd floor, Near old bird valley hotel HDFC colony, Pimpri Chinchwad,
                411019, Pune, Maharashtra 411019</p>
              <button class="btn btn-outline-primary">Location</button>
            </div>
          </div>

          <div class="card text-center mb-3" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Mumbai</h5>
              <p class="card-text">Allianze House,2nd floor, Near old bird valley hotel HDFC colony, Pimpri Chinchwad,
                411019, Pune, Maharashtra 411019</p>
              <button class="btn btn-outline-primary">Location</button>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
  <br>
  <br>
  <br>
  <br>

  <div class="map"><iframe
      src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d30239.4319795062!2d73.8224469!3d18.6671819!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2b9022416894f%3A0xb460d5bd2755708a!2sTechview%20Infotech%20Pvt%20Ltd!5e0!3m2!1sen!2sin!4v1703833314767!5m2!1sen!2sin"
      style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>

</body>

</html>