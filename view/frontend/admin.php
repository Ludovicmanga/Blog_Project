<?php 

// if no session, we display the login form

if(!isset($_SESSION['userId'])){

  require 'view/frontend/login.php'; 

} else {

  ?>

<html>

<!-- header -->

<?php require 'require/pageHeadTemplate.php' ; ?>

<body>

  <!-- Navigation -->

  <?php require 'require/navbar.php' ?>


<!-- Page Header -->

 <?php 

   $backgroundImage = '../public/img/admin.jpg'; 
   $headerTitle = 'Espace admin'; 
   $headerSubtitle = 'Gérez votre compte'; 
   require 'require/pageheader.php'; 

  ?>

  <!-- Main Content -->
  <div class="container">

    <h1>Articles</h1>
    <ul>
      <li><a href="index.php?action=postCreation">Créer un article</a></li>
      <li><a href="index.php?action=listUserPosts">Modifier ou supprimer un article</a></li>
    </ul>

    <h1>Commentaires</h1>
    <ul>
      <li><a href="index.php?action=commentsToValidate">Commentaires à valider</a></li>
    </ul>

        <hr>


      <!-- Contact form -->



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


  <?php
}

?>

