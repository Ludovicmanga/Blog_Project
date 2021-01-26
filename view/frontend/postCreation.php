
<!DOCTYPE html>
<html lang="en">

<!-- header -->

<?php require("include/pageHeadTemplate.php") ?>

<body>

  <!-- Navigation -->

  <?php require("include/navbar.php") ?>

  <!-- Page Header -->

  <?php 

   $backgroundImage = '../public/img/post_writing.jpg'; 
   $headerTitle = 'Ecrire un article'; 
   $headerSubtitle = 'Postez votre plus belle création'; 
   require('include/pageheader.php'); 

  ?>

  <!-- Main Content -->
  <div class="container">

      
      <!-- Contact form -->

      <?php 

         if(isset($_POST['title'])){

          echo '<b>votre article a bien été créé</b>'; 
         
        } else {

        ?>

        <div class="post_form_container">
          <h1 class="post_form_title">Rédiger un article</h1>
          <form action="index.php?action=postCreation" method = "POST" class="post_form">
          <label>Titre article</label> <input class="post_form_input_post_title" name="title" type="text" required><br>
          <label>Sous-titre article</label> <input class="post_form_input_post_subtitle" name="subtitle" type="text" required><br>
          <label>Sujet article</label> <select class="post_form_input_post_topic" name="topicId" type="mail" required>
            <?php

            while($allTopicsFetch = $allTopics->fetch()){

              echo '<option>'.$allTopicsFetch['topic_content'].'</option>'; 
            }

             ?>
          </select><br>
          <div class="post_form_container_textarea">
            <div>
              <label>Contenu article</label>
            </div>
            <div>
                <textarea class="post_form_textarea_content" name="content" required></textarea><br>
            </div>
          </div>
          <div class="container_form_button"><button type="submit" name="submit">Envoyer</button>
          </form></div>
        </div>

        <?php 
      }

      ?>

  <hr>

  <!-- Footer -->

    <?php require("include/footer.php") ?>
 

   <!-- bootstrap footer -->
   
   <?php require("include/boostrapFooter.php") ?>

</body>

</html>
