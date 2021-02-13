
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
    	require '../view/frontend/require/disaplayCommentsToValidate.php'; 
    ?>

    	<form action="index.php?action=commentsToValidate" method="POST">
    		<input type="hidden" name="commentId" value=" <?= $commentToValidate['commentId']; ?> ">
    		<button type="submit" name="validateComment">Valider le commentaire</button><br>
   			<button type="submit" name="denyComment">Refuser le commentaire</button><br><br>
    	</form>
   
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
