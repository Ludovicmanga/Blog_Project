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

      
    </div>
  </article>

  <hr>

    <!-- Footer -->

    <?php require("include/footer.php") ?>
 
    <!-- bootstrap footer -->

   <?php require("include/boostrapFooter.php") ?>

</body>

</html>
