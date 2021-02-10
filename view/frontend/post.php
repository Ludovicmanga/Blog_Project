<!DOCTYPE html>
<html lang="en">

<!-- header -->
<?php require("../view/frontend/require/pageHeadTemplate.php") ?>

<body>

  <!-- Navigation -->
  <?php require("../view/frontend/require/navbar.php") ?>

  <!-- Page Head -->
  <?php require("../view/frontend/require/pageHeadTemplate.php"); ?>

  <!-- Page Header -->
  <?php require("../view/frontend/require/postHeader.php") ?>

  <!-- Post Content -->
  <article>
    <div class="container">
      <?= 

      // We display the number of views of the post
        '<br>nombre de vues</> : '; 
        echo $postToIncrementViews->getViews(); 
        echo '<br><br>';  

      // We display the post content from the DB 
      echo $post['content']; 
      
      // We check whether the commentary form was filled 
      if($_SERVER['REQUEST_METHOD'] == 'POST'){ 
        echo '<br><p id="commentarySpace"><b>Votre commentaire a bien été soumis. Il sera soumis à validation par l\'auteur de l\'article</b></p><br>'; 
      }
      ?> 
      <br>

      <!-- We display the form allowing to post comments-->
      <h1 >Espace commentaires</h1>
      <form action="index.php?action=post&id= <?= $_GET['id'] ?>#commentarySpace" method="POST">
        <input type="hidden" name="postId" value=" <?= $_GET['id'] ?> ">
        <label>Votre nom</label> <br> <input type="text" name="commentAuthor"><br>
        <label>Votre commentaire</label> <br> <textarea name="commentContent"></textarea><br>
        <button type="submit" name="submit">Envoyer</button>
      </form>
      <br>
      <?php

      	//We get the comments of a post
      	require('../view/frontend/require/getPostComments.php'); 
       ?>
    </div>
  </article>

  <hr>

    <!-- Footer -->
    <?php require("../view/frontend/require/footer.php") ?>
 
    <!-- bootstrap footer -->
   <?php require("../view/frontend/require/boostrapFooter.php") ?>

</body>
</html>
