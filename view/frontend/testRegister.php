  <div class="connexion_form_container">
      <h1 class="connexion_form_title">Connexion</h1>
      <form class="connexion_form">
      <label>Mail</label> <input class="connexion_form_input_mail" type="mail" placeholder="adresse mail *">
      <span> <?= $user->mailError() ?></span>
      <br>
      <div class="connexion_form_container_input_password">
        <label>Mot de passe</label> <input class="connexion_form_input_password"type="password" placeholder="votre mot de passe *">
        <span> <?= $user->passwordError() ?></span>
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