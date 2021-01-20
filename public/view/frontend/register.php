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

   <div class="connexion_form_container">
      <h1 class="connexion_form_title">Créer un compte</h1>
      <form class="connexion_form">
      <label>Votre mail</label> <input class="connexion_form_input_mail" type="mail" placeholder="adresse mail *" name="mail">
      <span> <?php $data['mailError'] ?></span>
      <br>
      <label>Confirmer votre mail</label> <input class="connexion_form_input_mail" type="mail" placeholder="adresse mail *" name="confirmMail">
      <span> <?php $data['confirmMailError'] ?></span>
      <br>
      <div class="connexion_form_container_input_password">
        <label>Votre prénom</label> <input class="connexion_form_input_password"type="text" placeholder="votre prénom *" name="name">
        <span> <?php $data['nameError'] ?></span>
        <br>
      </div>
      <div class="connexion_form_container_input_password">
        <label>Votre nom</label> <input class="connexion_form_input_password"type="text" placeholder="votre nom *" name="lastName">
        <span> <?php $data['lastNameError'] ?></span>
        <br>
      </div>
      <div class="connexion_form_container_input_password">
        <label>Votre mot de passe</label> <input class="connexion_form_input_password"type="password" placeholder="votre mot de passe *" name="password">
        <span> <?php $data['passwordError'] ?></span>
        <br>
      </div>
      <div class="connexion_form_container_input_password">
        <label>Confirmer votre mot de passe</label> <input class="connexion_form_input_password"type="password" placeholder="votre mot de passe *" name="confirmPassword">
        <span> <?php $data['confirmPasswordError'] ?></span>
        <br>
      </div>

      <div class="container_connexion_form_button">
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
