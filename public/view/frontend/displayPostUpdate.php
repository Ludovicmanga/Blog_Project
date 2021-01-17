<html lang="en">

<!-- header -->

<?php require("include/pageHeadTemplate.php") ?>

<body>

  <!-- Navigation -->

  <?php require("include/navbar.php") ?>

  

  <!-- Main Content -->
  
  <div class="container">


  <!-- Main Content -->
  <div class="container">

      
      <!-- Contact form -->

    <div class="post_modification_form_container">
      <h1 class="post_form_title">Modifier un article</h1>
      <form action="index.php?action=postupdate&id= <?= $post['id'] ?> " method = "POST" class="post_modification_form">
      <label>Titre article</label><input class= "post_modification_form_input_post_title" type="text" name="title" value="<?= $post['title'];?>"></input><br>
      <label>Sous-titre article</label> <input class="post_modification_form_input_post_subtitle"type="text" name="subtitle" value="<?= $post['subtitle'];?>"></input><br>
      <label>Sujet article</label><input class="post_modification_form_input_post_topic" type="mail" name="topic" value="<?= $post['topic'];?>"></input><br>
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
      <div class="container_form_button"><button type="submit">Modifier</button>
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
