<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>dashboard</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php' ?>

<!-- admin dashboard section starts  -->

<section class="dashboard">

   <h1 class="heading">dashboard</h1>

   <div class="box-container">

   <div class="box">
      <?php
         $select_posts = $conn->prepare("SELECT * FROM `project`");
         $select_posts->execute();
         $numbers_of_posts = $select_posts->rowCount();
      ?>
      <h3><?= $numbers_of_posts; ?></h3>
      <p>produits ajoutés</p>
      <a href="add_product.php" class="btn">ajouter un nouveau produit</a>
   </div>

   <div class="box">
      <?php
         $select_active_posts = $conn->prepare("SELECT * FROM `project` WHERE status = ?");
         $select_active_posts->execute(['1']);
         $numbers_of_active_posts = $select_active_posts->rowCount();
      ?>
      <h3><?= $numbers_of_active_posts; ?></h3>
      <p>produits activés</p>
      <a href="view_product.php" class="btn">voir produits</a>
   </div>

   <div class="box">
      <?php
         $select_deactive_posts = $conn->prepare("SELECT * FROM `project` WHERE status = ?");
         $select_deactive_posts->execute(['0']);
         $numbers_of_deactive_posts = $select_deactive_posts->rowCount();
      ?>
      <h3><?= $numbers_of_deactive_posts; ?></h3>
      <p>produits desactivés</p>
      <a href="view2_product.php" class="btn">voir produits</a>
   </div>

   </div>

</section>

<!-- admin dashboard section ends -->










<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>