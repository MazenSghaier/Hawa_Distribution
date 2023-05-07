<?php

include '../components/connect.php';
include '../components/constants.php';

session_start();

$admin_id = $_SESSION['admin_id'];
$link = "";
$link_status = "display: none;";
$current_dir = getcwd();

if(!isset($admin_id)){
   header('location:admin_login.php');
}

if(isset($_POST['publish'])){

   $description= $_POST['description'];
   $description = filter_var($description, FILTER_SANITIZE_STRING);
   $title = $_POST['title'];
   $title = filter_var($title, FILTER_SANITIZE_STRING);
   $prix = $_POST['prix'];
   $prix = filter_var($prix, FILTER_SANITIZE_STRING);
   $show = $_POST['show'];
   $show = filter_var($show, FILTER_SANITIZE_STRING);
   $rating = $_POST['rating'];
   $rating = filter_var($rating, FILTER_SANITIZE_STRING);
   $status = '1';
   $date=date('y-m-d');
   $position = $_POST['position'];
   $position = filter_var($position, FILTER_SANITIZE_STRING);
   
   $image1 = $_FILES['image1']['name'];
   $image1 = filter_var($image1, FILTER_SANITIZE_STRING);
   $image_size1 = $_FILES['image1']['size'];
   $image_tmp_name1 = $_FILES['image1']['tmp_name'];
   $image_folder1 = '../images/'.$image1;

   $image2 = $_FILES['image2']['name'];
   $image2 = filter_var($image2, FILTER_SANITIZE_STRING);
   $image_size2 = $_FILES['image2']['size'];
   $image_tmp_name2 = $_FILES['image2']['tmp_name'];
   $image_folder2 = '../images/'.$image2;

   $image3 = $_FILES['image3']['name'];
   $image3 = filter_var($image3, FILTER_SANITIZE_STRING);
   $image_size3 = $_FILES['image3']['size'];
   $image_tmp_name3 = $_FILES['image3']['tmp_name'];
   $image_folder3 = '../images/'.$image3;

   $image4 = $_FILES['image4']['name'];
   $image4 = filter_var($image4, FILTER_SANITIZE_STRING);
   $image_size4 = $_FILES['image4']['size'];
   $image_tmp_name4 = $_FILES['image4']['tmp_name'];
   $image_folder4 = '../images/'.$image4;

   $select_image = $conn->prepare("SELECT * FROM `" .TABLE_PROJECT. "` WHERE image1 = ?");
   $select_image->execute([$image1]);


   if(isset($image1)){
      if($select_image->rowCount() > 0 AND $image1 != ''){
         $message[] = 'image 1 name repeated!';
      }elseif($image_size1 > 2000000){
         $message[] = 'images 1 size is too large!';
      }elseif($image_size2 > 2000000){
         $message[] = 'images 2 size is too large!';
      }elseif($image_size3 > 2000000){
         $message[] = 'images 3 size is too large!';
      }elseif($image_size4 > 2000000){
         $message[] = 'images 4 size is too large!';
      }else{

         move_uploaded_file($image_tmp_name1, $image_folder1);
         move_uploaded_file($image_tmp_name2, $image_folder2);
         move_uploaded_file($image_tmp_name3, $image_folder3);
         move_uploaded_file($image_tmp_name4, $image_folder4);
      }
   }else{
      $image1 = '';
   }

   if($select_image->rowCount() > 0 AND $image1 != ''){
      $message[] = 'please rename your image!';
   }
   else{
		$insert_post = $conn->prepare("INSERT INTO `" .TABLE_PROJECT. "`(	titre,prix,affiche_prix,resume,position,rating,image1,image2,image3,image4,status,date) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
      $result=$insert_post->execute([ $title, $prix,$show,$description,$position, $rating, $image1, $image2, $image3,$image4, $status,$date]);
      $message[] = 'post published!';

      }
}
   

if(isset($_POST['draft'])){

   $description= $_POST['description'];
   $description = filter_var($description, FILTER_SANITIZE_STRING);
   $title = $_POST['title'];
   $title = filter_var($title, FILTER_SANITIZE_STRING);
   $prix = $_POST['prix'];
   $prix = filter_var($prix, FILTER_SANITIZE_STRING);
   $show = $_POST['show'];
   $show = filter_var($show, FILTER_SANITIZE_STRING);
   $rating = $_POST['rating'];
   $rating = filter_var($rating, FILTER_SANITIZE_STRING);
   $status = '0';
   $date=date('y-m-d');
   $position = $_POST['position'];
   $position = filter_var($position, FILTER_SANITIZE_STRING);
   
   $image1 = $_FILES['image1']['name'];
   $image1 = filter_var($image1, FILTER_SANITIZE_STRING);
   $image_size1 = $_FILES['image1']['size'];
   $image_tmp_name1 = $_FILES['image1']['tmp_name'];
   $image_folder1 = '../images/'.$image1;

   $image2 = $_FILES['image2']['name'];
   $image2 = filter_var($image2, FILTER_SANITIZE_STRING);
   $image_size2 = $_FILES['image2']['size'];
   $image_tmp_name2 = $_FILES['image2']['tmp_name'];
   $image_folder2 = '../images/'.$image2;

   $image3 = $_FILES['image3']['name'];
   $image3 = filter_var($image3, FILTER_SANITIZE_STRING);
   $image_size3 = $_FILES['image3']['size'];
   $image_tmp_name3 = $_FILES['image3']['tmp_name'];
   $image_folder3 = '../images/'.$image3;

   $image4 = $_FILES['image4']['name'];
   $image4 = filter_var($image4, FILTER_SANITIZE_STRING);
   $image_size4 = $_FILES['image4']['size'];
   $image_tmp_name4 = $_FILES['image4']['tmp_name'];
   $image_folder4 = '../images/'.$image4;

   $select_image = $conn->prepare("SELECT * FROM `project` WHERE image1 = ?");
   $select_image->execute([$image1]);


   if(isset($image1)){
      if($select_image->rowCount() > 0 AND $image1 != ''){
         $message[] = 'image 1 name repeated!';
      }elseif($image_size1 > 2000000){
         $message[] = 'images 1 size is too large!';
      }elseif($image_size2 > 2000000){
         $message[] = 'images 2 size is too large!';
      }elseif($image_size3 > 2000000){
         $message[] = 'images 3 size is too large!';
      }elseif($image_size4 > 2000000){
         $message[] = 'images 4 size is too large!';
      }else{

         move_uploaded_file($image_tmp_name1, $image_folder1);
         move_uploaded_file($image_tmp_name2, $image_folder2);
         move_uploaded_file($image_tmp_name3, $image_folder3);
         move_uploaded_file($image_tmp_name4, $image_folder4);
      }
   }else{
      $image1 = '';
   }

   if($select_image->rowCount() > 0 AND $image1 != ''){
      $message[] = 'please rename your image!';
   }
   else{
		$insert_post = $conn->prepare("INSERT INTO `project`(	titre,prix,affiche_prix,resume,position,rating,image1,image2,image3,image4,status,date) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
      $result=$insert_post->execute([ $title, $prix,$show,$description,$position, $rating, $image1, $image2, $image3,$image4, $status,$date]);
      $message[] = 'post published!';

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

   <h1 class="heading">ajouter un article</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="name" value="<?= $fetch_profile['name']; ?>">
      <p>Titre de produit<span>*</span></p>
      <input type="text" name="title" maxlength="100" required placeholder="ajouter titre" class="box">
      <p>Prix<span>*</span></p>
      <input type="number" name="prix" required placeholder="ajouter le prix" class="box">
      <p>Affiché prix<span>*</span></p>
      <select name="show" class="box" id="show">
         <option value="1">Affiché</option>
         <option value="0">caché</option>
      </select>
      <p>Description de produit<span>*</span></p>
      <textarea name="description" class="box" required maxlength="10000" placeholder="ajouter le description..." cols="30" rows="10"></textarea>
      <p>Position<span>*</span></p>
      <select name="position" class="number">
         <option value="1">1</option>
         <option value="2">2</option>
         <option value="3">3</option>
         <option value="4">4</option>
         <option value="5">5</option>
         <option value="6">6</option>
      </select>
      <p>Rating<span>*</span></p>
      <input type="number" name="rating" required placeholder="ajouter le rating" class="box">
      <p>Ajouter une image 1</p>
      <input type="file" name="image1" required  class="box" accept="image/jpg, image/jpeg, image/png, image/webp">
      <p>Ajouter une image 2</p>
      <input type="file" name="image2" class="box" accept="image/jpg, image/jpeg, image/png, image/webp">
      <p>Ajouter une image 3</p>
      <input type="file" name="image3" class="box" accept="image/jpg, image/jpeg, image/png, image/webp">
      <p>Ajouter une image 4</p>
      <input type="file" name="image4" class="box" accept="image/jpg, image/jpeg, image/png, image/webp">
      <div class="flex-btn">
         <input type="submit" value="publish post" name="publish" class="btn">
         <input type="submit" value="save draft" name="draft" class="option-btn">
      </div>
   </form>

</section>










<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>