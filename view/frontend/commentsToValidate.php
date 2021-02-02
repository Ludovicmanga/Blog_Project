
<html>

<!-- header -->

<?php require("include/pageHeadTemplate.php") ?>

<body>

  <!-- Navigation -->

  <?php require("include/navbar.php") ?>


<!-- Page Header -->
 <?php 

   $backgroundImage = '../public/img/admin.jpg'; 
   $headerTitle = 'valider vos commentaires'; 
   $headerSubtitle = 'Supprimer ou accepter les commentaires proposés'; 
   require('include/pageheader.php'); 

  ?>

  <!-- Main Content -->
  <div class="container">

    <h1>Vos articles en attente de validation</h1>

    <?php 

    while($commentToValidate = $commentsToValidate->fetch()){

    	?>

    		<p>
	    		 <?= $commentToValidate['commentAuthor']; ?><br>
	    		 <?= $commentToValidate['creationDate']; ?><br>
	    		 <?= $commentToValidate['commentContent'] ; ?><br>
    		</p>

    	<form action="index.php?action=commentsToValidate" method="POST">
    		<input type="hidden" name="commentId" value=" <?= $commentToValidate['id'] ?> ">
    		<button type="submit" name="validateComment">Valider le commentaire</button><br>
   			<button type="submit" name="denyComment">Refuser le commentaire</button><br><br>
    	</form>


    <?php

    }


    ?>
    

        <hr>




    <!-- Pager -->
    
    <?php require("include/pager.php") ?>
        
  </div>

  <hr>

  <!-- Footer -->

    <?php require("include/footer.php") ?>


  <!-- bootstrap footer -->
  
  <?php require("include/boostrapFooter.php") ?>

</body>

</html>
