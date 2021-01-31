
<?php 

if(isset($_SESSION['userId'])){

  require('../view/frontend/admin.php'); 

} else {

  ?>

<!DOCTYPE html>
<html lang="en">

<!-- header -->

<?php require("include/pageHeadTemplate.php") ?>

<body>

  <!-- Navigation -->

  <?php require("include/navbar.php") ?>

  <!-- Page Header -->

  <?php 

   $backgroundImage = '../public/img/matrix.jpg'; 
   $headerTitle = 'Connexion'; 
   $headerSubtitle = 'Connectez-vous à votre compte'; 
   require('include/pageheader.php'); 

  ?>
   

  <!-- Main Content -->
  
  <div class="container">

<!-- connexion form --> 


  <div class="connexion_form_container">
      <h1 class="connexion_form_title">Se connecter</h1>
      <form class="connexion_form" method="POST" action="index.php?action=login">
      <label>Votre mail</label> <input class="registration_form_input_mail" type="mail" placeholder="adresse mail *" name="mail">
      <span> <?= $user->getMailError();  ?></span>
      <br>
      <label>Mot de passe</label> <input class="registration_form_input_mail" type="password" placeholder="mot de passe *" name="password">
      <span> <?= $user->getPasswordError() ?></span>
      <br>
      <div class="container_registration_form_button">
        <button type="submit">Se connecter</button>
      </div>
      <p>
        Vous n'avez pas encore de compte? <a href="index.php?action=register"> Créer un compte</a>
      </p>
      </form>
    </div>


    
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

