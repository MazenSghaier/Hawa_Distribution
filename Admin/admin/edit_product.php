<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

$current_dir = getcwd();
$target_dir = $current_dir."/../../port/src/Images/";

if(isset($_POST['save'])){

   $post_id = $_GET['id'];
   $title = $_POST['title'];
   $title = filter_var($title, FILTER_SANITIZE_STRING);
   $content = $_POST['content'];
   $content = filter_var($content, FILTER_SANITIZE_STRING);
   $category = $_POST['prix'];
   $category = filter_var($category, FILTER_SANITIZE_STRING);
   $show = $_POST['show'];
   $show = filter_var($show, FILTER_SANITIZE_STRING);
   $status = $_POST['status'];
   $status = filter_var($status, FILTER_SANITIZE_STRING);
   $position = $_POST['position'];
   $position = filter_var($position, FILTER_SANITIZE_STRING);

   $update_post = $conn->prepare("UPDATE `project` SET titre = ?, resume = ?, position = ? , prix = ?, affiche_prix = ? ,status = ? WHERE id = ?");
   $update_post->execute([$title, $content,$position, $category , $show , $status, $post_id]);

   $message[] = 'post updated!';
   
   $old_image = $_POST['old_image'];
   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = '../images/'.$image;

   $select_image = $conn->prepare("SELECT * FROM `project` WHERE image1 = ? ");
   $select_image->execute([$image]);

   if(!empty($image)){
      if($image_size > 2000000){
         $message[] = 'images size is too large!';
      }elseif($select_image->rowCount() > 0 AND $image != ''){
         $message[] = 'please rename your image!';
      }else{
         $update_image = $conn->prepare("UPDATE `project` SET image1 = ? WHERE id = ?");
         move_uploaded_file($image_tmp_name, $image_folder);
         $update_image->execute([$image, $post_id]);
         if($old_image != $image AND $old_image != ''){
            unlink('../images/'.$old_image);
         } 
         $message[] = 'image updated!';
      }
   }

   
}

if(isset($_POST['delete_post'])){

   $post_id = $_POST['post_id'];
   $post_id = filter_var($post_id, FILTER_SANITIZE_STRING);
   $delete_image = $conn->prepare("SELECT * FROM `project` WHERE id = ?");
   $delete_image->execute([$post_id]);
   $fetch_delete_image = $delete_image->fetch(PDO::FETCH_ASSOC);
   if($fetch_delete_image['image1'] != ''){
      unlink('../images/'.$fetch_delete_image['image1']);
   }
   $delete_post = $conn->prepare("DELETE FROM `project` WHERE id = ?");
   $delete_post->execute([$post_id]);
  
   $message[] = 'post deleted successfully!';

}

if(isset($_POST['delete_image'])){

   $empty_image = '';
   $post_id = $_POST['post_id'];
   $post_id = filter_var($post_id, FILTER_SANITIZE_STRING);
   $delete_image = $conn->prepare("SELECT * FROM `project` WHERE id = ?");
   $delete_image->execute([$post_id]);
   $fetch_delete_image = $delete_image->fetch(PDO::FETCH_ASSOC);
   if($fetch_delete_image['image1'] != ''){
      unlink('../images/'.$fetch_delete_image['image1']);
   }
   $unset_image = $conn->prepare("UPDATE `project` SET image = ? WHERE id = ?");
   $unset_image->execute([$empty_image, $post_id]);
   $message[] = 'image deleted successfully!';

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>articles</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php' ?>

<section class="post-editor">

   <h1 class="heading">modifier article</h1>

   <?php
      $post_id = $_GET['id'];
      $select_posts = $conn->prepare("SELECT * FROM `project` WHERE id = ?");
      $select_posts->execute([$post_id]);
      if($select_posts->rowCount() > 0){
         while($fetch_posts = $select_posts->fetch(PDO::FETCH_ASSOC)){
   ?>
   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="old_image" value="<?= $fetch_posts['image1']; ?>">
      <input type="hidden" name="post_id" value="<?= $fetch_posts['id']; ?>">
      <p>produits status <span>*</span></p>
      <select name="status" class="box" required>
         <option value="<?= $fetch_posts['status']; ?>" selected><?php if($fetch_posts['status'] == '1'){echo 'active';} else{echo 'non-active'; } ?></option>
         <option value="1">active</option>
         <option value="0">desactive</option>
      </select>
      <p>titre de produit<span>*</span></p>
      <input type="text" name="title" maxlength="100" required placeholder="add product title" class="box" value="<?= $fetch_posts['titre']; ?>">
      <p>prix<span>*</span></p>
      <input type="number" name="prix" required placeholder="ajouter le prix" class="box " value="<?= $fetch_posts['prix']; ?>">
      <p>Affiché prix<span>*</span></p>
      <select name="show" class="box" id="show">
      <option value="<?= $fetch_posts['affiche_prix']; ?>" selected><?php if($fetch_posts['affiche_prix'] == '1'){echo 'Affiché';} else{echo 'Caché'; } ?></option>
         <option value="1">Affiché</option>
         <option value="0">caché</option>
      </select>
      <p>contenu produit<span>*</span></p>
      <textarea name="content" class="box" required maxlength="10000" placeholder="write your content..." cols="30" rows="10"><?= $fetch_posts['resume']; ?></textarea>
      <p>position<span>*</span></p>
      <select name="position" class="number">
         <option value="<?= $fetch_posts['position']; ?>" selected><?= $fetch_posts['position']; ?></option>
         <option value="1">1</option>
         <option value="2">2</option>
         <option value="3">3</option>
         <option value="4">4</option>
         <option value="5">5</option>
         <option value="6">6</option>
      </select>
      <p>publier image</p>
      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png, image/webp">
      <?php if($fetch_posts['image1'] != ''){ ?>
         <img src="../images/<?= $fetch_posts['image1']; ?>" class="image" alt="">
         <input type="submit" value="delete image" class="inline-delete-btn" name="delete_image">
      <?php } ?>
      <div class="flex-btn">
         <input type="submit" value="save post" name="save" class="btn">
         <a href="view_product.php" class="option-btn">retourner</a>
         <input type="submit" value="delete post" class="delete-btn" name="delete_post">
      </div>
   </form>

   <?php
         }
      }else{
         echo '<p class="empty">no posts found!</p>';
   ?>
   <div class="flex-btn">
      <a href="view_product.php" class="option-btn">voir produits</a>
      <a href="add_product.php" class="option-btn">ajouter produits</a>
   </div>
   <?php
      }
   ?>

</section>










<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>