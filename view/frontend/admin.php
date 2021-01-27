<?php 

if(!isset($_SESSION['userId'])){

  require('view/frontend/login.php'); 

} else {

  ?>

<html>

<!-- header -->

<?php require("include/pageHeadTemplate.php") ?>

<body>

  <!-- Navigation -->

  <?php require("include/navbar.php") ?>


<!-- Page Header -->
 <?php 

   $backgroundImage = '../public/img/admin.jpg'; 
   $headerTitle = 'Espace admin'; 
   $headerSubtitle = 'Gérez votre compte'; 
   require('include/pageheader.php'); 

  ?>

  <!-- Main Content -->
  <div class="container">

    <h1>Articles</h1>
    <ul>
      <li><a href="index.php?action=postCreation&id= <?= $_SESSION['userId'] ?> ">Créer un article</a></li>
      <li><a href="">Modifier ou supprimer un article</a></li>
    </ul>

    <h1>Utilisateurs</h1>
    <ul>
      <li><a href="">Créer un utilisateur</a></li>
      <li><a href="">Modifier ou supprimer un utilisateur</a></li>
    </ul>

        <hr>


      <!-- Contact form -->



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


  <?php
}

?>

