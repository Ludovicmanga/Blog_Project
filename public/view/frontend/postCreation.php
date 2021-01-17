
<!DOCTYPE html>
<html lang="en">

<!-- header -->

<?php require("include/pageHeadTemplate.php") ?>

<body>

  <!-- Navigation -->

  <?php require("include/navbar.php") ?>


 <!-- Page Header -->
  <header class="masthead" style="background-image: url('../public/img/post_writing.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Créer un post </h1>
            <span class="subheading">Créez un super article</span>
          </div>
        </div>
      </div>
    </div>
  </header>

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
          <label>Titre article</label> <input class="post_form_input_post_title" name="title" type="text" required></input><br>
          <label>Sous-titre article</label> <input class="post_form_input_post_subtitle" name="subtitle" type="text" required></input><br>
          <label>Sujet article</label> <input class="post_form_input_post_topic" name="topic" type="mail" required></input><br>
          <div class="post_form_container_textarea">
            <div>
              <label>Contenu article</label>
            </div>
            <div>
                <textarea class="post_form_textarea_content" name="content" required></textarea><br>
            </div>
          </div>
          <div class="container_form_button"><button type="submit">Envoyer</button>
          </form></div>
        </div>

        <?php 
      }

      ?>



    
        
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
