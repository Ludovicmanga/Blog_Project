<!DOCTYPE html>
<html lang="en">

<!-- header -->

<?php require("include/pageHeadTemplate.php") ?>

<body>

  <!-- Navigation -->

  <?php require("include/navbar.php") ?>

  <!-- Page Header -->
  
  <?php require("include/postHeader.php") ?>

  <!-- Post Content -->
  <article>
    <div class="container">

      <?= 

        '<br>nombre de vues</> : '; 
        echo $postToIncrementViews->getViews(); 
        echo '<br><br>';  
      ?>

      <?= $post['content']; ?>

         <?php 

      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        echo '<br><p><b>Votre commentaire a bien été soumis. Il sera soumis à validation par l\'auteur de l\'article</b></p><br>'; 

      }

      ?> 


      <form action="index.php?action=post&id= <?= $_GET['id'] ?>" method="POST">
        <input type="hidden" name="postId" value=" <?= $_GET['id'] ?> ">
        <label>Votre nom</label> <br> <input type="text" name="commentAuthor"><br>
        <label>Votre commentaire</label> <br> <textarea name="commentContent"></textarea><br>
        <button type="submit" name="submit">Envoyer</button>
      </form>
      <br>

      <?php

      while($postComment = $postComments->fetch()){

        ?>

        <div>

          <?= $postComment['commentAuthor'] ?><br>
          <?= $postComment['creationDate'] ?><br>
          <?= $postComment['commentContent'] ?><br>
          <br>

        </div>

        <?php

      }

       ?>

    </div>
  </article>

  <hr>

    <!-- Footer -->

    <?php require("include/footer.php") ?>
 
    <!-- bootstrap footer -->

   <?php require("include/boostrapFooter.php") ?>

</body>

</html>
