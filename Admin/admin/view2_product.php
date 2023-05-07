<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

if(isset($_POST['delete'])){
   $status="non-active";
   $p_id = $_POST['id'];
   $p_id = filter_var($p_id, FILTER_SANITIZE_STRING);
   $delete_image = $conn->prepare("SELECT * FROM `project` WHERE id = ?");
   $delete_image->execute([$p_id]);
   $fetch_delete_image = $delete_image->fetch(PDO::FETCH_ASSOC);
   if($fetch_delete_image['image1'] != ''){
      unlink('../images/'.$fetch_delete_image['image1']);
   }
   $delete_post = $conn->prepare("DELETE FROM `project` WHERE id = ?");
   $delete_post->execute([$p_id]);
   $message[] = 'product deleted successfully!';

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

<section class="show-posts">

   <h1 class="heading">vos produits</h1>

   <div class="box-container">

      <?php
         $select_posts = $conn->prepare("SELECT * FROM `project` where status='0'");
         $select_posts->execute();
         if($select_posts->rowCount() > 0){
            while($fetch_posts = $select_posts->fetch(PDO::FETCH_ASSOC)){
               $post_id = $fetch_posts['id'];

               $count_post_comments = $conn->prepare("SELECT * FROM `comments` WHERE post_id = ?");
               $count_post_comments->execute([$post_id]);
               $total_post_comments = $count_post_comments->rowCount();

               $count_post_likes = $conn->prepare("SELECT * FROM `likes` WHERE post_id = ?");
               $count_post_likes->execute([$post_id]);
               $total_post_likes = $count_post_likes->rowCount();

      ?>
      <form method="post" class="box">
         <input type="hidden" name="post_id" value="<?= $post_id; ?>">
         <?php if($fetch_posts['image1'] != ''){ ?>
            <img src="../images/<?= $fetch_posts['image1']; ?>" class="image" alt="">
         <?php } ?>
         <div class="status" style="background-color:<?php if($fetch_posts['status'] == '1'){echo 'limegreen';} else{echo 'coral'; } ?>;"><?php if($fetch_posts['status'] == '1'){echo 'active';} else{echo 'non-active'; } ?></div>
         <div class="status" style="background-color:<?php if($fetch_posts['affiche_prix'] == '1'){echo 'limegreen';} else{echo 'coral'; } ?>;"><?php if($fetch_posts['affiche_prix'] == '1'){echo 'Affiché';} else{echo 'Caché'; } ?></div>
            <div class="title"><?= $fetch_posts['titre']; ?></div>
         <div class="posts-content"><?= $fetch_posts['resume']; ?></div>
         <div class="icons">
            <div class="likes"><i class="fas fa-heart"></i><span><?= $total_post_likes; ?></span></div>
            <div class="comments"><i class="fas fa-comment"></i><span><?= $total_post_comments; ?></span></div>
         </div>
         <div class="flex-btn">
            <a href="edit_product.php?id=<?= $post_id; ?>" class="option-btn">modifier</a>
            <button type="submit" name="delete" class="delete-btn" onclick="return confirm('delete this post?');">supprimer</button>
         </div>
         <a href="read_product.php?post_id=<?= $post_id; ?>" class="btn">voir produits</a>
      </form>
      <?php
            }
         }else{
            echo '<p class="empty">no posts added yet! <a href="add_product.php" class="btn" style="margin-top:1.5rem;">add post</a></p>';
         }
      ?>

   </div>


</section>









<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>