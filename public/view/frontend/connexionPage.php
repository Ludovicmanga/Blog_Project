<!DOCTYPE html>
<html lang="en">

<!-- header -->

<?php require("include/pageHeadTemplate.php") ?>

<body>

  <!-- Navigation -->

  <?php require("include/navbar.php") ?>


  <!-- Main Content -->
  
  <div class="container">

<!-- connexion form --> 

   <div class="connexion_form_container">
      <h1 class="connexion_form_title">Connexion</h1>
      <form class="connexion_form">
      <label>Mail</label> <input class="connexion_form_input_mail" type="mail"></input><br>
      <div class="connexion_form_container_input_password">
        <label>Mot de passe</label> <input class="connexion_form_input_password"type="password"></input><br>
      </div>
      <div class="container_connexion_form_button"><button type="submit">Se connecter</button>
      </form></div>
    </div>

    <!-- Pager -->
    
    <?php require("include/footer.php") ?>
        
    
  </div>

  <hr>

  <!-- Footer -->

    <?php require("include/footer.php") ?>

  <!-- bootstrap footer -->

  <?php require("include/boostrapFooter.php") ?>


</body>

</html>
