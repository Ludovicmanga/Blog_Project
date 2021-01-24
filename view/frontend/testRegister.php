  <?php 

 require('../model/User.php'); 
 require('../model/UserManager.php');


  if($_SERVER['REQUEST_METHOD'] == 'POST') {

      $user = new ProjetBlog\Model\User; 

      $_POST_CLEAN = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING); 


      $user->setMail(trim($_POST_CLEAN['mail'])); 
      $user->setPassword(trim($_POST_CLEAN['password'])); 
      echo $user->mail().'<br>'; 
      echo $user->password().'<br>'; 

  } else {

    ?>


     <div class="connexion_form_container">
      <h1 class="connexion_form_title">Connexion</h1>
      <form class="connexion_form" method="POST" action="index.php?action=testRegister">
      <label>Mail</label> <input class="connexion_form_input_mail" type="mail" placeholder="adresse mail *" name="mail">
      <br>
      <div class="connexion_form_container_input_password">
        <label>Mot de passe</label> <input class="connexion_form_input_password"type="password" placeholder="votre mot de passe *" name="password">
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


    <?php


  }


  ?>


 