<?php

include 'components/connect.php';
include 'components/constants.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

$get_id = $_GET['id'];

$num=0;
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

    <!-- ajax file link  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>

    

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

<!-- Product section starts -->

<?php
$select_posts = $conn->prepare("SELECT * FROM `".TABLE_PROJECT."` WHERE id=? ");
$select_posts->execute([$get_id]);
if($select_posts->rowCount() > 0){
    while($fetch_posts = $select_posts->fetch(PDO::FETCH_ASSOC)){
        $post_id = $fetch_posts['id'];
?>
<div class="prodetails">
    <div class="single-pro-image">
        <?php if($fetch_posts['image1'] != ''){ ?>
        <img id="MainImg" class="main-img" src="images/<?= $fetch_posts['image1']; ?>" alt="">
        <?php }?>
        <div class="small-img-group">
            <div class="smal-img-col">
                <?php if($fetch_posts['image1'] != ''){ ?>
                <img class="small-img" src="images/<?= $fetch_posts['image1']; ?>" alt="" onclick="changeMainImg('<?= $fetch_posts['image1']; ?>')">
                <?php }?>
            </div>
            <div class="smal-img-col">
                <?php if($fetch_posts['image2'] != ''){ ?>
                <img class="small-img" src="images/<?= $fetch_posts['image2']; ?>" alt="" onclick="changeMainImg('<?= $fetch_posts['image2']; ?>')">
                <?php }?>
            </div>
            <div class="smal-img-col">
                <?php if($fetch_posts['image3'] != ''){ ?>
                <img class="small-img" src="images/<?= $fetch_posts['image3']; ?>" alt="" onclick="changeMainImg('<?= $fetch_posts['image3']; ?>')">
                <?php }?>
            </div>
            <div class="smal-img-col">
                <?php if($fetch_posts['image4'] != ''){ ?>
                <img class="small-img" src="images/<?= $fetch_posts['image4']; ?>" alt="" onclick="changeMainImg('<?= $fetch_posts['image4']; ?>')">
                <?php }?>
            </div>
        </div>
    </div>
    <div class="single-pro-details">
        <h6>Accueil / Produits / <?= $fetch_posts['titre']; ?></h6>
        <h4><?= $fetch_posts['titre']; ?></h4>
        <?php if($fetch_posts['affiche_prix'] == '1'){ ?>
        <h4><?= $fetch_posts['prix']; ?> DT</h4>
        <?php }?>
        <div class="stars">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h4 class="price">Détails du Produit :</h4>
        <span class="resume" ><?= $fetch_posts['resume']; ?></span>
    </div>
</div>
<?php
   }
}else{
    echo '<p class="empty">no posts added yet!</p>';
}
?>

<script>
    function changeMainImg(imgSrc){
        document.getElementById("MainImg").src = "images/" + imgSrc;
    }
</script>


<!-- Product section ends -->


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