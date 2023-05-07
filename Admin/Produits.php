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

<!-- header section ends -->

<!-- Home-pic section starts -->

<section class="article">

    <?php
        $select_posts = $conn->prepare("SELECT * FROM `".TABLE_ARTICLE_ACCUEIL."`  ORDER BY id DESC limit 1");
        $select_posts->execute();
        if($select_posts->rowCount() > 0){
            while($fetch_posts = $select_posts->fetch(PDO::FETCH_ASSOC)){
                $post_id = $fetch_posts['id'];
        ?>
        <?php   if($fetch_posts['image'] != ''){ ?>
    <div class="head" style="background:url(images/<?= $fetch_posts['image']; ?>) no-repeat">
        <?php
        }?>
        <div class="content">
            <span> <?= $fetch_posts['titre']; ?></span>
        </div>
        <?php
        }
        }else{
            echo '<p class="empty">no posts added yet!</p>';
        }
        ?>           
    </div>

</section>

<!-- Home-pic section ends -->

<!-- produits section starts -->

<div class="home-project" id="home-project">
      <h1 class="heading"><i class="fas fa-quote-left"></i> Produits populaires <i class="fas fa-quote-right"></i> </h1>
      <h4 class="contenu">Nos produits saisonniers</h4>
      <?php
// Set the number of cards per page
$cards_per_page = 6;

// Get the current page number from the query string, or default to 1
$current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Calculate the starting row based on the current page number and cards per page
$start = ($current_page - 1) * $cards_per_page;

$select_posts = $conn->prepare("SELECT * FROM `".TABLE_PROJECT."` where status='1' ORDER BY id DESC LIMIT $start, $cards_per_page");
$select_posts->execute();

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
    </div>
    <?php
    }

    // Calculate the total number of pages
    $total_rows = $conn->query("SELECT COUNT(*) FROM `".TABLE_PROJECT."` where status='1'")->fetchColumn();
    $total_pages = ceil($total_rows / $cards_per_page);

    // Display the pagination links
    echo '<div class="pagination">';
    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $current_page) {

echo '<span class="current-page">' . $i . '</span>';
} else {
echo '<a href="?page=' . $i . '">' . $i . '</a>';
}
}
echo '</div>';

} else {
echo "No cards found";
}
?>


<!-- produits section ends -->



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