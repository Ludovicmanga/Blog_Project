
<?php 

if(isset($_SESSION['userId'])){

  require('../view/frontend/admin.php'); 

} else {

  ?>

<!DOCTYPE html>
<html lang="en">

<!-- header -->
<?php require("require/pageHeadTemplate.php") ?>

<body>

  <!-- Navigation -->
  <?php require("require/navbar.php") ?>

  <!-- Page Header -->
  <?php 

   // styling of the header, thanks to require/pageheader
   $backgroundImage = '../public/img/matrix.jpg'; 
   $headerTitle = 'Connexion'; 
   $headerSubtitle = 'Connectez-vous à votre compte'; 
   require('require/pageheader.php'); 
  ?>

  <!-- Main Content -->
  <div class="container">

<!-- login form --> 
  	<div class="login_form_container">
	  <h1 class="login_form_title">Se connecter</h1>
	  <form class="login_form" method="POST" action="index.php?action=login">
	  <label>Votre mail</label> <input class="login_form_input_mail" type="mail" placeholder="adresse mail *" name="mail">
	  <span> <?= $user->getMailError();  ?></span>
	  <br>
	  <label>Mot de passe</label> <input class="login_form_input_password" type="password" placeholder="mot de passe *" name="password">
	  <span> <?= $user->getPasswordError() ?></span>
	  <br>
	  <div class="container_login_form_button">
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
  	<?php require("require/footer.php") ?>

  <!-- bootstrap footer -->
  	<?php require("require/boostrapFooter.php") ?>


</body>

</html>





  <?php


}

?>

