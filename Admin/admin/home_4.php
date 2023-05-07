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
   $position = $_POST['position'];
   $position = filter_var($position, FILTER_SANITIZE_STRING);
 
   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = '../images/'.$image;

   $select_image = $conn->prepare("SELECT * FROM `project` WHERE image = ? ");
   $select_image->execute([$image]);

   if(isset($image)){
      if($select_image->rowCount() > 0 AND $image != ''){
         $message[] = 'image name repeated!';
      }elseif($image_size > 2000000){
         $message[] = 'images size is too large!';
      }else{
         move_uploaded_file($image_tmp_name, $image_folder);
      }
   }else{
      $image = '';
   }

   if($select_image->rowCount() > 0 AND $image != ''){
      $message[] = 'please rename your image!';
   }else{
      $insert_post = $conn->prepare("INSERT INTO `project`(titre,resume,position,image) VALUES(?,?,?,?)");
      $insert_post->execute([ $titre,$content,$position,$image]);
      $message[] = 'it is published!';
   }
   
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
      <p>position<span>*</span></p>
      <select name="position" class="number">
         <option value="1">1</option>
         <option value="2">2</option>
         <option value="3">3</option>
         <option value="4">4</option>
         <option value="5">5</option>
         <option value="6">6</option>
      </select>
      <p>ajouter image</p>
      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png, image/webp">
      <div class="flex-btn">
         <input type="submit" value="publier" name="publish" class="btn">
      </div>
   </form>

</section>










<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>