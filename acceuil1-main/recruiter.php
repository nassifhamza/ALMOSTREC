
<?php
session_start();
if (!isset($_SESSION["passwordS"]) || !isset($_SESSION["emailS"]))
    header("location:../WITHDBREC/index.php");

else {
  
  
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>recruiter area</title>
<!--polices-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<!--icons du pagee-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="icon" href="imgs/icon1.jpg">
<!--menu bar font awesome-->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<!--menu bar boxicons-->
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<!--search icon-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />


<link rel="stylesheet" href="recruiter.css">

</head>
<body>


<a id="openMessageBubble" href="mailto: @gmail.com?subject=Sujet%20de%20l'email&body=Corps%20du%20message">
    <button class="fa-regular fa-paper-plane" style="position: fixed;
            bottom: 20px;
            left: 20px;
            border: none;
            border-radius: 10px;
            font-size: 30px;
            cursor: pointer;
            z-index: 1000;
            background-color: transparent;
            color: #15354dea;">
    </button>
</a>

<!--navbar -->


<div class="sidebar">
  <div class="top">
    <div class="logo">
      <i class="fa-solid fa-user"></i></i><!--fas fa-briefcase--> 


      
      <span style="margin-left: 40px;"><?php  echo $_SESSION["user"]?></span>
    </div>
    <i class="bx bx-menu" id="btn"></i>
  </div>
  <ul>
     
     
      <li><a href="index.php"><i class="fa-solid fa-house"></i>
      <span class="nav-item">Home</span></a>
      <span class="tooltip" hidden>Home</span></li>

      <li><a href="bakirdash/view_applyb.php"><i class="fa-solid fa-table-columns"></i>
      <span class="nav-item">Applies</span></a>
      <span class="tooltip" hidden>Applies</span></li>

      <!-- <li><a href="bakirdash/autreinformation.php"><i class="bx bxs-contact"></i>
      <span class="nav-item">Autre info</span></a>
      <span class="tooltip" hidden>Autre info</span></li> -->
      <li><a href="#postoffer"><i class="bx bxs-contact"></i>
      <span class="nav-item">Account</span></a>
      <span class="tooltip" hidden>Account</span></li>
      <li><a href="./DECONREC.php"><i class="fa-solid fa-plug-circle-minus"></i>
      <span class="nav-item">Disconnect</span></a>
      <span class="tooltip" hidden>Disconnect</span></li>
     


  </ul>
</div>
<div class="main-content">
  <div class="container">
    <h1><i class="fa-solid fa-building"></i> <span style="margin-left: 10px;">Recruter</span></h1>
    <h1 class="header-title" style="padding: 2px;text-align:center;">
      Find the <span>perfect talent</span> for your business
   </h1>
  </div>
</div>

<!--completer le cv-->
<div class="espace" id="postoffer">
  <div class="espace-box">
    <div class="espace-card">
      <a href="bakirdash/postjob.php"><button  class="espace-button"><i class="fa-regular fa-file"></i> Post an offer</button></a>
    </div>
  </div>
</div>


<!--join us-->
<section class="join" id="join">
  <div class="join-detail">
    <h1 class="section-title">Step into your exciting new role</h1>
    <p>Discover Your Next Career Move. Explore Opportunities with Us!
      Join our team at JoBNesT and embark on a rewarding career journey. From entry-level positions to leadership roles, we offer opportunities for growth and development in a dynamic environment.</p>
  </div>
</section>

<!--contact ,about -->
<footer id="footer">
  <div class="footer-wrap">
   <h3>Contact Us</h3>
   
   <div class="social-media">
    <a href="#" class="linkd"> <i class="fab fa-linkedin"></i></a>
    <a href="#" class="twit"> <i class="fab fa-twitter"></i></a>
    <a href="#" class="inst"> <i class="fab fa-instagram"></i></a>
    <a href="#" class="ytp"> <i class="fab fa-youtube"></i></a>
   </div>
  </div>

  <div class="footer-wrap">
    <h4>Explore</h4>
    <a href="#">Top Companies</a>
    <a href="#">Terms of Service</a>
    <a href="#">Podcasts</a>
    <a href="#">Careers</a>
  </div>

  <div class="footer-wrap">
      <h4>Others</h4>
      <a href="#">FAQ</a>
      <a href="#">Get Inspired</a>
      <a href="#">Digital diary</a>
  </div>

  <div class="footer-wrap">
    <h4>Encourage</h4>
    <a href="#">Customer support</a>
    <a href="#">Trust & Safety</a>
    <a href="#">Partnership</a>
  </div>

  <div class="footer-wrap">
    <h4>Network</h4>
    <a href="#">Network</a>
    <a 
    href="#">Invit a friend</a>
    <a href="#">Events</a>
  </div>
<button class="btn"></button>

  <!--contact  
  <section class="contact">
    <div class="content">
      <h2>Contact Us</h2>
      <p>Need additional information or help with your recruitment? Send us an email, fill out our online form or call us. WorkEase is here to help you!</p>
    </div>
    <div class="container">
      <div class="contactinfo">
        <div class="box">
          <div class="icon"></div>
          <div class="text">
            <h3><i class="fa-solid fa-location-dot"></i>Address</h3><p>123 Main Street Cityville, State 12345 United States</p>
            <h3><i class="fa-regular fa-envelope"></i>Email :</h3><p> workease@gmail.com</p>
            <h3><i class="fa-solid fa-phone"></i>Call-us:</h3> <p> +353 1 512 4400</p>
          </div>
        </div>
      </div>
    </div>
  </section>
-->

</footer>

<script src="recruiter.js"></script>
</body>
</html>


<?php } ?>