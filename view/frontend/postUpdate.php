<html lang="en">

<!-- header -->

<?php require("require/pageHeadTemplate.php") ?>

<body>

  <!-- Navigation -->

  <?php require("require/navbar.php") ?>

<!-- Page Header -->

<?php 

   $backgroundImage = '../public/img/post_writing.jpg'; 
   $headerTitle = 'Modifier un article'; 
   $headerSubtitle = 'Mettez à jour votre article'; 
   require('require/pageheader.php'); 

  ?>

  <!-- Main Content -->
  
  <div class="container">


  <!-- Main Content -->
  <div class="container">

      
      <!-- Contact form -->

     <?php
     
     if($_SERVER['REQUEST_METHOD'] == 'POST') {

       echo '<p> Votre article a bien été modifié!<p/><br>'; 

      } else {

        ?>

        <div class="post_modification_form_container">
          <h1 class="post_form_title">Modifier un article</h1>
          <form action="index.php?action=postUpdate" method = "POST" class="post_modification_form">
          <input type="hidden" name="postId" value=" <?= $_GET['postId'] ?> ">
          <label>Titre article</label><input class= "post_modification_form_input_post_title" type="text" name="title" value="<?= $post['title'];?>"><br>
          <label>Sous-titre article</label> <input class="post_modification_form_input_post_subtitle"type="text" name="subtitle" value="<?= $post['subtitle'];?>"><br>
          <label>Sujet article</label> <select class="post_form_input_post_topic" name="topicId" type="mail" required>

            <?php

            while($topicsFetch = $topics->fetch()){

              echo '<option name="topicId" value='.$topicsFetch['id'].'>'.$topicsFetch['topic_content'].'</option>'; 
            }

             ?>
             
          </select><br>
          <div class="post_form_container_textarea">
            <div>
              <label>Contenu article</label>
            </div>
            <div>
                <textarea class="post_modification_form_textarea_content" name="content">
                  <?= $post['content'];  ?>
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
    
    <?php require("require/pager.php") ?>

  </div>

  <hr>

  <!-- Footer -->

    <?php require("require/footer.php") ?>

 
  <!-- bootstrap footer -->
  
  <?php require("require/boostrapFooter.php") ?>

</body>

</html>
