
<?php
session_start();
if (!isset($_SESSION["passwordS"]) || !isset($_SESSION["emailc"]))
    header("location:../WITHDBCAN/index.php");

else {  
  ?>

<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>candidate area</title>
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
  <link rel="stylesheet" href="condidat.css">
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
        <i class="fa-solid fa-user"></i><!--fas fa-briefcase-->
        <span style="margin-left:40px;"></i> <?php echo $_SESSION["userc"] ?> </span>
      </div>
      <i class="bx bx-menu" id="btn"></i>
    </div>
    <ul>

    <li><a href="index.php"><i class="fa-solid fa-house"></i>
          <span class="nav-item">Home</span></a>
        <span class="tooltip" hidden>Home</span>
      </li>

      <li><a href="#footer"><i class="fa-solid fa-table-columns"></i>
          <span class="nav-item">Dashboard</span></a>
        <span class="tooltip" hidden>Dashboard</span>
      </li>

      <li><a href="#completcv"><i class="bx bxs-contact"></i>
          <span class="nav-item">Account</span></a>
        <span class="tooltip" hidden>Account</span>
      </li>

      <li><a href="#offer"><i class="fa-solid fa-briefcase"></i>
          <span class="nav-item">Offers</span></a>
        <span class="tooltip" hidden>Offers</span>
      </li>

      <li><a href="#companie"><i class="bx bxs-building-house"></i>
          <span class="nav-item">Companies</span></a>
        <span class="tooltip" hidden>Companies</span>
      </li>
      <li><a href="./DECONCAN.php"><i class="fa-solid fa-plug-circle-minus"></i>
      <span class="nav-item">Disconnected</span></a>
      <span class="tooltip" hidden>Disconnected</span></li>

    </ul>
  </div>
  <div class="main-content">
    <div class="container">
      <h1><i class="fa-brands fa-fantasy-flight-games" style="color: #FFD43B;"></i><span style="margin-left: 20px;">Candidate area</span></h1>
      <h1 class="header-title" style="text-align: center;">
        Land your next <span>professional </span>opportunity
      </h1>
    </div>
  </div>

  <!--completer le cv-->
  <div class="espace" id="completcv">
    <div class="espace-box">
      <div class="espace-card">
        <a href="../index.php"><button class="espace-button"><i class="fa-regular fa-file"></i> Complete my CV</button></a>
      </div>
    </div>
  </div>


  <!--offers-->
  <section class="offers" id="offer">

    <p><strong>offers</strong></p><br>
    <div class="offers-wrap">
    <?php


    // Si aucune offre n'est trouvée, affichez un message
    echo "<p> PLEASE COMPLETE YOUR CV FIRST SO YOU CAN VIEW ALL THE OFFERS </p>";

?>


    </div>
  </section>

  <!--companies-->
  <section class="companies" id="companie">
    <p><strong>Companies</strong> </p>
    <div class="companies-wrap">
      <div class="companies-card">
        <img class="companies-img" src="imgs/pic44.png">
        <div class="companies-detail">
          <span>Published on january 2024</span>
          <h4>Renault Maroc -Settat</h4>
          <p style="text-align: center;">Leading national automaker since 1929, with extensive network and over 10,600 employees.</p>
          <hr class="divider">
          <a href="#" class="companies-more">Read more</a>
        </div>
      </div>
      <div class="companies-card">
        <img class="companies-img" src="imgs/pic55.png">
        <div class="companies-detail">
          <span>Published on march 2024</span>
          <h4>ORANGE MA - Casablanca</h4>
          <p>Telecom operator formed in 1999 through strategic alliances, with 420 retail points and about 1300 employees.</p>
          <hr class="divider">
          <a href="#" class="companies-more">Read more</a>
        </div>
      </div>
      <div class="companies-card">
        <img class="companies-img" src="imgs/pic11.png">
        <div class="companies-detail">
          <span>Published on April 2024</span>
          <h4>ROYAL AIR MAROC (RAM)</h4>
          <p>African airline leader, leading global partner, employing more than 6,200 people.</p>
          <hr class="divider">
          <a href="#" class="companies-more">Read more</a>
        </div>
      </div>
      <div class="companies-card">
        <img class="companies-img" src="imgs/pic22.png">
        <div class="companies-detail">
          <span>Published on April 2024</span>
          <h4>CDG</h4>
          <p>Dynamic public finance since 1959.</p>
          <hr class="divider">
          <a href="#" class="companies-more">Read more</a>
        </div>
      </div>

    </div>

  </section>


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
      <a href="#">Invit a friend</a>
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

  <script src="condidat.js"></script>
</body>

</html>

 <?php } ?>