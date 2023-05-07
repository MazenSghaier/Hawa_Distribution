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

   <div class="box-container">

      <div class="box">
         <div class="image">
                <img src="../images/home.png" alt="">
         </div>
         <a href="home_admin.php" class="btn">Page Accueille</a>
      </div>

      <div class="box">
         <div class="image">
                <img src="../images/produits_admin.png" alt="">
         </div>
         <a href="produits_admin.php" class="btn">Page Produits</a>
      </div>

      <div class="box">
         <div class="image">
                <img src="../images/about_admin.png" alt="">
         </div>
         <a href="about_admin.php" class="btn">Page A propos</a>
      </div>

      <div class="box">
         <div class="image">
                <img src="../images/contact_admin.png" alt="">
         </div>
         <a href="contact_admin.php" class="btn">Page Contact</a>
      </div>

   </div>

</section>
<!-- admin dashboard section ends -->










<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>