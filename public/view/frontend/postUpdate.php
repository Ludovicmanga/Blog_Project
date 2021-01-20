<html lang="en">

<!-- header -->

<?php require("include/pageHeadTemplate.php") ?>

<body>

  <!-- Navigation -->

  <?php require("include/navbar.php") ?>

<!-- Page Header -->

<?php 

   $backgroundImage = '../public/img/post_writing.jpg'; 
   $headerTitle = 'Modifier un article'; 
   $headerSubtitle = 'Mettez à jour votre article'; 
   require('include/pageheader.php'); 

  ?>

  <!-- Main Content -->
  
  <div class="container">


  <!-- Main Content -->
  <div class="container">

      
      <!-- Contact form -->

     <?php
     
     if(isset($_POST['title'])) {

       echo '<p> Votre article a bien été modifié!<p/><br>'; 

      } else {

        ?>

        <div class="post_modification_form_container">
          <h1 class="post_form_title">Modifier un article</h1>
          <form action="index.php?action=displayPostUpdate&id= <?= $getPost['id'] ?> " method = "POST" class="post_modification_form">
          <label>Titre article</label><input class= "post_modification_form_input_post_title" type="text" name="title" value="<?= $getPost['title'];?>"></input><br>
          <label>Sous-titre article</label> <input class="post_modification_form_input_post_subtitle"type="text" name="subtitle" value="<?= $getPost['subtitle'];?>"></input><br>
          <label>Sujet article</label><input class="post_modification_form_input_post_topic" type="mail" name="topicId" value="<?= $getPost['topicId'];?>"></input><br>
          <div class="post_form_container_textarea">
            <div>
              <label>Contenu article</label>
            </div>
            <div>
                <textarea class="post_modification_form_textarea_content" name="content">
                  <?= $getPost['content'];  ?>
                </textarea><br>
            </div>
          </div>
          <div class="container_form_button"><button type="submit" name="submit">Modifier</button>
          </form></div>
        </div>

        <?php

      }

       ?> 

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
