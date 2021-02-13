<!DOCTYPE html>
<html lang="en">

<!-- header -->

<?php require 'require/pageHeadTemplate.php' ; ?>

<body>

  <!-- Navigation -->

  <?php require 'require/navbar.php' ; ?>

  <!-- Page Header -->
  
  <?php 

  // styling of the header, thanks to require/pageheader
   $backgroundImage = '../public/img/ludovic-carre.png'; 
   $headerTitle = 'Le blog de Ludovic'; 
   $headerSubtitle = 'Suivez-moi au quotidien'; 
   require 'require/pageheader.php'; 

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

   <?php 

   // we check whether a message was sent in the contact form
   if($_SERVER['REQUEST_METHOD'] == 'POST') {

   	echo '<b>Votre message a bien été envoyé!</b><br>'; 

  } else {

  	?> 


  	<div class="form_container">
      <h1 class="form_title">Me contacter</h1>
      <form action="index.php?action=home" method = "POST" class="contact_form">
      <label>Nom</label> <input class="input_lastname" name="lastName" type="text"></input><br>
      <label>Prenom</label> <input class="input_name" name="name"type="text"></input><br>
      <label>Mail</label> <input class="input_mail" name="mail" type="mail"></input><br>
      <div class="contact_form_container_textarea">
        <div>
          <label>Message</label>
        </div>
        <div>
            <textarea class="textarea_message" name="messageContent"></textarea><br>
        </div>
      </div>
      <div class="container_form_button"><button type="submit">Envoyer</button>
      </form></div>
    </div>

  	<?php
  }

   ?>   

    <!-- Pager -->
    
    <?php require 'require/pager.php' ; ?>
        
  </div>

  <hr>

  <!-- Footer -->

    <?php require 'require/footer.php' ; ?>


  <!-- bootstrap footer -->
  
  <?php require 'require/boostrapFooter.php' ;  ?>

</body>

</html>
