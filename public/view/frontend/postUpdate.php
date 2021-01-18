<html lang="en">

<!-- header -->

<?php require("include/pageHeadTemplate.php") ?>

<body>

  <!-- Navigation -->

  <?php require("include/navbar.php") ?>


  <!-- Main Content -->

  <div class="container">

      
      <!-- Contact form --> 

   
      

    <p> Votre article a bien été modifié!<br><a href="index.php?action=post&id= <?= $_GET['id']; ?>">Voir l'article</a></p>
    
        
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
