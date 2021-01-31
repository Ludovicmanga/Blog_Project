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
   $headerTitle = 'Créer un compte'; 
   $headerSubtitle = 'Créer un nouvel espace membre'; 
   require('include/pageheader.php'); 

  ?>
   

  <!-- Main Content -->
  
  <div class="container">

<!-- connexion form --> 


   <div class="registration_form_container">
      <h1 class="registration_form_title">Créer un compte</h1>
      <form class="registration_form" method="POST" action="index.php?action=register">
      <label>Votre mail</label> <input class="registration_form_input_mail" type="mail" placeholder="adresse mail *" name="mail">
      <span> <?= $user->getMailError();  ?></span>
      <br>
      <label>Confirmez votre mail</label> <input class="registration_form_input_mail_confirmation" type="mail" placeholder="Confirmer votre adresse mail *" name="confirmMail">
      <span> <?= $user->getConfirmMailError() ?></span>
      <br>
      <div class="registration_form_container_input_name">
        <label>Votre prénom</label> <input class="registration_form_input_name"type="text" placeholder="votre prénom *" name="name">
        <span> <?= $user->getNameError() ?></span>
        <br>
      </div>
      <div class="registration_form_container_input_lastname">
        <label>Votre nom</label> <input class="registration_form_input_lastname"type="text" placeholder="votre nom *" name="lastName">
        <span> <?= $user->getLastNameError() ?></span>
        <br>
      </div>
      <div class="registration_form_container_input_password">
        <label>Votre mot de passe</label> <input class="registration_form_input_password"type="password" placeholder="votre mot de passe *" name="password">
        <span> <?= $user->getPasswordError() ?></span>
        <br>
      </div>
      <div class="registration_form_container_input_password_confirmation">
        <label>Confirmez votre mot de passe</label> <input class="registration_form_input_password_confirmation"type="password" placeholder="Confirmer votre mot de passe *" name="confirmPassword">
        <span> <?= $user->getConfirmPasswordError() ?></span>
        <br>
      </div>

      <div class="container_registration_form_button">
        <button type="submit">Se connecter</button>
      </div>
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
