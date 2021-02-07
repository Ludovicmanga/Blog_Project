<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<!-- header -->
<?php require('../view/frontend/require/postCreationHeader.php') ?>

<body>

  <!-- Navigation -->
  <?php require("require/navbar.php") ?>

  <!-- Page Header -->
  <?php 

   $backgroundImage = '../public/img/post_writing.jpg'; 
   $headerTitle = 'Ecrire un article'; 
   $headerSubtitle = 'Postez votre plus belle création'; 
   require('require/pageheader.php'); 
  
  ?>

  <!-- Main Content -->
  <div class="container">

      <!-- Contact form -->
      <?php 
         if(isset($_POST['title'])){
          echo '
          <b>Votre article a bien été créé !</b><br><br>

          <a href="index.php">Retourner à l\'accueil</a><br>
          <a href="index.php?action=postCreation">Ecrire un autre article</a><br>
          '
          ;} else {
			        ?>

			        <div class="post_form_container">
			          <h1 class="post_form_title">Rédiger un article</h1>
			          <form action="index.php?action=postCreation" method = "POST" class="post_form">
			          <input type="hidden" name="userId" value=" <?= $_SESSION['userId'] ?> ">
			          <label>Titre article</label> <input class="post_form_input_post_title" name="title" type="text" required><br>
			          <label>Sous-titre article</label> <input class="post_form_input_post_subtitle" name="subtitle" type="text" required><br>
			          <label>Sujet article</label> <select class="post_form_input_post_topic" name="topicId" type="mail" required>
			          <?php

			          // we get a select type / dropdown menu displaying the list of all existing topics in the DB
			           require('../view/frontend/require/getSelectTopics.php')
			           ?>
			          </select><br>
			                <textarea id="blogTextArea" name="content"></textarea><br>
			          <div class="container_form_button"><button type="submit" name="submit">Envoyer</button>
			          </form></div>
			        </div>

			        <?php 
			}

			?>
  <hr>

  <!-- Footer -->
    <?php require("require/footer.php") ?>
 

   <!-- bootstrap footer -->
   <?php require("require/boostrapFooter.php") ?>

</body>

</html>
