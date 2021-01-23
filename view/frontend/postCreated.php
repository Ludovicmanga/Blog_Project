<!DOCTYPE html>
<html lang="en">

<!-- header -->

<?php require("include/pageHeadTemplate.php") ?>

<body>

  <!-- Navigation -->

  <?php require("include/navbar.php") ?>

  

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
    
    <?php require("include/footer.php") ?>

  </div>

  <hr>

  <!-- Footer -->

    <?php require("include/footer.php") ?>
 

   <!-- bootstrap footer -->
   
   <?php require("include/boostrapFooter.php") ?>

</body>

</html>
