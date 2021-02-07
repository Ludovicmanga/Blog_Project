<html lang="en">

<!-- header -->

<?php require("require/pageHeadTemplate.php") ?>

<body>

  <!-- Navigation -->

  <?php require("require/navbar.php") ?>


  <!-- Main Content -->

  <div class="container">

      
      <!-- Contact form --> 

   
      

    <p> Votre article a bien été modifié!<br><a href="index.php?action=post&id= <?= $_GET['id']; ?>">Voir l'article</a></p>
    
        
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
