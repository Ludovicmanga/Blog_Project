<!DOCTYPE html>
<html lang="en">

<!-- header -->

<?php require("require/pageHeadTemplate.php") ?>

<body>

  <!-- Navigation -->

  <?php require("require/navbar.php") ?>

  

  <!-- Main Content -->
  
  <div class="container">


  <!-- Main Content -->
  <div class="container">

      
      <!-- Contact form -->

       <?php

            $post->setTitle($_POST['title']); 
            $post->setTopic($_POST['topic']); 
            $post->setSubtitle($_POST['subtitle']); 
            $post->setContent($_POST['content']); 
            $postManager->addPost($post);  
      ?>

    <p>Votre article a bien été publié! </p><b><a href="">Voir mon post</a></b>
    
        
        <!-- Pager -->
    
    <?php require("require/footer.php") ?>

  </div>

  <hr>

  <!-- Footer -->

    <?php require("require/footer.php") ?>
 

   <!-- bootstrap footer -->
   
   <?php require("require/boostrapFooter.php") ?>

</body>

</html>
