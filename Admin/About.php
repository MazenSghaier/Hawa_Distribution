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
            $select_posts = $conn->prepare("SELECT * FROM `ref_accueil`  ORDER BY id DESC limit 1");
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

<!-- home-pic section ends  -->

<!-- About section starts  -->

<section class="home-about" id="home-about">

<h1 class="heading"> <i class="fas fa-quote-left"></i> À propos de nous <i class="fas fa-quote-right"></i> </h1>

<div class="row">

            <?php
            $select_posts = $conn->prepare("SELECT * FROM `about` ORDER BY id DESC limit 1");
            $select_posts->execute();
            if($select_posts->rowCount() > 0){
                while($fetch_posts = $select_posts->fetch(PDO::FETCH_ASSOC)){
                $post_id = $fetch_posts['id'];
            ?>

    <div class="image">
        <?php   if($fetch_posts['image'] != ''){ ?>
        <img src="images/<?= $fetch_posts['image']; ?>" alt="">
            <?php
            }?>
    </div>

    <div class="content">
        <h3><?= $fetch_posts['titre']; ?></h3>
        <p><?= $fetch_posts['contenu']; ?></p>
    </div>
    <?php
    }
        }else{
            echo '<p class="empty">no posts added yet!</p>';
        }
    ?>

</div>

</section>

<!-- About section ends -->


<!-- Description section starts  -->

<div class="image-card-container">
      
    <?php
            $select_posts = $conn->prepare("SELECT * FROM `about_images` where position=? ORDER BY id DESC limit 1");
            $select_posts->execute(['1']);
            if($select_posts->rowCount() > 0){
                while($fetch_posts = $select_posts->fetch(PDO::FETCH_ASSOC)){
                $post_id = $fetch_posts['id'];
            ?>
        <div  class="image-card">
        <?php   if($fetch_posts['image'] != ''){ ?>
            <img src="images/<?= $fetch_posts['image']; ?>" alt=""> 
            <?php
            }?>
          <div class="image-card-content">
            <h3 class="image-card-title"><?= $fetch_posts['titre']; ?></h3>
            <p class="image-card-description"><?= $fetch_posts['contenu']; ?></p>
          </div>
        </div>

        <?php
            }
            }else{
                echo '<p class="empty">no posts added yet!</p>';
            }
            ?>

        <?php
            $select_posts = $conn->prepare("SELECT * FROM `about_images` where position=? ORDER BY id DESC limit 1");
            $select_posts->execute(['2']);
            if($select_posts->rowCount() > 0){
                while($fetch_posts = $select_posts->fetch(PDO::FETCH_ASSOC)){
                $post_id = $fetch_posts['id'];
            ?>

        <div  class="image-card">
        <?php   if($fetch_posts['image'] != ''){ ?>
            <img src="images/<?= $fetch_posts['image']; ?>" alt=""> 
            <?php
                }?>
          <div class="image-card-content">
          <h3 class="image-card-title"><?= $fetch_posts['titre']; ?></h3>
            <p class="image-card-description"><?= $fetch_posts['contenu']; ?></p>
          </div>
        </div>

        <?php
            }
            }else{
                echo '<p class="empty">no posts added yet!</p>';
            }
            ?>

        <?php
            $select_posts = $conn->prepare("SELECT * FROM `about_images` where position=? ORDER BY id DESC limit 1");
            $select_posts->execute(['3']);
            if($select_posts->rowCount() > 0){
                while($fetch_posts = $select_posts->fetch(PDO::FETCH_ASSOC)){
                $post_id = $fetch_posts['id'];
            ?>

        <div  class="image-card">
        <?php   if($fetch_posts['image'] != ''){ ?>
            <img src="images/<?= $fetch_posts['image']; ?>" alt=""> 
            <?php
                }?>
          <div class="image-card-content">
          <h3 class="image-card-title"><?= $fetch_posts['titre']; ?></h3>
            <p class="image-card-description"><?= $fetch_posts['contenu']; ?></p>
          </div>
        </div>

        <?php
            }
            }else{
                echo '<p class="empty">no posts added yet!</p>';
            }
            ?>
    </div>

<!-- Description section ends -->







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