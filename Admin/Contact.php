<?php

include 'components/connect.php';
include 'components/constants.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

$variable_1 = "les déchets organiques";
$variable_2 = "les déchets hospitaliers";
$variable_3 = "les déchets industriels";

$num=0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portail de Hawra Distribution (Ventes De produits de la mer) </title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="styles.css">

</head>
<body>
    
<!-- header section starts  -->

<header>

<nav class="NavbarItems">
    <a href="index.php">
      <h1 class="navbar-logo"><i class="fas fa-anchor"></i>Hawra</h1>
    </a>
    <div class="menu-icons">
      <i class="fas fa-bars"></i>
    </div>
    <ul class="nav-menu">
      <li><a class="nav-links" href="index.php"><i class="fas fa-home"></i>Accueil</a></li>
      <li><a class="nav-links" href="Produits.php"><i class="fab fa-product-hunt"></i>Produits</a></li>
      <li><a class="nav-links" href="About.php"><i class="fas fa-info"></i>A propos</a></li>
      <li><a class="nav-links" href="Contact.php"><i class="fas fa-phone"></i>Contact</a></li>
    </ul>
  </nav>

</header>

<!-- header section ends -->

<!-- home-pic section starts  -->

<section class="references" id="references">
            <?php 
            $select_posts = $conn->prepare("SELECT * FROM `contact`  ORDER BY id DESC limit 1");
            $select_posts->execute();
            if($select_posts->rowCount() > 0){
                while($fetch_posts = $select_posts->fetch(PDO::FETCH_ASSOC)){
                $post_id = $fetch_posts['id'];
            ?>
            <?php   if($fetch_posts['image'] != ''){ ?>

            <div class="slide" style="background:url(images/<?= $fetch_posts['image']; ?>) no-repeat">
                <?php
            }?>

            <div class="content">
            <span><?= $fetch_posts['titre']; ?></span>
            <h3><?= $fetch_posts['contenu']; ?></h3>
            </div>

            <?php
                }
                }else{
                    echo '<p class="empty">no posts added yet!</p>';
                    }
            ?>

        </div>
</section>

<!-- home-pic section ends -->

<!-- Contact section starts -->

<div class="contact-details" id="home-project">
          <div class="details" >
            <span>GET IN TOUCH</span>
            <h2>Visit one of our agency locations or contact us today</h2>
            <h3>Head Office</h3>
            <div>
                <li>
                    <i class="fas fa-map"></i>
                    <p>56 Glassford Street Glasgow G1 1UL New York</p>
                </li>
                <li>
                    <i class="far fa-envelope"></i>
                    <p>contact@example.com</p>
                </li>
                <li>
                    <i class="fas fa-phone-alt"></i>
                    <p>+216 54545545</p>
                </li>
                <li>
                    <i class="fas fa-phone-alt"></i>
                    <p>+216 55545470</p>
                </li>
                <li>
                    <i class="far fa-clock"></i>
                    <p>Monday to Saturday: 9.00am to 16.00pm</p>
                </li>
            </div>
          </div>
          <div class="map">

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d481.88264429736506!2d10.954815297703053!3d35.65958726424429!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1302166c8129b42b%3A0xac2c0765f7d780d!2sCaf%C3%A9%20El%20Qods!5e0!3m2!1sfr!2stn!4v1676223472380!5m2!1sfr!2stn" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          
          </div>
</div>

<!-- Contact section ends -->

<!--  section starts -->

<div class="from-container">
    <h1 >Envoyez-nous un message</h1>
    <form action="https://formsubmit.co/hawra.distribution@gmail.com" method="post">
        <input placeholder="Nome"/>
        <input placeholder="Email"/>
        <input placeholder="Sujet"/>
        <textarea placeholder="Message" rows="4"></textarea>
        <button class="btn">Envoyer</button>
    </form>
</div>

<!--  section ends -->






<!-- footer section starts  -->

<section class="footer ">

        <div class="box-container ">
            <div class="box">
                <h3>Liens rapides</h3>
                <a href="index.php"><i class="fas fa-angle-right"></i>Accueil</a>
                <a href="Produits.php"><i class="fas fa-angle-right"></i>Produits</a>
                <a href="About.php"><i class="fas fa-angle-right"></i>A propos</a>
                <a href="Contact.php"><i class="fas fa-angle-right"></i>Contact</a>   
            </div>
        
            <div class="box">
                <h3>Suivez-nous</h3>
                <a href="#"><i class="fab fa-facebook-f ia"></i> facebook </a>
                <a href="#"><i class="fab fa-twitter ia"></i> twiter </a>
                <a href="#"><i class="fab fa-linkedin ia"></i> linkedin </a>
            </div>
        
            <div class="box">
                <h3>Contact info</h3>
                <a href="#"><i class="fas fa-phone ia"></i> +216 54545545</a>
                <a href="#"><i class="fas fa-phone ia"></i> +216 55545470</a>
                <a href="#"><i class="fas fa-envelope ia"></i> contact@tge.tn</a>
                <a href="#"><i class="fas fa-map ia"></i> 33 rue Farhat Hached 5080 Teboulba, Tunisia </a>     
             </div>
        
        </div>


</section>

<!-- footer section ends -->



















<!-- Swiper javascript  link -->

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="main.js"></script>

</body>
</html>