<?php
session_start();
if (!isset($_SESSION["passwordS"]) || !isset($_SESSION["emailc"]))
  header("location:../WITHDBCAN/index.php");

else {
?>
  <?php
  $TOSCORE = 0;
  try {
    $connect = new PDO("mysql:host=localhost;dbname=clients;port=3306;charset=utf8", "root", "", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  } catch (PDOException $e) {
    echo $e->getMessage();
  }


  $ID_ETUD = $connect->prepare("select  * from educt where id_c=? ");
  $ID_ETUD->execute(array($_SESSION["ID_C"]));
  $VAL = $ID_ETUD->fetchAll(PDO::FETCH_ASSOC);
  $G = 0;
  $ID_ET = [];

  foreach ($VAL as $TABLE) {
    if (is_array($TABLE)) {
      $ID_ET[$G] = $TABLE["ID_ED"];
      $G++;
    }
  }



  //PART OF GRABBING ID OF ID EXPERIANCE
  $ID_EXPR = $connect->prepare("select  * from exprt where id_c=? ");
  $ID_EXPR->execute(array($_SESSION["ID_C"]));
  $VAL1 = $ID_EXPR->fetchAll(PDO::FETCH_ASSOC);
  $G1 = 0;
  $ID_EX = [];
  foreach ($VAL1 as $TABLE) {
    if (is_array($TABLE)) {
      $ID_EX[$G1] = $TABLE["id_exp"];
      $G1++;
    }
  }

  $ID_ETV = $ID_ET[$G - 1] ?? null;
  $ID_EXV = $ID_EX[$G1 - 1] ?? null;

  $SKILLC = $connect->prepare("select * from skills where id_c=?");
  $SKILLC->execute(array($_SESSION["ID_C"]));
  $SKILL = $SKILLC->rowCount();

  $TOSCORE += $SKILL * 2;

  $exprC = $connect->prepare("select * from exprt where id_c=?");
  $exprC->execute(array($_SESSION["ID_C"]));
  $expr = $exprC->rowCount();

  $TOSCORE += $expr * 2;

  $LANGC = $connect->prepare("select * from languages where id_c=?");
  $LANGC->execute(array($_SESSION["ID_C"]));
  $LANG = $LANGC->rowCount();

  $TOSCORE += $LANG;


  $PROC = $connect->prepare("select * from projects where id_exp=? or id_etud=?");
  $PROC->execute(array($ID_EXV, $ID_ETV));
  $PROJET = $PROC->rowCount();

  $TOSCORE += $PROJET * 3;

  $SCORE = $TOSCORE / 5;

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
          <span class="tooltip">Home</span>
        </li>

        <li><a href="#footer"><i class="fa-solid fa-table-columns"></i>
            <span class="nav-item">Dashboard</span></a>
          <span class="tooltip">Dashboard</span>
        </li>

        <li><a href="../NEWFORM.php"><i class="bx bxs-contact"></i>
            <span class="nav-item">FORMULA</span></a>
          <span class="tooltip">FORMULA</span>
        </li>

        <li><a href="#offer"><i class="fa-solid fa-briefcase"></i>
            <span class="nav-item">Offers</span></a>
          <span class="tooltip">Offers</span>
        </li>

        <li><a href="#companie"><i class="bx bxs-building-house"></i>
            <span class="nav-item">Companies</span></a>
          <span class="tooltip">Companies</span>
        </li>
        <li><a href="./DECONCAN.php"><i class="fa-solid fa-plug-circle-minus"></i>
            <span class="nav-item">DISCONNECT</span></a>
          <span class="tooltip" hidden>DISCONNECT</span>
        </li>

      </ul>
    </div>
    <div class="main-content">
      <div class="container">
        <h1><i class="fa-brands fa-fantasy-flight-games" style="color: #FFD43B;"></i><span style="margin-left: 20px;">Candidate area</span></h1>
        <!-- <a href="../FILES/UPLOADS/<?php //if(isset($_SESSION["FILE"])) 

                                        // {echo $_SESSION["FILE"];} 

                                        ?>  " download="MY_CV.pdf">DOWNLOAD CV</a> -->

        <h1 class="header-title" style="text-align: center;">
          Land your next <span>professional </span>opportunity
        </h1>
      </div>
    </div>

    <!--completer le cv-->
    <div class="espace" id="completcv">
      <div class="espace-box">
        <div class="espace-card">
        </div>
      </div>
    </div>


    <!--offers-->
    <section class="offers" id="offer">

      <p><strong>offers</strong></p><br>
      <div class="offers-wrap">

        <?php



        $query = "SELECT * FROM offre";
        $result = $connect->query($query);

        // Vérifiez si des offres ont été trouvées
        if ($result && $result->rowCount() > 0) {
          // Parcourez les résultats et affichez chaque offre
          while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            $title = $row['titre_off'];
            $lieu = $row['lieu'];
            $description = $row['descri'];
            $time = $row['date_pub'];
            $ID = $row['offre_id'];
            $ID_r = $row['id_r'];
            $POST = $row['titre_off'];


            echo "<form  action='./CHAD.php' enctype='multipart/form-data' method='post'>";
            echo "<div class='offers-card' id='card' style='padding:20px' >";
            echo "<h4> $title</h4>";

            echo "<p style='margin:10px'><i class='fa-solid fa-location-dot' style='color: #044ac3;font-size:17px';></i> $lieu </p>";
            echo "<p style='margin:20px'> $description</p>";
            echo "<p > <i class='fa-solid fa-business-time' style='color:red;font-size:17px;'></i> Published on: <span style='font-size:20px'>$time</span></p>";
            echo "<input id='nom' type='text'  name='nom' hidden value=" . $_SESSION["nomc"] . ">";
            echo "<input id='prenom' type='text'  name='prenom' hidden value=" . $_SESSION["prenomc"] . ">";
            echo "<input id='email' type='text'  name='email'  hidden value=" . $_SESSION["emailc"] . ">";
            echo "<input id='TEL' type='text'  name='TEL' hidden value=" . $_SESSION["TEL"] . ">";
            echo "<input id='CV' type='text'  name='file' hidden value=" . $_SESSION["FILE"] . ">";
            echo "<input id='id_of' type='text'  name='id_of' hidden value=" . $ID . ">";
            echo "<input id='id_c' type='text'  name='id_c' hidden value=" . $_SESSION["ID_C"] . ">";
            echo "<input id='score' type='text'  name='score' hidden  value=" . $SCORE . ">";
            echo "<input id='id_r' type='text'  name='id_r' hidden value=" . $ID_r . ">";
            echo "<input id='post' type='text'  name='PST' hidden value=" . $POST . ">";


            echo "</div>";
            echo "</form>";
          }
        } else {
          // Si aucune offre n'est trouvée, affichez un message
          echo "<p> Sorry, no offers are available at the moment.</p>";
        }
        ?>
        <script type="text/javascript">
          document.querySelectorAll("#card").forEach(el => {

            el.addEventListener("click", function() {
              
              el.parentElement.submit();
            })


          })
        </script>
        </form>
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
            <p>Leading national automaker since 1929, with extensive network and over 10,600 employees.</p>
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