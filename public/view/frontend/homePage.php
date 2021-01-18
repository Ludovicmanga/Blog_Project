<!DOCTYPE html>
<html lang="en">

<!-- header -->

<?php require("include/pageHeadTemplate.php") ?>

<body>

  <!-- Navigation -->

  <?php require("include/navbar.php") ?>

  <!-- Page Header -->
  <?php 

   $backgroundImage = '../public/img/ludovic-carre.png'; 
   $headerTitle = 'Le blog de Ludovic'; 
   $headerSubtitle = 'Suivez-moi au quotidien'; 
   require('include/pageheader.php'); 

  ?>


  <!-- Main Content -->
  <div class="container">

      <div class="post-preview">
          <a href="index.php?action=listPosts">
            <h2 class="post-title">
              Mon actualité
            </h2>
            <h3 class="post-subtitle">
              Voir mes articles
            </h3>
          </a>
          <p class="post-meta">Articles à la une
            </p>
        </div>
        <hr>

        <div class="post-preview">
          <a href="https://www.linkedin.com/in/ludovic-manga-jocky/">
            <h2 class="post-title">
              Mes références
            </h2>
            <h3 class="post-subtitle">
              Voir mes références
            </h3>
          </a>
          <p class="post-meta">Des références sérieuses
            </p>
        </div>
        <hr>

        <div class="post-preview">
          <a href="https://www.linkedin.com/in/ludovic-manga-jocky/">
            <h2 class="post-title">
              Mon CV
            </h2>
            <h3 class="post-subtitle">
              Voir mes expériences
            </h3>
          </a>
          <p class="post-meta">Un parcours cohérent
            </p>
        </div>
        <hr>


      <!-- Contact form -->

    <div class="form_container">
      <h1 class="form_title">Me contacter</h1>
      <form action="index.php?action=messagesent" method = "POST" class="contact_form">
      <label>Nom</label> <input class="input_lastname" name="lastname" type="text"></input><br>
      <label>Prenom</label> <input class="input_name" name="name"type="text"></input><br>
      <label>Mail</label> <input class="input_mail" name="mail" type="mail"></input><br>
      <div class="contact_form_container_textarea">
        <div>
          <label>Message</label>
        </div>
        <div>
            <textarea class="textarea_message" name="content"></textarea><br>
        </div>
      </div>
      <div class="container_form_button"><button type="submit">Envoyer</button>
      </form></div>
    </div>

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
