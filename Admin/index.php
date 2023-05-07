<?php

include 'components/connect.php';
include 'components/constants.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portail de Hawra Distribution (Ventes De produits de la mer) </title>

    <!-- swiper css link  -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

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
    <?php
            $select_posts = $conn->prepare("SELECT * FROM `".TABLE_ABOUT."` ORDER BY id DESC limit 1");
            $select_posts->execute();
            if($select_posts->rowCount() > 0){
                while($fetch_posts = $select_posts->fetch(PDO::FETCH_ASSOC)){
                $post_id = $fetch_posts['id'];
            ?>
        <?php   if($fetch_posts['image'] != ''){ ?>
            <h1 class="navbar-logo"><img src="images/<?= $fetch_posts['image']; ?>" alt="Logo" class="image">Hawra</h1>
            
      <?php
      }
    }
        }else{
            echo '<p class="empty">no logo added yet!</p>';
        }
    ?>
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

<!-- home section starts  -->

<section class="home"  id="home">

    
    <div class="swiper home-slider" method="post">

        <div class="swiper-wrapper">

            <?php 
            $select_posts = $conn->prepare("SELECT * FROM `".TABLE_ACCUEIL."`  where position= ? ORDER BY id DESC limit 1");
            $select_posts->execute(['1']);
            if($select_posts->rowCount() > 0){
                while($fetch_posts = $select_posts->fetch(PDO::FETCH_ASSOC)){
                $post_id = $fetch_posts['id'];
            ?>

            <?php   if($fetch_posts['image'] != ''){ ?>
            <div class="swiper-slide  slide" style="background:url(images/<?= $fetch_posts['image']; ?>) no-repeat">
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

            <?php
            $select_posts = $conn->prepare("SELECT * FROM `".TABLE_ACCUEIL."`  where position= ? ORDER BY id DESC limit 1");
            $select_posts->execute(['2']);
            if($select_posts->rowCount() > 0){
                while($fetch_posts = $select_posts->fetch(PDO::FETCH_ASSOC)){
                $post_id = $fetch_posts['id'];
            ?>

            <?php   if($fetch_posts['image'] != ''){ ?>
            <div class="swiper-slide  slide" style="background:url(images/<?= $fetch_posts['image']; ?>) no-repeat">
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

            <?php
            $select_posts = $conn->prepare("SELECT * FROM `".TABLE_ACCUEIL."`  where position= ? ORDER BY id DESC limit 1");
            $select_posts->execute(['3']);
            if($select_posts->rowCount() > 0){
                while($fetch_posts = $select_posts->fetch(PDO::FETCH_ASSOC)){
                $post_id = $fetch_posts['id'];
            ?>

            <?php   if($fetch_posts['image'] != ''){ ?>
            <div class="swiper-slide  slide" style="background:url(images/<?= $fetch_posts['image']; ?>) no-repeat">
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

        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        
    </div>

</section>


<!-- home section ends -->

<!-- about section starts  -->

<section class="home-about" id="home-about">

<h1 class="heading"> <i class="fas fa-quote-left"></i> À propos de nous <i class="fas fa-quote-right"></i> </h1>

<div class="row">

            <?php
            $select_posts = $conn->prepare("SELECT * FROM `".TABLE_ABOUT."` ORDER BY id DESC limit 1");
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

<!-- about section ends -->

<!-- project section starts  -->
<section class="product">
<div class="home-project" id="home-project">
  <h1 class="heading">
    <i class="fas fa-quote-left" style="color: #9fc5e8"></i> Nos nouveaux produits
    <i class="fas fa-quote-right" style="color: #9fc5e8"></i>
  </h1>
            <?php
            $select_posts = $conn->prepare("SELECT * FROM `".TABLE_PROJECT."` where position=? ORDER BY id DESC limit 1");
            $select_posts->execute(['1']);
            if($select_posts->rowCount() > 0){
                while($fetch_posts = $select_posts->fetch(PDO::FETCH_ASSOC)){
                $post_id = $fetch_posts['id'];
            ?>
  <div class="pro-container">
  <a href="Produit.php?id=<?= $post_id; ?> ">
      <div  class="pro">
      <?php   if($fetch_posts['image1'] != ''){ ?>
            <img src="images/<?= $fetch_posts['image1']; ?>" alt=""> 
            <?php
                }?>
          <div class="icons">
            <span><?= $fetch_posts['titre']; ?></span>
            <h5><?= $fetch_posts['resume']; ?></h5>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <?php   if($fetch_posts['affiche_prix'] == '1'){ ?>
                <h4><?= $fetch_posts['prix']; ?> DT</h4>
                <?php
                }?>
          </div>
          <button type="button" class="btn">Voir plus</button>
      </div>
      </a>
      <?php
            }
            }else{
                echo '<p class="empty">no posts added yet!</p>';
            }
            ?>
  </div>

  
            <?php
            $select_posts = $conn->prepare("SELECT * FROM `".TABLE_PROJECT."` where position=? ORDER BY id DESC limit 1");
            $select_posts->execute(['2']);
            if($select_posts->rowCount() > 0){
                while($fetch_posts = $select_posts->fetch(PDO::FETCH_ASSOC)){
                $post_id = $fetch_posts['id'];
            ?>
  <div class="pro-container">
  <a href="Produit.php?id=<?= $post_id; ?> ">
      <div  class="pro">
      <?php   if($fetch_posts['image1'] != ''){ ?>
            <img src="images/<?= $fetch_posts['image1']; ?>" alt=""> 
            <?php
                }?>
          <div class="icons">
            <span><?= $fetch_posts['titre']; ?></span>
            <h5><?= $fetch_posts['resume']; ?></h5>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <?php   if($fetch_posts['affiche_prix'] == '1'){ ?>
                <h4><?= $fetch_posts['prix']; ?> DT</h4>
                <?php
                }?>
          </div>
          <button type="button" class="btn">Voir plus</button>
      </div>
      </a>
      <?php
            }
            }else{
                echo '<p class="empty">no posts added yet!</p>';
            }
            ?>
  </div>

  
            <?php
            $select_posts = $conn->prepare("SELECT * FROM `".TABLE_PROJECT."` where position=? ORDER BY id DESC limit 1");
            $select_posts->execute(['3']);
            if($select_posts->rowCount() > 0){
                while($fetch_posts = $select_posts->fetch(PDO::FETCH_ASSOC)){
                $post_id = $fetch_posts['id'];
            ?>
  <div class="pro-container">
  <a href="Produit.php?id=<?= $post_id; ?> ">
      <div  class="pro">
      <?php   if($fetch_posts['image1'] != ''){ ?>
            <img src="images/<?= $fetch_posts['image1']; ?>" alt=""> 
            <?php
                }?>
          <div class="icons">
            <span><?= $fetch_posts['titre']; ?></span>
            <h5><?= $fetch_posts['resume']; ?></h5>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <?php   if($fetch_posts['affiche_prix'] == '1'){ ?>
                <h4><?= $fetch_posts['prix']; ?> DT</h4>
                <?php
                }?>
          </div>
          <button type="button" class="btn">Voir plus</button>
      </div>
      </a>
      <?php
            }
            }else{
                echo '<p class="empty">no posts added yet!</p>';
            }
            ?>
  </div>

  
            <?php
            $select_posts = $conn->prepare("SELECT * FROM `".TABLE_PROJECT."` where position=? ORDER BY id DESC limit 1");
            $select_posts->execute(['4']);
            if($select_posts->rowCount() > 0){
                while($fetch_posts = $select_posts->fetch(PDO::FETCH_ASSOC)){
                $post_id = $fetch_posts['id'];
            ?>
  <div class="pro-container">
  <a href="Produit.php?id=<?= $post_id; ?> ">
      <div  class="pro">
      <?php   if($fetch_posts['image1'] != ''){ ?>
            <img src="images/<?= $fetch_posts['image1']; ?>" alt=""> 
            <?php
                }?>
          <div class="icons">
            <span><?= $fetch_posts['titre']; ?></span>
            <h5><?= $fetch_posts['resume']; ?></h5>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <?php   if($fetch_posts['affiche_prix'] == '1'){ ?>
                <h4><?= $fetch_posts['prix']; ?> DT</h4>
                <?php
                }?>
          </div>
          <button type="button" class="btn">Voir plus</button>
      </div>
      </a>
      <?php
            }
            }else{
                echo '<p class="empty">no posts added yet!</p>';
            }
            ?>
  </div>

  
            <?php
            $select_posts = $conn->prepare("SELECT * FROM `".TABLE_PROJECT."` where position=? ORDER BY id DESC limit 1");
            $select_posts->execute(['5']);
            if($select_posts->rowCount() > 0){
                while($fetch_posts = $select_posts->fetch(PDO::FETCH_ASSOC)){
                $post_id = $fetch_posts['id'];
            ?>
  <div class="pro-container">
  <a href="Produit.php?id=<?= $post_id; ?> ">
      <div  class="pro">
      <?php   if($fetch_posts['image1'] != ''){ ?>
            <img src="images/<?= $fetch_posts['image1']; ?>" alt=""> 
            <?php
                }?>
          <div class="icons">
            <span><?= $fetch_posts['titre']; ?></span>
            <h5><?= $fetch_posts['resume']; ?></h5>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <?php   if($fetch_posts['affiche_prix'] == '1'){ ?>
                <h4><?= $fetch_posts['prix']; ?> DT</h4>
                <?php
                }?>
          </div>
          <button type="button" class="btn">Voir plus</button>
      </div>
      </a>
      <?php
            }
            }else{
                echo '<p class="empty">no posts added yet!</p>';
            }
            ?>
  </div>

  
            <?php
            $select_posts = $conn->prepare("SELECT * FROM `".TABLE_PROJECT."` where position=? ORDER BY id DESC limit 1");
            $select_posts->execute(['6']);
            if($select_posts->rowCount() > 0){
                while($fetch_posts = $select_posts->fetch(PDO::FETCH_ASSOC)){
                $post_id = $fetch_posts['id'];
            ?>
  <div class="pro-container">
  <a href="Produit.php?id=<?= $post_id; ?> ">
      <div  class="pro">
      <?php   if($fetch_posts['image1'] != ''){ ?>
            <img src="images/<?= $fetch_posts['image1']; ?>" alt=""> 
            <?php
                }?>
          <div class="icons">
            <span><?= $fetch_posts['titre']; ?></span>
            <h5><?= $fetch_posts['resume']; ?></h5>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <?php   if($fetch_posts['affiche_prix'] == '1'){ ?>
                <h4><?= $fetch_posts['prix']; ?> DT</h4>
                <?php
                }?>
          </div>
          <button type="button" class="btn">Voir plus</button>
      </div>
      </a>
      <?php
            }
            }else{
                echo '<p class="empty">no posts added yet!</p>';
            }
            ?>
  </div>
</div>
</section>
<!-- project section ends -->

<!-- Map section starts -->
<section class="map">
<div class="my-padding">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d481.88264429736506!2d10.954815297703053!3d35.65958726424429!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1302166c8129b42b%3A0xac2c0765f7d780d!2sCaf%C3%A9%20El%20Qods!5e0!3m2!1sfr!2stn!4v1676223472380!5m2!1sfr!2stn" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<section>
<!-- Map section ends-->

<!-- Description section starts-->
<section class="Description">
<h1 class="heading"> <FontAwesomeIcon icon="fas fa-quote-left" color="#9fc5e8"/> Nos nouveaux articles <FontAwesomeIcon icon="fas fa-quote-right" color="#9fc5e8"/> </h1>
    <div class="image-card-container">
      
    <?php
            $select_posts = $conn->prepare("SELECT * FROM `".TABLE_POSTS."` where position=? ORDER BY id DESC limit 1");
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
            <h4 class="image-card-date"><?= $fetch_posts['date']; ?></h4>
            <h3 class="image-card-title"><?= $fetch_posts['title']; ?></h3>
            <p class="image-card-description"><?= $fetch_posts['resume']; ?></p>
          </div>
        </div>

        <?php
            }
            }else{
                echo '<p class="empty">no posts added yet!</p>';
            }
            ?>

        <?php
            $select_posts = $conn->prepare("SELECT * FROM `".TABLE_POSTS."` where position=? ORDER BY id DESC limit 1");
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
            <h4 class="image-card-date"><?= $fetch_posts['date']; ?></h4>
            <h3 class="image-card-title"><?= $fetch_posts['title']; ?></h3>
            <p class="image-card-description"><?= $fetch_posts['resume']; ?></p>
          </div>
        </div>

        <?php
            }
            }else{
                echo '<p class="empty">no posts added yet!</p>';
            }
            ?>

        <?php
            $select_posts = $conn->prepare("SELECT * FROM `".TABLE_POSTS."` where position=? ORDER BY id DESC limit 1");
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
            <h4 class="image-card-date"><?= $fetch_posts['date']; ?></h4>
            <h3 class="image-card-title"><?= $fetch_posts['title']; ?></h3>
            <p class="image-card-description"><?= $fetch_posts['resume']; ?></p>
          </div>
        </div>

        <?php
            }
            }else{
                echo '<p class="empty">no posts added yet!</p>';
            }
            ?>
    </div>
</section>
<!-- Description section ends-->

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- custom js file link  -->
<script src="main.js"></script>   

</body>
</html>