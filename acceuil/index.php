<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--lien vers css-->
 <link rel="stylesheet" href="style.css">
 <!--polices-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
<!--icons-->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
 <link rel="icon" href="imgs/icon1.jpg">

 <title>WorkEase : Job offers, Advice and News, Alerts, CV…</title>

</head>

<body>
  <button class="btn"></button>
<!--navbar-->

<nav class="navbar">
  <h2 class="navbar-logo"><a href="#">WORKEASE</a></h2>
  <div class="navbar-menu">
    
    <a href="#news"> <i class="fa-solid fa-paperclip"></i> News</a>
    <a href="#offers">Offers</a>
    <a href="#companies">Companies</a>
    <a href="#createcv">create CV</a>
    
    <!--je vais la faire une boutton<a href="#">Sign In</a>-->
  </div>
  <div class="menu-toggle">
    <span class="bar"></span>
    <span class="bar"></span>
    <span class="bar"></span>
  </div>
</nav>

<!--header-->
<header>
   <h1 class="header-title">
    Your source of <span>Opportunities!</span>
   </h1>
</header>

 <!--les espaces Cand et Recr-->
<div class="espace">
  <div class="espace-box">
    <div class="espace-card">
      <button  class="espace-button" onclick="location.assign('../WITHDBCAN/index.php')" >Espace Candidat</a> </button> 
      <button  class="espace-button"  onclick="location.assign('../WITHDBREC/index.php')">Espace Recruteur </button>
    </div>
  </div>
</div>

<!--news & conseils pour ton cariere -->
<section class="news1" id="news">

 <h1 class="section-title">News and Career Advice</h1>

 <p><strong>Job news</strong></p><br>
 <div class="news-wrap">
  <div class="news-card">
    <img class="news-img" src="imgs/pic-news.jpg">
    <div class="news-detail">
      <span>Published on january 2024</span>
      <h4>Few private sector workers seek public sector shifts, but could this change?</h4>
      <hr class="divider">
      <a href="#" class="new-more">Read more</a>
    </div>
  </div>
    <div class="news-card">
      <img class="news-img" src="imgs/pic5.webp">
      <div class="news-detail">
        <span>Published on march 2024</span>
        <h4>Justice mandates equal treatment: 'Equal pay for equal work</h4>
        <p>New hires have challenged their lower salary than their colleagues with more seniority. They won their case.</p>
        <hr class="divider">
        <a href="#" class="new-more">Read more</a>
      </div>
  </div>
  <div class="news-card">
    <img class="news-img" src="imgs/pic6.webp">
    <div class="news-detail">
      <span>Published on April 2024</span>
      <h4>Can my employer mandate vacation during the Olympics?</h4>
      <p>Rather than granting teleworking days, does the company have the right to put its employees on forced vacation? Answer with a labor lawyer.</p>
      <hr class="divider">
      <a href="#" class="new-more">Read more</a>
    </div>
 </div>
 <div class="news-card">
  <img class="news-img" src="imgs/pic7.webp">
  <div class="news-detail">
    <span>Published on April 2024</span>
    <h4>Morocco company pays 70% salary for year off</h4>
    <p>This large French group offers some of its employees the opportunity to take time for themselves while receiving the majority of their remuneration.</p>
    <hr class="divider">
    <a href="#" class="new-more">Read more</a>
  </div>
</div>

</div>
</section>

<section class="news1" id="news">
 <p><strong>Career advice</strong> </p>

 <div class="news-wrap">
  <div class="news-card">
    <img class="news-img" src="imgs/pic-cv.webp">
    <div class="news-detail">
      <span>Published on january 2024</span>
      <h4>Intimidating CV trend</h4>
      <p>The current trend of overly embellished CVs is off-putting to recruiters, cautioning against its adoption.</p>
      <hr class="divider">
      <a href="#" class="new-more">Read more</a>
    </div>
    </div>
    <div class="news-card">
      <img class="news-img" src="imgs/pic8.webp">
      <div class="news-detail">
        <span>Published on march 2024</span>
        <h4>Wage Garnishment Explained</h4>
        <p>PAYDAY ENTRY. In the event of unpaid debts, a creditor can take legal action to demand recovery of debts. Details and advice on the salary garnishment procedure.</p>
        <hr class="divider">
        <a href="#" class="new-more">Read more</a>
      </div>
  </div>
  <div class="news-card">
    <img class="news-img" src="imgs/pic9.webp">
    <div class="news-detail">
      <span>Published on April 2024</span>
      <h4>Identifying Workplace Manipulation: 5 Key Signs</h4>
      <p>Is your colleague or manager a manipulator? A psychoanalyst gives you the keys to answer the question.</p>
      <hr class="divider">
      <a href="#" class="new-more">Read more</a>
    </div>
 </div>
 <div class="news-card">
  <img class="news-img" src="imgs/pic0.webp">
  <div class="news-detail">
    <span>Published on April 2024</span>
    <h4>Unlock Your Hidden Talents: The Test Companies Adore</h4>
    <p>This personality test taken by 20 million people around the world helps develop self-esteem, explains a coach.</p>
    <hr class="divider">
    <a href="#" class="new-more">Read more</a>
  </div>
</div>

</div>

</section>

<!--join us-->
<section class="join">
  <div class="join-detail">
    <h1 class="section-title">Step into your exciting new role</h1>
    <p>Discover Your Next Career Move. Explore Opportunities with Us!
      Join our team at WorkEase and embark on a rewarding career journey. From entry-level positions to leadership roles, we offer opportunities for growth and development in a dynamic environment.</p>
  </div>
  <button class="subscribe">Subscribe</button>
</section>

<!--footer-->
<footer>
  <div class="footer-wrap">
   <h3>WorkEase</h3>
   <p>WorkEase streamlines recruiter-candidate communication, enhancing the efficiency of the hiring process. With its user-friendly interface, it simplifies interactions and fosters better engagement. Say hello to smoother recruitment experiences with WorkEase.</p>
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
      <h4>About</h4>
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

</footer>


<script src="app.js"></script>
</body>
</html>