
<html>

<!-- header -->

<?php require 'require/pageHeadTemplate.php' ;  ?>

<body>

  <!-- Navigation -->

  <?php require 'require/navbar.php' ; ?>


<!-- Page Header -->
 <?php 

   $backgroundImage = '../public/img/admin.jpg'; 
   $headerTitle = 'valider vos commentaires'; 
   $headerSubtitle = 'Supprimer ou accepter les commentaires proposés'; 
   require 'require/pageheader.php'; 

  ?>

  <!-- Main Content -->
  <div class="container">

    <h1>Vos articles en attente de validation</h1>

    <?php

    // We fetch the comments needing validation
    	require '../view/frontend/require/displayCommentsToValidate.php'; 

    ?>
   
        <hr>

    <!-- Pager -->
    
    <?php require 'require/pager.php' ; ?>
        
  </div>

  <hr>

  <!-- Footer -->

    <?php require 'require/footer.php' ; ?>


  <!-- bootstrap footer -->
  
  <?php require 'require/boostrapFooter.php' ; ?>

</body>

</html>
