<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

if(isset($_POST['publish'])){

   $titre = $_POST['titre'];
   $titre = filter_var($titre, FILTER_SANITIZE_STRING);
   $content = $_POST['content'];
   $content = filter_var($content, FILTER_SANITIZE_STRING);

   $insert_post = $conn->prepare("INSERT INTO `ref_des`( titre, contenu) VALUES(?,?)");
   $insert_post->execute([ $titre, $content]);
   $message[] = 'it is published!';
 
   
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>posts</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>


<?php include '../components/admin_header.php' ?>

<section class="post-editor">

   <h1 class="heading">modifier</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <p>titre<span>*</span></p>
      <input type="text" name="titre" maxlength="100" required placeholder="ajouter le titre" class="box">
      <p>description<span>*</span></p>
      <input name="content" class="box" required maxlength="100" required placeholder="ajouter le resumé..." class="box">
      <div class="flex-btn">
         <input type="submit" value="publier" name="publish" class="btn">
         
      </div>
   </form>

</section>










<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>